<?php
# Shipping details
add_action('fm-mail-shipping', function( $order ) {          
    include OHRDP_FM_SETUP_DIR . 'mail/template/details/shipping.php';
}, 10, 1);

# Ordered products
add_action('fm-mail-orders', function( $order ) {        
    include OHRDP_FM_SETUP_DIR . 'mail/template/details/orders.php';
}, 10, 1);

# Ordered product item
add_action('fm-mail-product', function( $product ) {        
    include OHRDP_FM_SETUP_DIR . 'mail/template/details/product.php';
}, 10, 1);

# Action for order details
add_action('fm-mail-order-details', function( $order, $form ) {       
    include OHRDP_FM_SETUP_DIR . 'mail/template/details/details.php';
}, 10, 2);


# Function to send email
function fm_send_email( $order_id = 1 ) {
    global $wpdb;

    $table_orders = $wpdb->prefix . FM_ORDERS_TABLE;
    $sql          = $wpdb->prepare("SELECT * FROM {$table_orders} WHERE order_id=%d", $order_id);
    $order_data   = $wpdb->get_row( $sql );
    $order        = json_decode($order_data->orders, true);

    $table_form = $wpdb->prefix . FM_FORM_TABLE;
    $sql        = $wpdb->prepare("SELECT * FROM {$table_form} WHERE form_id=%d", $order_data->form_id);
    $form       = $wpdb->get_row( $sql );    

    if (trim($form->form_emails)) {        

        $emails = preg_split("/\r\n|\n|\r/", $form->form_emails);
        if (is_array($emails)) {
            $emails[] = $order_data->email;
        }

        $content_type = function() { return 'text/html'; };

        ob_start();    
        do_action('fm-mail-order-details', $order, $form);
        $body = ob_get_clean();

        add_filter( 'wp_mail_content_type', $content_type );
        wp_mail( $emails, 'New order for '.$form->form_name, $body );
        remove_filter( 'wp_mail_content_type', $content_type );
    }
}

# Action to send email
add_action('fm-send-email', function($order_id = 0) {
    fm_send_email( $order_id );
}, 10, 1);