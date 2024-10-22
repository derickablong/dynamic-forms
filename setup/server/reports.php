<?php

# Get order forms created
add_action('wp_ajax_fm_orders', function() {
    global $wpdb;
    $table_orders = $wpdb->prefix . FM_ORDERS_TABLE;

    ob_start();    

    $form_id      = $_POST['form_id'];
    $person       = trim(strtolower($_POST['person']));
    $organization = trim(strtolower($_POST['organization']));

    $raw_start_date = trim($_POST['start_date']);
    $raw_end_date   = trim($_POST['end_date']);
    $start_date     = date('Y-m-d', strtotime($raw_start_date));
    $end_date       = date('Y-m-d', strtotime($raw_end_date));
    
    

    if (!empty($person) || !empty($organization) || !empty($raw_start_date)) {

        $date_query   = '';
        $person_query = '';

        if (!empty($raw_start_date)) {
            $date_query = " AND order_date BETWEEN '{$start_date}' AND '{$end_date}'";
        }

        if (!empty($person) || !empty($organization)) {
            $person_query = "AND person_placing_order LIKE '%{$person}%'";
        }
        if (!empty($organization)) {
            $organization_query = "AND organization_placing_order LIKE '%{$organization}%'";
        }

        $sql = "SELECT * FROM {$table_orders} WHERE form_id={$form_id} ". $person_query . "  " . $organization_query . " " . $date_query;        

    } else {
        $query = "SELECT * FROM {$table_orders} WHERE form_id=%d";
        $sql = $wpdb->prepare($query, $form_id);
    }    

    $reports = $wpdb->get_results( $sql );

    foreach ( $reports as $report_item ) {
        $order    = json_decode($report_item->orders, true);
        $order_id = $report_item->order_id;
        do_action('fm-report-item', $order_id, $order);
    }

    wp_send_json( array(
        'orders' => ob_get_clean(),
        'sql'    => $sql
    ), 200 );
    wp_die();
});

# Get order details
add_action('wp_ajax_fm_order_details', function() {
    ob_start();

    do_action('fm-order-details', $_POST['order_id']);

    wp_send_json( array(
        'details' => ob_get_clean()
    ), 200 );
    wp_die();
});

