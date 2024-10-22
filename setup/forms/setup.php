<?php
define('FM_FORM_VIEW', OHRDP_FM_SETUP_DIR . 'forms/template/view/');

# Order forms management
add_action('fm-forms', function() {
	do_action('fm-admin-order-form-assets');    
    include OHRDP_FM_SETUP_DIR . 'forms/template/manage.php';
});

# Order item loop
add_action('fm-order-item', function($form) {
	include OHRDP_FM_SETUP_DIR . 'forms/template/item.php';
}, 10, 1);

# Order form manage page
function ohrdp_fm_admin_page() {
	if (isset($_GET['form_id'])) {
		$form_id = $_GET['form_id'];
		do_action('fm-nav', $form_id);
		do_action('fm-manage-product', $form_id);
	} else {
		do_action('fm-forms');
	}
}

# Toolbar settings
function fm_toolbar_settings( $media = false, $quick_tags = false ) {
	return array(
		'media_buttons' => $media,
		'quicktags'     => $quick_tags,
		'editor_height' => 200,
		'tinymce'       => array(
			'wordpress_adv_hidden' => false
		)
	);
}

# Menu
function ohrdp_fm_menu_page() {
	add_menu_page(
		__( 'OHRDP Forms', 'ohrdp-fm' ),
		'OHRDP Forms',
		'manage_options',
		'ohrdp-fm',
		'ohrdp_fm_admin_page',
		'dashicons-editor-table',
		2
	);   	
}
add_action( 'admin_menu', 'ohrdp_fm_menu_page' );

# Load order form
function ohrdp_load_order_form( $form_details ) {
	do_action('fm-user-assets');
	$form_id = $form_details->form_id;
	include OHRDP_FM_POPUP . 'data.php';    
    include FM_FORM_VIEW . 'form.php';
}


# Action for form preview
add_action('fm-form-preview', 'ohrdp_load_order_form', 10, 1);

# Shortcode for form order
add_shortcode('ORDER-FORM', function($atts) {
	if (array_key_exists('id', $atts) && (int)$atts['id'] >= 1) {
		ob_start();
		$form_id = $atts['id'];
		$form = ohrdp_order_form_data($form_id);
		ohrdp_load_order_form( $form );
		return ob_get_clean();

	}	
	return '';
});

# Front-end: Form header
add_action('fm-form-header', function( $form_details ) { 	
    include FM_FORM_VIEW . 'header.php';
}, 10, 1);

# Front-end: Form content before
add_action('fm-form-content-before', function( $page_settings ) { 	
	$page_settings = json_decode($page_settings);
	if (!empty(trim($page_settings->content_before)))
    	include FM_FORM_VIEW . 'content_before.php';
}, 10, 1);

# Front-end: Form content after
add_action('fm-form-content-after', function( $page_settings ) { 	
	$page_settings = json_decode($page_settings);
	if (!empty(trim($page_settings->content_after)))
    	include FM_FORM_VIEW . 'content_after.php';
}, 10, 1);

# Front-end: Form fields
add_action('fm-form-fields', function( $form_data ) { 	
	$form_data = json_decode($form_data);
	
    include FM_FORM_VIEW . 'fields.php';
}, 10, 1);

# Front-end: Form field item
add_action('fm-form-field-item', function( $product ) { 		
    include FM_FORM_VIEW . '/field/field.php';
}, 10, 1);

# Front-end: Form field item content before
add_action('fm-form-field-item-content-before', function( $product ) { 	
	if (!empty(trim( $product->content_before )))	
    	include FM_FORM_VIEW . '/field/content_before.php';
}, 10, 1);

# Front-end: Form field item content after
add_action('fm-form-field-item-content-after', function( $product ) { 		
	if (!empty(trim( $product->content_after )))
    	include FM_FORM_VIEW . '/field/content_after.php';
}, 10, 1);

# Front-end: Form field item supplies
add_action('fm-form-field-item-content-supplies', function( $product ) { 			
    include FM_FORM_VIEW . '/field/supplies.php';
}, 10, 1);

# Front-end: Form checkbox
add_action('fm-form-field-item-checkbox', function( $product ) { 			
    include FM_FORM_VIEW . '/field/checkbox.php';
}, 10, 1);

# Front-end: Thank you
add_action('fm-thank-you', function() { 			
    include FM_FORM_VIEW . '/thank_you.php';
}, 10, 1);


# Add body class for user view
add_filter( 'body_class', function( $classes ) {
	if (isset($_GET['preview']))
		return array_merge( $classes, array( 'fm-preview' ) );
	return $classes;
} );

# Navigation
add_action('fm-nav', function( $form_id ) {
	$current_page = 'home';
	if (isset($_GET['reports']))
		$current_page = 'reports';
	else if (isset($_GET['manage']))
		$current_page = 'manage';
	include OHRDP_FM_SETUP_DIR . 'forms/template/nav.php';
}, 10, 1);

# Always add loading state
add_filter('admin_body_class', function( $classes ) {
	if (isset($_GET['page']) && $_GET['page'] == 'ohrdp-fm') {
		$classes .= ' fm-loading';
	}
	return $classes;
}, 1, 1);

# Register outside css to avoid waiting time to load
add_action('admin_head', function() {
	if (isset($_GET['page']) && $_GET['page'] == 'ohrdp-fm' && !isset($_GET['preview'])) {
		?>
		<style type="text/css">
			body.fm-loading {
				overflow-x: hidden!important;
				overflow-y: hidden!important;
			}
			body.fm-loading::after {
				content: '';
				position: fixed;
				top: 0;
				left: 0;
				z-index: 99999999999999999;
				width: 100%;
				height: 100%;
				background-color: rgb(0 0 0 / 90%);
				background-image: url(<?php echo OHRDP_FM_ASSETS ?>/css/loading.gif);
				background-repeat: no-repeat;
				background-position: center;				
			}
		</style>
		<?php
	}
});