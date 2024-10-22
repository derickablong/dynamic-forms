<table cellpadding="0" cellspacing="0" style="width:100%; max-width:600px; border-top: solid 4px #818181; border-left: solid 1px #818181; border-right: solid 1px #818181;  border-bottom: solid 1px #818181; border-radius: 10px; background-color: #fff; padding: 20px; overflow:hidden;">
    <tbody>
        <tr>
            <td>
                <?php
                # Shipping details
                do_action('fm-mail-shipping', $order);
                # Orders
                do_action('fm-mail-orders', $order);
                ?>
            </td>
        </tr>        
    </tbody>
</table>