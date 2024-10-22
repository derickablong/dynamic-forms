<?php

# Popup for form editor
add_action('fm-form-editor-popup', function( $order_form ) {

    $form_id = $order_form->form_id;

    // Load form data
    include OHRDP_FM_POPUP . 'data.php';

    // Global scripts
    include OHRDP_FM_POPUP . 'data-script.php';

    // Buttons
    include OHRDP_FM_POPUP . 'buttons.php';

    // Product
    include OHRDP_FM_POPUP . 'product.php';

    // Product Settings
    include OHRDP_FM_POPUP . 'settings-product.php';

    // Page Settings
    include OHRDP_FM_POPUP . 'settings-page.php';

}, 10, 1);

# Popup for new order form
add_action('fm-order-form-popup', function() {
    include OHRDP_FM_POPUP . 'form.php';
});