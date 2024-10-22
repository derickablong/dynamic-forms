<div class="fm-popup setting-page-form">
    <form method="post">        
        <div class="fm-form">
            <h2>Form Settings</h2>

            <div class="fm-field-item field-inline" style="justify-content:flex-end">                
                <div class="input">
                    <label class="switch">
                        <input type="checkbox" class="ordre-form-active">
                        <span class="slider round"></span>                    
                    </label>
                </div>
                <div class="label">Active</div>
            </div>

            <div class="fm-field-item">
                <div class="label">Order Form:</div>
                <div class="input">
                    <input type="text" class="order-name-input">
                </div>
            </div>

            <div class="fm-field-item">
                <div class="label">Send to Email</div>
                <div class="instruction">Add multiple emails by just adding in new line.</div>
                <div class="input">
                    <textarea class="order-send-to-email-input"></textarea>
                </div>
            </div>

            <div class="fm-field-item">
                <div class="label">Content before order form:</div>
                <div class="textarea">
                    <?php

                    $old_description = '';
                    $editor_id       = 'page_before_content';
                    wp_editor( $old_description , $editor_id, fm_toolbar_settings(true) );

                    ?>
                </div>
            </div>            

            <div class="fm-field-item">
                <div class="label">Content after order form:</div>
                <div class="textarea">
                    <?php

                    $old_description = '';
                    $editor_id       = 'page_after_content';
                    wp_editor( $old_description , $editor_id, fm_toolbar_settings(true) );

                    ?>
                </div>
            </div>           
            

            <div class="fm-field-button">
                <a class="button button-secondary fm-popup-cancel">
                    <span>Cancel</span>
                </a>
                <a class="button button-primary fm-page-settings-submit">
                    <span>Apply Settings</span>
                </a>
            </div>
        </div>
        <input type="hidden" name="form-id" value="0">
    </form>
</div>