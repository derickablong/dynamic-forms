<div class="product-item">    
    <?php
    
    # Content before
    do_action('fm-form-field-item-content-before', $product);

    # Supplies
    do_action('fm-form-field-item-content-supplies', $product);

    # Checkbox
    do_action('fm-form-field-item-checkbox', $product);

    # Content after
    do_action('fm-form-field-item-content-after', $product);

    ?>
</div>