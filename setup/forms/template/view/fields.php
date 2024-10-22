<div class="form-fields">
    <?php
    foreach ( $form_data as $product ) {
        if ($product->enabled)
            do_action('fm-form-field-item', $product);
    }
    ?>
</div>