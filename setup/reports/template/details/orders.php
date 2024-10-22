<div class="order-products">
    <?php
    
    foreach( $order['product'] as $slug => $product ) {
        do_action('fm-details-product', $product);
    }
    
    ?>
</div>