jQuery(document).ready(function($) {

    const $doc       = $(document);
    let   start_date = '';
    let   end_date   = '';

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
    

    // Load all orders
    function load_orders() {

        const _person       = $('.input-person-placing-order').val();
        const _organization = $('.input-organization-placing-order').val();
        const _start_date   = $('.input-start-date').val();
        const _end_date     = $('.input-end-date').val();

        server_request({
            action      : 'fm_orders',
            form_id     : fm.form_id,
            person      : _person,
            organization: _organization,
            start_date  : _start_date,
            end_date    : _end_date
        }, function(_resp) {
            console.log(_resp.sql);
            $('.report-orders').html( _resp.orders );
            $('body').removeClass('fm-loading');
        });
    }


    // View order details
    $doc.on('click', '.order-view-details', function(e) {
        e.preventDefault();        
        
        const $button   = $(this);
        const _order_id = $button.data('order');

        server_request({
            action  : 'fm_order_details',
            order_id: _order_id
        }, function(_resp) {
            $('#wpwrap').hide();
            $('body').append( _resp.details );
            $('body').removeClass('fm-loading');
        });
    });
    // Close details popup
    $doc.on('click', '.close-popup', function(e) {
        e.preventDefault();
        $('.order-details-popup').fadeOut('fast', function() {
            $('#wpwrap').show();
            $('.order-details-popup').remove();            
        });
    });

    // Print
    $doc.on('click', '.print-details', function(e) {
        e.preventDefault();
        window.print();
    });


    // Date range picker
    $('.input-order-date').daterangepicker({
        autoUpdateInput: false,
        showDropdowns  : true,
        locale: {
            cancelLabel: 'Reset'
        }
    }, function(start, end, label) {
        start_date = start.format('YYYY-MM-DD');
        end_date   = end.format('YYYY-MM-DD');
        $('.input-start-date').val(start_date);
        $('.input-end-date').val(end_date);        
    });
    $('.input-order-date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });
    $('.input-order-date').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        start_date = '';
        end_date   = '';
        $('.input-start-date').val('');
        $('.input-end-date').val('');        
    });

    // Apply filter
    $doc.on('click', '.report-apply-filter', function(e) {
        e.preventDefault();
        load_orders();
    });

    // Clear flter
    $doc.on('click', '.report-clear-filter', function(e) {
        e.preventDefault();
        $('.input-person-placing-order').val('');
        $('.input-organization-placing-order').val('');
        $('.input-order-date').val('');
        $('.input-start-date').val('');
        $('.input-end-date').val('');
        load_orders();
    });


    // Default load
    setTimeout(load_orders, 500);
});