<?php


# Get all order forms
function ohrdp_order_forms() {
	ob_start();

    global $wpdb;
	$table_product = $wpdb->prefix . FM_FORM_TABLE;
	$forms         = $wpdb->get_results("SELECT * FROM {$table_product}");
    
	foreach ($forms as $form) {
		do_action('fm-order-item', $form);
	}

	return ob_get_clean();
}


# Get order forms created
add_action('wp_ajax_fm_order_forms', function() {
    wp_send_json( array(
        'forms' => ohrdp_order_forms()
    ), 200 );
    wp_die();
});


# Save new order form
add_action('wp_ajax_fm_order_form_save', function() {
	global $wpdb;
	
	$table_product = $wpdb->prefix . FM_FORM_TABLE;
	$form_name     = $_POST['form_name'];

	$wpdb->insert(
		$table_product,
		array(
			'form_name' => $form_name,
			'form_slug' => sanitize_title( $form_name )
		),
		array( '%s', '%s' )
	);

    wp_send_json( array(
        'forms' => ohrdp_order_forms()
    ), 200 );
    wp_die();
});

# User submit new order
function fm_user_order_submit() {
	
	global $wpdb;
	
	$table_orders = $wpdb->prefix . FM_ORDERS_TABLE;
	$orders       = $_POST['order'];
	$form_id      = $_POST['form_id'];

	$wpdb->insert(
		$table_orders,
		array(
			'form_id'                    => $form_id,
			'person_placing_order'       => $orders['person-placing-order'],
			'organization_placing_order' => $orders['organization-placing-order'],
			'email'                      => $orders['email-address'],
			'order_date'                 => $orders['order-date'],
			'orders'                     => json_encode($orders)
		),
		array( '%d', '%s', '%s', '%s', '%s', '%s' )
	);

	do_action('fm-send-email', $wpdb->insert_id);

	ob_start();
	do_action('fm-thank-you');
	$message = ob_get_clean();
	

	wp_send_json( array(
		'success' => true,
		'form_id' => $form_id,
		'message' => $message
	), 200 );
	wp_die();	
}
add_action('wp_ajax_fm_user_order_submit', 'fm_user_order_submit');
add_action('wp_ajax_nopriv_fm_user_order_submit', 'fm_user_order_submit');