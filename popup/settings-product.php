<div class="fm-popup setting-product-form">
    <form method="post">        
        <div class="fm-form">
            <h2></h2>

            <div class="fm-field-item">
                <div class="label">Product name:</div>
                <div class="input">
                    <input type="text" class="product-name-input">
                </div>
            </div>

            <div class="fm-field-item">
                <div class="label">Content before product:</div>
                <div class="textarea">
                    <?php

                    $old_description = '';
                    $editor_id       = 'product_before_content';
                    wp_editor( $old_description , $editor_id, fm_toolbar_settings() );

                    ?>
                </div>
            </div>            

            <div class="fm-field-item">
                <div class="label">Content after product:</div>
                <div class="textarea">
                    <?php

                    $old_description = '';
                    $editor_id       = 'product_after_content';
                    wp_editor( $old_description , $editor_id, fm_toolbar_settings() );

                    ?>
                </div>
            </div>
            
            <div class="fm-field-item field-inline">                
                <div class="input">
                    <label class="switch">
                        <input type="checkbox" class="product-checkbox-enable">
                        <span class="slider round"></span>                    
                    </label>
                </div>
                <div class="label">Show checkbox</div>
            </div>

            <div class="fm-field-item check-box-label-holder">
                <div class="label">Checkbox label:</div>
                <div class="input">
                    <input type="text" class="product-checkbox-label">
                </div>
            </div>

            <div class="fm-field-button">
                <a class="button button-secondary fm-popup-cancel">
                    <span>Cancel</span>
                </a>
                <a class="button button-primary fm-product-settings-submit">
                    <span>Apply Settings</span>
                </a>
            </div>
        </div>
        <input type="hidden" name="form-id" value="0">
    </form>
</div>