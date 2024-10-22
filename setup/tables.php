<?php

// Create required table to store data
add_action('admin_init', function() {

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();
    $table_form      = $wpdb->prefix . FM_FORM_TABLE;
    $table_product   = $wpdb->prefix . FM_FORM_PRODUCT_TABLE;
    $table_orders    = $wpdb->prefix . FM_ORDERS_TABLE;



    if ( $wpdb->get_var("SHOW TABLES LIKE '$table_form'") != $table_form ) {

        // Create Form Table
        $forms_sql =  "CREATE TABLE $table_form(
        form_id int(10) unsigned NOT NULL AUTO_INCREMENT,
        form_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        form_slug varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        form_emails TEXT,
        form_status int(1) NOT NULL DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (form_id)
        ) $charset_collate;";

        dbDelta($forms_sql);

        // Create Form Product Table
        $forms_sql =  "CREATE TABLE $table_product(
        product_id int(10) unsigned NOT NULL AUTO_INCREMENT,
        form_id int(10) NOT NULL DEFAULT 0,        
        form TEXT NULL,
        settings TEXT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (product_id)
        ) $charset_collate;";

        dbDelta($forms_sql);


        // Create Orders Table
        $forms_sql =  "CREATE TABLE $table_orders(
            order_id int(10) unsigned NOT NULL AUTO_INCREMENT,
            form_id int(10) NOT NULL DEFAULT 0,      
            person_placing_order VARCHAR(100),
            organization_placing_order VARCHAR(100),
            email VARCHAR(100),
            order_date DATE,
            orders TEXT NULL,            
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (order_id)
        ) $charset_collate;";
    
        dbDelta($forms_sql);
        
    }
});