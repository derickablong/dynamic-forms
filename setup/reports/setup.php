<?php

# Loop item
add_action('fm-report-item', function( $order_id, $order ) {
    include OHRDP_FM_SETUP_DIR . 'reports/template/loop-item.php';
}, 10, 2);

# Action for orders
add_action('fm-form-reports', function( $form ) {
    do_action('fm-admin-reports-assets');       
    include OHRDP_FM_SETUP_DIR . 'reports/template/reports.php';
}, 10, 1);



# Shipping details
add_action('fm-details-shipping', function( $order ) {          
    include OHRDP_FM_SETUP_DIR . 'reports/template/details/shipping.php';
}, 10, 1);

# Ordered products
add_action('fm-details-orders', function( $order ) {        
    include OHRDP_FM_SETUP_DIR . 'reports/template/details/orders.php';
}, 10, 1);

# Ordered product item
add_action('fm-details-product', function( $product ) {        
    include OHRDP_FM_SETUP_DIR . 'reports/template/details/product.php';
}, 10, 1);

# Action for order details
add_action('fm-order-details', function( $order_id ) {     
    
    global $wpdb;

    $table_orders = $wpdb->prefix . FM_ORDERS_TABLE;
    $sql          = $wpdb->prepare("SELECT * FROM {$table_orders} WHERE order_id=%d", $order_id);
    $order_data   = $wpdb->get_row( $sql );
    $order        = json_decode($order_data->orders, true);

    $table_form = $wpdb->prefix . FM_FORM_TABLE;
    $sql        = $wpdb->prepare("SELECT * FROM {$table_form} WHERE form_id=%d", $order_data->form_id);
    $form       = $wpdb->get_row( $sql );

    include OHRDP_FM_SETUP_DIR . 'reports/template/details/details.php';
}, 10, 1);