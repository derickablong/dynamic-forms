jQuery(document).ready(function($) {

    const $doc     = $(document);
    let   $masonry = null;

    // Server request
    function server_request( _data, _callback ) {
        $('.fm-form form').addClass('fm-loading');

        $.ajax({
            url        : fm.ajaxurl,
            type       : 'POST',
            cache      : false,
            contentType: false,
            processData: false,
            data       : _data
        }).done( _callback );
    }


    // Masonry
    function build_masonry( response ) {       
        try {
            if ( response ) {
                if ($masonry)
                    $masonry.masonry('appended', response);
            } else {
                if ( $masonry ) {
                    $masonry.masonry('destroy');
                }
                var _gutter = 30;
                _gutter = $(window).width() <= 767 ? 0 : _gutter;

                $masonry = $('.form-fields').masonry({
                    // options
                    itemSelector   : '.form-fields .product-item',
                    columnWidth    : '.form-fields .product-item',
                    gutter         : _gutter,
                    percentPosition: true,
                    horizontalOrder: true
                });
            }
            setTimeout(function() {
                $masonry.masonry('layout');
            }, 500);
        } catch (error) {

        }
    }

    

    // Submit order form
    $('.fm-form form').on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        const _form_data = new FormData( $(this)[0] );   
        _form_data.append('action', 'fm_user_order_submit');     

        server_request(_form_data, function(_resp) {            
            $('.fm-form form').html( _resp.message );
            $('.fm-form form').removeClass('fm-loading');     
        });
    });


    // Build masonry
    $(window).on('resize', function() {
        build_masonry('');
    }).trigger('resize');
});