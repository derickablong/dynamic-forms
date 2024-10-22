<div class="fm-form">
    <form method="post">
        <input type="hidden" name="form_id" value="<?php echo $form_id ?>">        
        <?php       
        
        # Form header
        do_action('fm-form-header', $form_details);

        # Content before
        do_action('fm-form-content-before', $page_settings);
        
        # Fields
        do_action('fm-form-fields', $form_data);
                
        # Content after
        do_action('fm-form-content-after', $page_settings);

        ?>

        <div class="form-submit">
            <input type="submit" value="Submit My Order" name="fm-submit-order">
        </div>
    </form>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {

    const $doc      = $(document);
    let   _interval = 100;
    let _timer;


    // Format total units
    function format_units( _total ) {
        return _total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Function to calculate total units
    function total_units( $input ) {

        const $item        = $input.parent().parent();
        const UNITS        = parseInt($input.data('quantity'));
        let   _quantity    = parseInt($input.val());
        const _total       = UNITS * _quantity;
        const _total_units = format_units( isNaN(_total) ? 0 : _total );

        $item.find('.supply-total').val( _total_units );
    }

    // Make sure to capture quantity changes
    $doc.on('change', '.supply-quantity', function() {
        const $input = $(this);
        total_units( $input );
    });

    //on keyup, start the countdown
    $doc.on('keyup', '.supply-quantity', function () {
        const $input = $(this);

        clearTimeout(_timer);
        _timer = setTimeout(function() {
            total_units( $input );
        }, _interval);
    });

    //on keydown, clear the countdown 
    $doc.on('keydown', '.supply-quantity', function () {
        clearTimeout(_timer);
    });

    // Allow checkbox label clickable
    $doc.on('click', '.field-inline .label', function(e) {
        e.preventDefault();        
        $(this).parent().find('.checkbox').trigger('click');
    });
});
</script>
