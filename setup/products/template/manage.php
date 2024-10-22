<div class="wrap" style="padding-right:100px!important">
    <h1 class="fm-page-title">
        <svg data-name="Layer 1" id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" width="60">
            <path d="M477.1,136.3a6,6,0,0,0-3.34-3.18l-279-107.7a6,6,0,0,0-7.8,3.45L171,70.28,113.76,59.63a6.08,6.08,0,0,0-7,4.82L98.59,108.1H40.41a6,6,0,0,0-6,6V481a6,6,0,0,0,6,6H339.5a6,6,0,0,0,5.83-4.53L477.21,140.92A6,6,0,0,0,477.1,136.3ZM345.53,115.08l54.11,10.08L345.53,415.55ZM196,38.84l180.83,69.8L183,72.53ZM117.48,72.6l190.58,35.5H110.86Zm-71,47.56h287V474.93h-287ZM357.39,417.74l55.05-295.36,51.35,19.82Z"/>
            <path d="M282.63,392.92H97.28a6,6,0,0,0,0,12.06H282.63a6,6,0,1,0,0-12.06Z"/>
            <path d="M282.63,348H97.28a6,6,0,1,0,0,12.06H282.63a6,6,0,1,0,0-12.06Z"/>
            <path d="M282.63,303.05H97.28a6,6,0,0,0,0,12.06H282.63a6,6,0,1,0,0-12.06Z"/>
            <path d="M282.63,258.11H97.28a6,6,0,1,0,0,12.06H282.63a6,6,0,1,0,0-12.06Z"/>
            <path d="M97.28,225.23H235.59a6,6,0,1,0,0-12.06H97.28a6,6,0,1,0,0,12.06Z"/>
        </svg>
        <span class="fm-title">
            <span class="page-sm">Manage Form:</span>
            <span class="page-title"><?php echo $form->form_name ?></span>
            <span class="status <?php echo $form->form_status ? 'active' : 'inactive' ?>"><?php echo $form->form_status ? 'Active' : 'Inactive' ?></span>
        </span>
    </h1>

    <?php do_action('fm-form-editor-popup', $form); ?>

    <div class="form-holder"></div>
</div>