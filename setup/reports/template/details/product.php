<div class="product-item">
    <div class="product-row header">
        <span class="name">
            <span><?php echo $product['product-name'] ?></span>
        </span>
        <span class="quantity">
            <span>Quantity</span>
        </span>
        <span class="total-units">
            <span>Total Units</span>
        </span>
    </div>
    
    <div class="supplies">
        <?php

        $supplies    = array_key_exists('supply-name', $product) ? $product['supply-name'] : [];
        $quantity    = array_key_exists('quantity', $product) ? $product['quantity'] : [];
        $total_units = array_key_exists('total-units', $product) ? $product['total-units'] : [];

        foreach ( $supplies as $index => $item ):
        ?>
        

        <div class="product-row supply-item">
            <span class="name">
                <span><?php echo $item ?></span>
            </span>
            <span class="quantity">
                <span><?php echo array_key_exists( $index, $quantity ) ? (int)$quantity[$index] ? $quantity[$index] : '-' : '-' ?></span>
            </span>
            <span class="total-units">
                <span><?php echo array_key_exists($index, $total_units) ? (int)$total_units[$index] ? $total_units[$index] : '-' : '-' ?></span>
            </span>
        </div>


        <?php endforeach; ?>
    </div>

    <?php
    $checkbox = array_key_exists( 'checkbox', $product ) ? $product['checkbox'] : 'off';
    $checkbox_label = array_key_exists( 'checkbox-label', $product ) ? $product['checkbox-label'] : '';

    if (!empty($checkbox_label) && $checkbox == 'on'):
    ?>
    
    <div class="checkbox">
        <span class="icon">
            <svg version="1.1" viewBox="0 0 18 18" width="30px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title/>
                <desc/>
                <defs/>
                <g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1">
                    <g fill="#000000" id="Core" transform="translate(-549.000000, -45.000000)">
                        <g id="check-box-outline" transform="translate(549.000000, 45.000000)">
                            <path d="M4.9,7.1 L3.5,8.5 L8,13 L18,3 L16.6,1.6 L8,10.2 L4.9,7.1 L4.9,7.1 Z M16,16 L2,16 L2,2 L12,2 L12,0 L2,0 C0.9,0 0,0.9 0,2 L0,16 C0,17.1 0.9,18 2,18 L16,18 C17.1,18 18,17.1 18,16 L18,8 L16,8 L16,16 L16,16 Z" id="Shape"/>
                        </g>
                    </g>
                </g>
            </svg>
        </span>
        <span class="checkbox-label">
            <span><?php echo $checkbox_label ?></span>
        </span>
    </div>

    <?php endif; ?>
</div>