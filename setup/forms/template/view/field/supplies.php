<?php

# Set slug for form indexing
$slug = sanitize_title( $product->product_name );

?>

<div class="product-fields">
    <div class="supply-item supply-item-header">
        <span class="name">
            <?php echo $product->product_name ?>
            <input type="hidden" name="order[product][<?php echo $slug ?>][product-name]" value="<?php echo $product->product_name ?>">
        </span>
        <span class="quantity">Quantity</span>
        <span class="total-units">Total Units</span>
    </div>
    <?php 
    foreach( $product->fields as $field ): 
        
        ?>

        <div class="supply-item">
            <span class="name"><?php echo $field->name ?></span>
            <span class="input quantity">
                <input type="hidden" name="order[product][<?php echo $slug ?>][supply-name][]" value="<?php echo $field->name ?>">
                <input type="number" name="order[product][<?php echo $slug ?>][quantity][]" data-quantity="<?php echo $field->quantity ?>" class="supply-quantity">
            </span>
            <span class="input total-units">
                <input type="text" name="order[product][<?php echo $slug ?>][total-units-dummy][]" class="supply-total" disabled>
                <input type="hidden" name="order[product][<?php echo $slug ?>][total-units][]" class="supply-total">
            </span>
        </div>

    <?php endforeach; ?>
</div>