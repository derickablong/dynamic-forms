jQuery(document).ready(function($) {

    const $doc = $(document);

    // Server request
    function server_request( _data, _callback ) {
        $('body').addClass('fm-loading');

        $.ajax({
            url     : fm.ajaxurl,
            type    : 'POST',
            dataType: 'json',
            data    : _data
        }).done( _callback );
    }


    // Load order forms
    function load_order_forms() {
        server_request({
            action: 'fm_order_forms'
        }, function(_resp) {
            $('.order-forms').html( _resp.forms );
            $('body').removeClass('fm-loading');
        });
    }


    // Function to close popup
    function popup_close() {
        // Product form
        $('.fm-popup.order-form form')[0].reset();
        $('.fm-popup.order-form').fadeOut('fast');
    }


    // Disable main window scroll
    function main_window_scroll( is_disable, _callback) {
        if (is_disable) {
            $('body').addClass('fm-no-scroll');
        } else {
            $('body').removeClass('fm-no-scroll');
        }

        _callback();
    }


    // Disable form submit
    $doc.on('submit', '.fm-popup form', function(e) {
        e.preventDefault();
        e.stopPropagation();
    });


    // Show order form popup
    $doc.on('click', '.add-new-order-form', function(e) {
        e.preventDefault();
        $('.fm-popup.order-form').fadeIn('fast');
        $('.fm-popup.order-form input:first').focus();
    });

    // Close popup
    $doc.on('click', '.fm-popup-cancel', function(e) {
        e.preventDefault();
        main_window_scroll(false, popup_close);        
    });

    // Save new order form
    $doc.on('click', '.fm-popup-submit', function(e) {
        e.preventDefault();

        let _form_name = $('#order-form-name').val();

        server_request({
            action   : 'fm_order_form_save',
            form_name: _form_name.trim()
        }, function(_resp) {            
            main_window_scroll(false, popup_close);            
            $('.order-forms').html( _resp.forms );
            $('body').removeClass('fm-loading');            
        });
        
    });

    // Get shortcode
    $doc.on('click', '.get-shortcode', function(e) {
        e.preventDefault();
        // Get the text field
        const $input = $(this).find('.shortcode-input');

        // Select the text field
        $input.select();        
        
        // Copy the text inside the text field
        document.execCommand("copy");

        alert('Shortcode successfully copied to clipboard. You can now use it to your page by pressing CTRL + v shortcut key.');
    });

    // Load all forms by default
    setTimeout(load_order_forms, 500);
});