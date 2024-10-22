<?php
global $wpdb;
$table_product = $wpdb->prefix . FM_FORM_PRODUCT_TABLE;
$sql           = $wpdb->prepare("SELECT form, settings FROM {$table_product} WHERE form_id=%d", $form_id);
$form          = $wpdb->get_row( $sql );
$form_data     = !empty( $form ) ? $form->form : '';
$page_settings = !empty( $form ) ? $form->settings : '';
?>
