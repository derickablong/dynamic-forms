<table cellpadding="0" cellspacing="0">
    <colgroup>
        <col span="1" style="width:50%">
        <col span="1" style="width:50%">
    </colgroup>
    <tbody>
        <tr>
            <th style="padding: 5px 60px 5px 0; text-align:left; vertical-align:top;">
                <div style="border-bottom:dashed 1px #818181;padding-bottom:3px;">Person Placing Order:</div>
            </th>
            <th style="padding: 5px 0 5px 0; text-align:left; vertical-align:top;">
                <div style="border-bottom:dashed 1px #818181;padding-bottom:3px; vertical-align:top;">Order Date:</div>
            </th>            
        </tr>
        <tr>
            <td style="padding: 5px 60px 10px 0; vertical-align:top;"><?php echo $order['person-placing-order'] ?></td>
            <td style="padding: 5px 0 5px 0; vertical-align:top;"><?php echo date('F j, Y', strtotime($order['order-date'])) ?></td>            
        </tr>
        <tr>
            <th style="padding: 5px 60px 5px 0; text-align:left; vertical-align:top;">
                <div style="border-bottom:dashed 1px #818181;padding-bottom:3px; vertical-align:top;">Organization Placing Order:</div>
            </th>
            <th style="padding: 5px 0 5px 0; text-align:left; vertical-align:top;">
                <div style="border-bottom:dashed 1px #818181;padding-bottom:3px;">Shipping Instructions:</div>                
            </th>            
        </tr>
        <tr>
            <td style="padding: 5px 60px 5px 0; vertical-align:top;"><?php echo $order['organization-placing-order'] ?></td>
            <td style="padding: 5px 0 10px 0; vertical-align:top;"><?php echo $order['shipping-instructions'] ?></td>
        </tr>
    </tbody>    
</table>