<table cellpadding="0" cellspacing="0" style="width: 100%; border-top: solid 4px #818181; border-left: solid 1px #818181; border-right: solid 1px #818181;  border-bottom: solid 1px #818181; border-radius: 10px; background-color: #fff; margin-top: 20px; overflow:hidden;">
    <colgroup>
        <col span="1" style="width:50%">
        <col span="1" style="width:25%">
        <col span="1" style="width:25%">
    </colgroup>
    <tbody>
        <tr>
            <td style="background-color:#ccc; border-bottom: dashed 1px #818181; padding: 5px 10px; vertical-align:top;">
                <span>
                    <strong><?php echo $product['product-name'] ?></strong>
                </span>
            </td>
            <td style="background-color:#ccc; border-bottom: dashed 1px #818181; padding: 5px 10px; vertical-align:top;">
                <span>
                    <strong>Quantity</strong>
                </span>
            </td>
            <td style="background-color:#ccc; border-bottom: dashed 1px #818181; padding: 5px 10px; vertical-align:top;">
                <span>
                    <strong>Total Units</strong>
                </span>
            </td>
        </tr>
        <?php
        $supplies    = array_key_exists('supply-name', $product) ? $product['supply-name'] : [];
        $quantity    = array_key_exists('quantity', $product) ? $product['quantity'] : [];
        $total_units = array_key_exists('total-units', $product) ? $product['total-units'] : [];

        foreach ( $supplies as $index => $item ):
        ?>
        <tr>
            <td style="border-bottom: solid 1px #818181; padding: 5px 10px; vertical-align:top;">
                <span><?php echo $item ?></span>
            </td>    
            <td style="border-bottom: solid 1px #818181; padding: 5px 10px; vertical-align:top;">
                <span><?php echo array_key_exists( $index, $quantity ) ? (int)$quantity[$index] ? $quantity[$index] : '-' : '-' ?></span>
            </td>
            <td style="border-bottom: solid 1px #818181; padding: 5px 10px; vertical-align:top;">
                <span><?php echo array_key_exists($index, $total_units) ? (int)$total_units[$index] ? $total_units[$index] : '-' : '-' ?></span>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php
        $checkbox = array_key_exists( 'checkbox', $product ) ? $product['checkbox'] : 'off';
        $checkbox_label = array_key_exists( 'checkbox-label', $product ) ? $product['checkbox-label'] : '';

        if (!empty($checkbox_label) && $checkbox == 'on'):
        ?>
        <tr>
            <td colspan="3" style="background-color:#ccc; padding: 10px; vertical-align:middle;">                
                <img src="<?php echo OHRDP_FM_ASSETS .'css/check.png' ?>" alt="" width="20" height="20" style="margin-right:5px;">
                <span><?php echo $checkbox_label ?></span>                
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>