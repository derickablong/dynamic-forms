<?php
# Capture product form changes
add_action('wp_ajax_fm_form_save', function() {

    global $wpdb;

    $table_form    = $wpdb->prefix . FM_FORM_TABLE;
    $table_product = $wpdb->prefix . FM_FORM_PRODUCT_TABLE;

    $form_id  = $_POST['form_id'];
    $form     = json_encode($_POST['form']);
    $settings = json_encode($_POST['settings']);

    $sql         = $wpdb->prepare("SELECT form FROM {$table_product} WHERE form_id=%d", $form_id);
    $form_exists = $wpdb->get_row( $sql );

    // Update form name
    $form_name   = $_POST['form_name'];
    $form_slug   = sanitize_title( $form_name );
    $form_emails = $_POST['form_emails'];
    $form_status = $_POST['form_status'];

    $wpdb->update(
        $table_form,
        array( 
            'form_name'   => $form_name,
            'form_slug'   => $form_slug,
            'form_emails' => $form_emails,
            'form_status' => $form_status            
        ),
        array( 'form_id' => $form_id ),
        array( '%s', '%s', '%s', '%d' ),
        array( '%d' )
    );


    if ($form_exists) {        
        $wpdb->update(
            $table_product,
            array( 'form' => $form, 'settings' => $settings ),
            array( 'form_id' => $form_id ),
            array( '%s', '%s' ),
            array( '%d' )
        );
    } else {        
        $wpdb->insert(
            $table_product,
            array(
                'form_id'  => $form_id,
                'form'     => $form,
                'settings' => $settings
            ),
            array( '%d', '%s', '%s' )
        );        
    }

    wp_send_json( array(
        'success' => true,
        'settings' => $settings
    ), 200 );
    wp_die();
});