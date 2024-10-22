jQuery(document).ready(function($) {

    const $doc                 = $(document);
    let   FM_PAGE_SETTINGS     = {};
    let   FM_PAGE_SETTINGS_RAW = {
        content_before: '',
        content_after : ''
    };
    let FM_FORM              = [];
    let FM_FORM_INDEX        = -1;
    let FM_PRODUCT_INDEX     = -1;
    let FM_CURRENT_PRODUCT   = [];
    let FM_ORDER_FORM_NAME   = '';
    let FM_ORDER_FORM_STATUS = 0;
    let FM_ORDER_EMAILS      = '';
    

    // Make everything process first on page load
    $('body').addClass('fm-loading');


    // Product raw data
    function product_raw_data() {
        return {
            product_name  : '',
            enabled       : 0,
            fields        : [],
            content_before: '',
            content_after : '',
            checkbox      : 0,
            checkbox_label: ''
        };    
    }


    // Server request
    function server_request( _data ) {
        $('body').addClass('fm-loading');

        $.ajax({
            url        : fm.ajaxurl,
            type       : 'POST',
            dataType   : 'json',
            data       : _data
        }).done(function(_resp) {            
            $('body').removeClass('fm-loading');
        });
    }
    
    // Format form data structure
    function format_form_data(_raw_form_data) {

        let _form_data = product_raw_data();
        if (typeof(_raw_form_data.product_name) !== 'undefined') {
            _form_data.product_name = _raw_form_data.product_name;
        }
        if (typeof(_raw_form_data.enabled) !== 'undefined') {
            _form_data.enabled = _raw_form_data.enabled;
        }
        if (typeof(_raw_form_data.fields) !== 'undefined') {
            _form_data.fields = _raw_form_data.fields;
        }
        if (typeof(_raw_form_data.content_before) !== 'undefined') {
            _form_data.content_before = _raw_form_data.content_before;
        }
        if (typeof(_raw_form_data.content_after) !== 'undefined') {
            _form_data.content_after = _raw_form_data.content_after;
        }
        if (typeof(_raw_form_data.checkbox) !== 'undefined') {
            _form_data.checkbox = _raw_form_data.checkbox;
        }
        if (typeof(_raw_form_data.checkbox_label) !== 'undefined') {
            _form_data.checkbox_label = _raw_form_data.checkbox_label;
        }
        return _form_data;
    }

    // Local update raw form data
    function update_form_data_fields( DEFAULT_FORM_DATA = null ) {

        // Initialize process...
        $('body').addClass('fm-loading');

        // Reset form
        $('.form-holder').html('');

        FM_ORDER_FORM_NAME   = $('.form-settings').data('order-form');
        FM_ORDER_EMAILS      = $('.form-settings').data('order-emails');
        FM_ORDER_FORM_STATUS = $('.form-settings').data('status');
        FM_PAGE_SETTINGS     = FM_DEFAULT_PAGE_SETTINGS_DATA === '' ? FM_PAGE_SETTINGS_RAW : FM_DEFAULT_PAGE_SETTINGS_DATA;
       
        let _fields     = FM_DEFAULT_FORM_DATA;
        let FM_OLD_FORM = [];
        
        if (DEFAULT_FORM_DATA !== null) {
            FM_FORM            = [];
            FM_FORM_INDEX      = -1;
            FM_PRODUCT_INDEX   = -1;
            FM_CURRENT_PRODUCT = [];
            FM_OLD_FORM        = DEFAULT_FORM_DATA;
        } else {            
            FM_OLD_FORM = _fields != '' ? _fields : [];
        }        

        $.each(FM_OLD_FORM, function(_index, _form) {
            add_new_product(
                format_form_data( _form )
                , function() {
                $('.form-holder').sortable({
                    handle: '.order-item'
                });
                $('.product-supplies').sortable({
                    handle: '.order-item'
                });                
            });
        });
        $('body').removeClass('fm-loading');
    }

    // Update product ordering
    function update_product_order( event, ui ) {        
        let _new_form  = [];
        let _new_index = 0;
        $doc.find('.fm-product').each(function() {
            let $product    = $(this);
            let _form_index = parseInt($product.data('index'));
            _new_form.push( FM_FORM[ _form_index ] );
            $product.data('index', _new_index);
            _new_index++;
        });        
        FM_FORM = _new_form;
    }

    
    // Function to close popup
    function popup_close() {

        // Product form
        $('.fm-popup.product-form form')[0].reset();
        $('.fm-popup.product-form').fadeOut('fast');

        // Product settings
        tinyMCE.get('product_before_content').setContent('');
        tinyMCE.get('product_after_content').setContent('');
        $('.fm-popup.setting-product-form form')[0].reset();        
        $('.fm-popup.setting-product-form').fadeOut('fast');

        // Page settings
        tinyMCE.get('page_before_content').setContent('');
        tinyMCE.get('page_after_content').setContent('');
        $('.fm-popup.setting-page-form form')[0].reset();
        $('.fm-popup.setting-page-form').fadeOut('fast');
    }

    // Supply item template
    function supply_item_template( _name, _quantity ) {
        return `
                <div class="supply-item">
                    <div class="supply-name">
                        <span class="order-item">
                            <svg fill="none" height="15" viewBox="0 0 15 15" width="15" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4.5" cy="2.5" fill="currentColor" r=".6"/><circle cx="4.5" cy="4.5" fill="currentColor" r=".6"/>
                                <circle cx="4.5" cy="6.499" fill="currentColor" r=".6"/><circle cx="4.5" cy="8.499" fill="currentColor" r=".6"/>
                                <circle cx="4.5" cy="10.498" fill="currentColor" r=".6"/><circle cx="4.5" cy="12.498" fill="currentColor" r=".6"/>
                                <circle cx="6.5" cy="2.5" fill="currentColor" r=".6"/><circle cx="6.5" cy="4.5" fill="currentColor" r=".6"/>
                                <circle cx="6.5" cy="6.499" fill="currentColor" r=".6"/><circle cx="6.5" cy="8.499" fill="currentColor" r=".6"/>
                                <circle cx="6.5" cy="10.498" fill="currentColor" r=".6"/><circle cx="6.5" cy="12.498" fill="currentColor" r=".6"/>
                                <circle cx="8.499" cy="2.5" fill="currentColor" r=".6"/><circle cx="8.499" cy="4.5" fill="currentColor" r=".6"/>
                                <circle cx="8.499" cy="6.499" fill="currentColor" r=".6"/><circle cx="8.499" cy="8.499" fill="currentColor" r=".6"/>
                                <circle cx="8.499" cy="10.498" fill="currentColor" r=".6"/><circle cx="8.499" cy="12.498" fill="currentColor" r=".6"/>
                                <circle cx="10.499" cy="2.5" fill="currentColor" r=".6"/><circle cx="10.499" cy="4.5" fill="currentColor" r=".6"/>
                                <circle cx="10.499" cy="6.499" fill="currentColor" r=".6"/><circle cx="10.499" cy="8.499" fill="currentColor" r=".6"/>
                                <circle cx="10.499" cy="10.498" fill="currentColor" r=".6"/><circle cx="10.499" cy="12.498" fill="currentColor" r=".6"/>
                            </svg>
                        </span>
                        <input type="text" name="supply-name[]" class="supply-name" placeholder="Supply name" `+ (_name !== null ? 'value="'+ _name.replace(/\\/g, '') +'"' : '') +` />
                    </div>
                    <div class="supply-quantity">
                        <input type="number" name="supply-quantity[]" class="supply-quantity" placeholder="0" `+ (_quantity !== null ? 'value="'+ _quantity +'"' : '') +` />
                    </div>
                    <div class="supply-cta">
                        <button>
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                `;
    }

    // Raw supply item
    function supply_item_raw( _fields ) {
        if (_fields.length) {

            let _field_html = '';            
            $.each(_fields, function(_index, _field) {
                _field_html += supply_item_template( _field.name, _field.quantity );
            });
            return _field_html;


        } else {
            return supply_item_template(null, null);
        }
    }

    // Add new product
    function add_new_product( _product_data, _callback ) {
        
        let _product_name = _product_data.product_name !== '' ? _product_data.product_name : $('input#product-name').val();        

        if (FM_FORM_INDEX == -1) {
            FM_FORM_INDEX = 0;
        } else {
            FM_FORM_INDEX++;
        }
        
        FM_FORM.push({
            product_name  : _product_name,
            enabled       : _product_data.enabled,
            fields        : _product_data.fields,
            content_before: _product_data.content_before,
            content_after : _product_data.content_after,
            checkbox      : _product_data.checkbox,
            checkbox_label: _product_data.checkbox_label
        });

        let _product = `
        <div class="fm-product" data-index="`+ FM_FORM_INDEX +`">

            <div class="product-handle">
                <span class="order-item">
                    <svg fill="none" height="15" viewBox="0 0 15 15" width="15" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="4.5" cy="2.5" fill="currentColor" r=".6"/><circle cx="4.5" cy="4.5" fill="currentColor" r=".6"/>
                        <circle cx="4.5" cy="6.499" fill="currentColor" r=".6"/><circle cx="4.5" cy="8.499" fill="currentColor" r=".6"/>
                        <circle cx="4.5" cy="10.498" fill="currentColor" r=".6"/><circle cx="4.5" cy="12.498" fill="currentColor" r=".6"/>
                        <circle cx="6.5" cy="2.5" fill="currentColor" r=".6"/><circle cx="6.5" cy="4.5" fill="currentColor" r=".6"/>
                        <circle cx="6.5" cy="6.499" fill="currentColor" r=".6"/><circle cx="6.5" cy="8.499" fill="currentColor" r=".6"/>
                        <circle cx="6.5" cy="10.498" fill="currentColor" r=".6"/><circle cx="6.5" cy="12.498" fill="currentColor" r=".6"/>
                        <circle cx="8.499" cy="2.5" fill="currentColor" r=".6"/><circle cx="8.499" cy="4.5" fill="currentColor" r=".6"/>
                        <circle cx="8.499" cy="6.499" fill="currentColor" r=".6"/><circle cx="8.499" cy="8.499" fill="currentColor" r=".6"/>
                        <circle cx="8.499" cy="10.498" fill="currentColor" r=".6"/><circle cx="8.499" cy="12.498" fill="currentColor" r=".6"/>
                        <circle cx="10.499" cy="2.5" fill="currentColor" r=".6"/><circle cx="10.499" cy="4.5" fill="currentColor" r=".6"/>
                        <circle cx="10.499" cy="6.499" fill="currentColor" r=".6"/><circle cx="10.499" cy="8.499" fill="currentColor" r=".6"/>
                        <circle cx="10.499" cy="10.498" fill="currentColor" r=".6"/><circle cx="10.499" cy="12.498" fill="currentColor" r=".6"/>
                    </svg>
                </span>                

                <button class="product-settings">
                    <svg enable-background="new 0 0 32 32" id="Editable-line" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <circle cx="16" cy="16" fill="none" id="XMLID_224_" r="4" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                        <path d="  M27.758,10.366l-1-1.732c-0.552-0.957-1.775-1.284-2.732-0.732L23.5,8.206C21.5,9.36,19,7.917,19,5.608V5c0-1.105-0.895-2-2-2h-2  c-1.105,0-2,0.895-2,2v0.608c0,2.309-2.5,3.753-4.5,2.598L7.974,7.902C7.017,7.35,5.794,7.677,5.242,8.634l-1,1.732  c-0.552,0.957-0.225,2.18,0.732,2.732L5.5,13.402c2,1.155,2,4.041,0,5.196l-0.526,0.304c-0.957,0.552-1.284,1.775-0.732,2.732  l1,1.732c0.552,0.957,1.775,1.284,2.732,0.732L8.5,23.794c2-1.155,4.5,0.289,4.5,2.598V27c0,1.105,0.895,2,2,2h2  c1.105,0,2-0.895,2-2v-0.608c0-2.309,2.5-3.753,4.5-2.598l0.526,0.304c0.957,0.552,2.18,0.225,2.732-0.732l1-1.732  c0.552-0.957,0.225-2.18-0.732-2.732L26.5,18.598c-2-1.155-2-4.041,0-5.196l0.526-0.304C27.983,12.546,28.311,11.323,27.758,10.366z  " fill="none" id="XMLID_242_" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
                    </svg>
                </button>

                <div class="field-inline">
                    <div class="input">
                        <label class="switch">
                            <input type="checkbox" class="product-enable" `+ (parseInt(_product_data.enabled) ? 'checked' : '') +`>
                            <span class="slider round"></span>                    
                        </label>
                    </div>
                    <span class="label">Active</span>
                </div>
            </div>            

            <div class="product-header">
                <div class="product-name">`+ _product_name +`</div>
                <div class="product-unit">QTY</div>                
                <div class="cta">
                    <button>
                        <svg baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M18,10h-4V6c0-1.104-0.896-2-2-2s-2,0.896-2,2l0.071,4H6c-1.104,0-2,0.896-2,2s0.896,2,2,2l4.071-0.071L10,18  c0,1.104,0.896,2,2,2s2-0.896,2-2v-4.071L18,14c1.104,0,2-0.896,2-2S19.104,10,18,10z"/></svg>
                    </button>
                </div>
            </div>
            <div class="product-supplies">`+supply_item_raw( _product_data.fields )+`</div>
        </div>
        `;

        $('.form-holder').append( _product );

        _callback();
    }

    // Load forms
    function start_new_product() {        
        add_new_product( product_raw_data(), function() {            
            $('.product-supplies').sortable({
                handle: '.order-item'
            });
            main_window_scroll(false, popup_close);
        });
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

    // Restructure form data
    function form_data_restructure(_callback) {
        $doc.find('.fm-product').each(function() {

            let $product = $(this);            
            let _index   = parseInt($product.data('index'));
            let _enabled = $product.find('.product-enable').is(':checked') ? 1 : 0;
            
            let _supply_names = [];
            let $supply_names = $product.find('input.supply-name');
            $supply_names.each(function() {
                let _name = $(this).val().trim();
                if ( _name !== '' ) {
                    _supply_names.push( _name );
                }                
            });

            let _supply_quantity = [];
            let $supply_quantity = $product.find('input.supply-quantity');
            $supply_quantity.each(function() {
                let _quantity = $(this).val().trim();
                if ( _quantity !== '' ) {
                    _supply_quantity.push( _quantity );
                }                
            });
            

            let _new_supplies = [];
            $.each(_supply_names, function(_supply_index, _val) {
                _new_supplies.push({
                    name    : _val,
                    quantity: _supply_quantity[_supply_index]
                });
            });            
            
            FM_FORM[_index].enabled = _enabled;
            FM_FORM[_index].fields  = _new_supplies;

        });
        _callback();
    }


    // Open add new form popup
    $doc.on('click', '.add-new-form', function(e) {
        e.preventDefault();
        main_window_scroll(true, function() {
            $('.fm-popup.product-form input[name="form-id"]').val( $(this).data('form') );
            $('.fm-popup.product-form').fadeIn('fast');
            $('.fm-popup.product-form input:first').focus();
        });        
    });

    // Close popup
    $doc.on('click', '.fm-popup-cancel', function(e) {
        e.preventDefault();
        main_window_scroll(false, popup_close);        
    });

    // Add new product
    $doc.on('click', '.fm-popup-submit', function(e) {
        e.preventDefault();
        start_new_product();
    });    

    // Add new supply item
    $doc.on('click', '.product-header button', function(e) {
        e.preventDefault();

        $supply_holder = $(this).parent().parent().parent().find('.product-supplies');
        $supply_holder.append( supply_item_raw([]) );

    });

    // Remove supply item
    $doc.on('click', '.supply-cta button', function(e) {
        e.preventDefault();
        $(this).parent().parent().remove();
    });

    // Allow checkbox label clickable
    $doc.on('click', '.field-inline .label', function(e) {
        e.preventDefault();
        $(this).parent().find('input').trigger('click');
    });


    // Save changes
    $doc.on('click', '.save-changes', function(e) {
        e.preventDefault();
        let _form_id = parseInt($(this).data('form')); 
        form_data_restructure(function() {        
            server_request({
                action     : 'fm_form_save',
                form_id    : _form_id,
                form_name  : FM_ORDER_FORM_NAME,
                form_status: FM_ORDER_FORM_STATUS,
                form_emails: FM_ORDER_EMAILS,
                form       : FM_FORM,
                settings   : FM_PAGE_SETTINGS
            });
        });
    });    

    // Disable form submit
    $doc.on('submit', '.fm-popup form', function(e) {
        e.preventDefault();
        e.stopPropagation();
    });

    // Display product settings
    $doc.on('click', '.product-settings', function(e) {
        e.preventDefault();

        let $product = $(this).parent().parent();

        form_data_restructure(function() {
            
            let $popup = $('.fm-popup.setting-product-form');

            FM_PRODUCT_INDEX   = parseInt($product.data('index'));
            FM_CURRENT_PRODUCT = FM_FORM[ FM_PRODUCT_INDEX ];  
            
            main_window_scroll(true, function() {

                tinyMCE.get('product_before_content').setContent( FM_CURRENT_PRODUCT.content_before.replace(/\\/g, '') );
                tinyMCE.get('product_after_content').setContent( FM_CURRENT_PRODUCT.content_after.replace(/\\/g, '') );

                let _is_show_checkbox = parseInt(FM_CURRENT_PRODUCT.checkbox) ? true : false;
                if (_is_show_checkbox) {
                    $popup.find('.check-box-label-holder').fadeIn('fast');
                } else {
                    $popup.find('.check-box-label-holder').fadeOut('fast');
                }

                $popup.find('.product-name-input').val( FM_CURRENT_PRODUCT.product_name );
                $popup.find('.product-checkbox-enable').prop('checked', _is_show_checkbox);
                $popup.find('.product-checkbox-label').val( FM_CURRENT_PRODUCT.checkbox_label );
                $popup.find('h2').text( 'Settings: ' + FM_CURRENT_PRODUCT.product_name );

                $popup.fadeIn('fast');
                $popup.find('input:first').focus();

            });  



        });              
    });

    // Save form settings
    $doc.on('click', '.fm-product-settings-submit', function(e) {
        e.preventDefault();

        let _product_name   = $('input.product-name-input').val();
        let _content_before = tinyMCE.get('product_before_content').getContent();
        let _content_after  = tinyMCE.get('product_after_content').getContent();
        let _show_checkbox  = $('input.product-checkbox-enable').is(':checked') ? 1 : 0;
        let _checkbox_label = $('input.product-checkbox-label').val();

        FM_CURRENT_PRODUCT.product_name   = _product_name;
        FM_CURRENT_PRODUCT.content_before = _content_before;
        FM_CURRENT_PRODUCT.content_after  = _content_after;
        FM_CURRENT_PRODUCT.checkbox       = _show_checkbox;
        FM_CURRENT_PRODUCT.checkbox_label = _checkbox_label;

        FM_FORM[FM_PRODUCT_INDEX] = FM_CURRENT_PRODUCT;         
        
        update_form_data_fields( FM_FORM );
        main_window_scroll(false, popup_close); 
    });


    // Page settings
    $doc.on('click', '.form-settings', function(e) {

        let $popup = $('.setting-page-form');        
        
        main_window_scroll(true, function() {
            
            tinyMCE.get('page_before_content').setContent( FM_PAGE_SETTINGS.content_before.replace(/\\/g, '') );
            tinyMCE.get('page_after_content').setContent( FM_PAGE_SETTINGS.content_after.replace(/\\/g, '') );            
            
            $popup.find('.order-name-input').val( FM_ORDER_FORM_NAME.trim() );
            $popup.find('.order-send-to-email-input').val( FM_ORDER_EMAILS );
            $popup.find('.ordre-form-active').prop( 'checked', parseInt(FM_ORDER_FORM_STATUS) > 0 );
            $popup.fadeIn('fast');

        });  
    });

    // Apply page settings
    $doc.on('click', '.fm-page-settings-submit', function(e) {
        e.preventDefault();

        $('body').addClass('fm-loading');

        let _form_name      = $('.order-name-input').val();
        let _form_emails    = $('.order-send-to-email-input').val();
        let _content_before = tinyMCE.get('page_before_content').getContent();
        let _content_after  = tinyMCE.get('page_after_content').getContent();

        FM_ORDER_FORM_NAME   = _form_name.trim();
        FM_ORDER_EMAILS      = _form_emails;
        FM_ORDER_FORM_STATUS = $('.ordre-form-active').is(':checked') ? 1 : 0;

        FM_PAGE_SETTINGS = {
            content_before: _content_before,
            content_after : _content_after
        };

        $('.fm-title .page-title').text( FM_ORDER_FORM_NAME );

        setTimeout(function() {
            $('body').removeClass('fm-loading');
            main_window_scroll(false, popup_close);
        }, 500);
    });

    // Show checkbox label
    $doc.on('change', 'input.product-checkbox-enable', function() {
        let _is_show_checkbox = $(this).is(':checked');
        if (_is_show_checkbox) {
            $('.check-box-label-holder').fadeIn('fast');
        } else {
            $('.check-box-label-holder').fadeOut('fast');
        }
    });

    // Preview form
    $doc.on('click', '.preview-form', function(e) {
        e.preventDefault();
        window.open($(this).data('preview'), '_blank').focus();
    });


    // Set default form fields
    setTimeout(update_form_data_fields, 500);

    // Make the products sortable
    $('.form-holder').sortable({
        handle: '.order-item',
        update: update_product_order
    });

});