<?php
if ($product->checkbox < 1)
    return;

# Set slug for form indexing
$slug = sanitize_title( $product->product_name );

# Checkbox label
$checkbo_label = trim($product->checkbox_label);

?>

<div class="field-inline" style="margin-top:20px">
    <div class="input">
        <label class="switch">
            <input type="hidden" name="order[product][<?php echo $slug ?>][checkbox-label]" value="<?php echo $checkbo_label ?>">
            <input type="checkbox" class="checkbox" name="order[product][<?php echo $slug ?>][checkbox]">
            <span class="slider round"></span>                    
        </label>
    </div>
    <span class="label"><?php echo $checkbo_label ?></span>
</div>