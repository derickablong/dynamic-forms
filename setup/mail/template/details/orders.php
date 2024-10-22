<?php
foreach( $order['product'] as $slug => $product ) {
    do_action('fm-mail-product', $product);
}
?>