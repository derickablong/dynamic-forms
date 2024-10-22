<div class="order-header">
    <div class="order-left">
        <div class="detail-item">
            <div class="label">Person Placing Order:</div>
            <div class="value"><?php echo $order['person-placing-order'] ?></div>
        </div>
        <div class="detail-item">
            <div class="label">Organization Placing Order:</div>
            <div class="value"><?php echo $order['organization-placing-order'] ?></div>
        </div>        
    </div>
    <div class="order-right">
        <div class="detail-item">
            <div class="label">Order Date:</div>
            <div class="value"><?php echo date('F j, Y', strtotime($order['order-date'])) ?></div>
        </div>
        <div class="detail-item">
            <div class="label">Shipping Instructions:</div>
            <div class="value"><?php echo $order['shipping-instructions'] ?></div>
        </div>
    </div>
</div>