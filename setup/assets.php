<?php
# User Library
add_action('wp_enqueue_scripts', function() {
    wp_register_style(
        'ohrdp-user-frontend-css',
        OHRDP_FM_ASSETS . 'css/user.css',
        array(),
        uniqid(),
        'all'
    );
    wp_register_script(
        'ohrdp-user-frontend-script',
        OHRDP_FM_ASSETS . 'js/user.js',
        array('jquery'),
        uniqid(),
        true
    );
    wp_localize_script( 'ohrdp-user-frontend-script', 'fm',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' )			
		)
	);
});

# Admin Library
add_action('admin_enqueue_scripts', function() {   

    wp_register_style(
        'ohrdp-user-admin-css',
        OHRDP_FM_ASSETS . 'css/user.css',
        array(),
        uniqid(),
        'all'
    );
    wp_register_script(
        'ohrdp-user-admin-script',
        OHRDP_FM_ASSETS . 'js/user.js',
        array('jquery'),
        uniqid(),
        true
    );
    wp_localize_script( 'ohrdp-user-admin-script', 'fm',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' )			
		)
	);

    wp_register_style(
        'ohrdp-admin-css',
        OHRDP_FM_ASSETS . 'css/admin.css',
        array(),
        uniqid(),
        'all'
    ); 
    wp_register_style(
        'ohrdp-admin-reports-css',
        OHRDP_FM_ASSETS . 'css/admin-reports.css',
        array(),
        uniqid(),
        'all'
    ); 
    wp_register_style(
        'ohrdp-admin-order-details-css',
        OHRDP_FM_ASSETS . 'css/admin-order-details.css',
        array(),
        uniqid(),
        'all'
    );    

    wp_register_script(
        'sortable-lib-script',
        OHRDP_FM_ASSETS . 'js/jquery-ui.js',
        array('jquery'),
        uniqid(),
        true
    );
    wp_register_script(
        'ohrdp-admin-order-form-script',
        OHRDP_FM_ASSETS . 'js/admin-forms.js',
        array('jquery'),
        uniqid(),
        true
    );
    wp_localize_script( 'ohrdp-admin-order-form-script', 'fm',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' )			
		)
	);
    wp_register_script(
        'ohrdp-admin-form-editor-script',
        OHRDP_FM_ASSETS . 'js/admin-form-editor.js',
        array('jquery'),
        uniqid(),
        true
    );
    wp_localize_script( 'ohrdp-admin-form-editor-script', 'fm',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' )			
		)
	);
    wp_register_script(
        'ohrdp-admin-reports-script',
        OHRDP_FM_ASSETS . 'js/admin-reports.js',
        array('jquery'),
        uniqid(),
        true
    );
    wp_localize_script( 'ohrdp-admin-reports-script', 'fm',
		array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'form_id' => isset($_GET['form_id']) ? $_GET['form_id'] : 0
		)
	);

});


# Action to call admin assets
add_action('fm-admin-assets', function() {
    wp_enqueue_style('ohrdp-admin-css'); 
});

# Order form assets
add_action('fm-admin-order-form-assets', function() {
    wp_enqueue_style('ohrdp-admin-css'); 
    wp_enqueue_script('ohrdp-admin-order-form-script');
});

# Form editor assets
add_action('fm-form-editor-assets', function() {
    wp_enqueue_style('ohrdp-admin-css');
    wp_enqueue_script('sortable-lib-script');
    wp_enqueue_script('ohrdp-admin-form-editor-script');
});

# User assets
add_action('fm-user-assets', function() {
    wp_enqueue_script('masonry-cdn', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js');
    wp_enqueue_style('ohrdp-user-admin-css');     
    wp_enqueue_style('ohrdp-user-frontend-css');    
    wp_enqueue_script('ohrdp-user-frontend-script'); 
    wp_enqueue_script('ohrdp-user-admin-script'); 
});

# Reports assets
add_action('fm-admin-reports-assets', function() {
    wp_enqueue_style('ohrdp-admin-css'); 
    wp_enqueue_style('ohrdp-admin-reports-css');
    wp_enqueue_style('ohrdp-admin-order-details-css');    
    wp_enqueue_script('ohrdp-admin-reports-script');
});

# Set deafult css for tinymce
add_action( 'after_setup_theme', function() {
    add_editor_style( OHRDP_FM_ASSETS . 'css/admin-editor.css' );
} );