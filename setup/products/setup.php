<?php

# Get order form data
function ohrdp_order_form_data( $form_id ) {
    global $wpdb;
    $table_form = $wpdb->prefix . FM_FORM_TABLE;
    $sql        = $wpdb->prepare("SELECT * FROM {$table_form} WHERE form_id=%d", $form_id);
    $form       = $wpdb->get_row( $sql );
    return $form;
}

# Product management
add_action('fm-manage-product', function( $form_id ) {

   $form = ohrdp_order_form_data($form_id);

    if (isset($_GET['manage'])) {
        do_action('fm-form-editor', $form);
    } else if (isset($_GET['preview'])) {
        do_action('fm-form-preview', $form);
    } else {
        do_action('fm-form-reports', $form);
    }

}, 10, 1);


# Action for form editor
add_action('fm-form-editor', function( $form ) {
    do_action('fm-form-editor-assets');        
    include OHRDP_FM_SETUP_DIR . 'products/template/manage.php';
}, 10, 1);