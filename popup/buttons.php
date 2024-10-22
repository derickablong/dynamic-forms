<button class="add-new-form" title="Add new kit" data-form="<?php echo $form_id ?>">
    <svg baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <path d="M18,10h-4V6c0-1.104-0.896-2-2-2s-2,0.896-2,2l0.071,4H6c-1.104,0-2,0.896-2,2s0.896,2,2,2l4.071-0.071L10,18  c0,1.104,0.896,2,2,2s2-0.896,2-2v-4.071L18,14c1.104,0,2-0.896,2-2S19.104,10,18,10z"/>
    </svg>
</button>

<button class="save-changes" title="Save Changes" data-form="<?php echo $form_id ?>">
    <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
        <path d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM272 80v80H144V80h128zm122 352H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h42v104c0 13.255 10.745 24 24 24h176c13.255 0 24-10.745 24-24V83.882l78.243 78.243a6 6 0 0 1 1.757 4.243V426a6 6 0 0 1-6 6zM224 232c-48.523 0-88 39.477-88 88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88zm0 128c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40z"/>
    </svg>
</button>

<button class="form-settings" title="Order form settings" data-form="<?php echo $form_id ?>" data-order-form="<?php echo $order_form->form_name ?>" data-status="<?php echo $order_form->form_status ?>" data-order-emails="<?php echo $order_form->form_emails ?>">
    <svg enable-background="new 0 0 32 32" id="Editable-line" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <circle cx="16" cy="16" fill="none" id="XMLID_224_" r="4" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
        <path d="  M27.758,10.366l-1-1.732c-0.552-0.957-1.775-1.284-2.732-0.732L23.5,8.206C21.5,9.36,19,7.917,19,5.608V5c0-1.105-0.895-2-2-2h-2  c-1.105,0-2,0.895-2,2v0.608c0,2.309-2.5,3.753-4.5,2.598L7.974,7.902C7.017,7.35,5.794,7.677,5.242,8.634l-1,1.732  c-0.552,0.957-0.225,2.18,0.732,2.732L5.5,13.402c2,1.155,2,4.041,0,5.196l-0.526,0.304c-0.957,0.552-1.284,1.775-0.732,2.732  l1,1.732c0.552,0.957,1.775,1.284,2.732,0.732L8.5,23.794c2-1.155,4.5,0.289,4.5,2.598V27c0,1.105,0.895,2,2,2h2  c1.105,0,2-0.895,2-2v-0.608c0-2.309,2.5-3.753,4.5-2.598l0.526,0.304c0.957,0.552,2.18,0.225,2.732-0.732l1-1.732  c0.552-0.957,0.225-2.18-0.732-2.732L26.5,18.598c-2-1.155-2-4.041,0-5.196l0.526-0.304C27.983,12.546,28.311,11.323,27.758,10.366z  " fill="none" id="XMLID_242_" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"/>
    </svg>
</button>

<button class="preview-form" title="Preview Order Form" data-form="<?php echo $form_id ?>" data-preview="/wp-admin/admin.php?page=ohrdp-fm&preview=1&form_id=<?php echo $form_id ?>">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <g data-name="32. Veiw" id="_32._Veiw">
            <path d="M23.909,11.582C21.943,7.311,17.5,3,12,3S2.057,7.311.091,11.582a1.008,1.008,0,0,0,0,.836C2.057,16.689,6.5,21,12,21s9.943-4.311,11.909-8.582A1.008,1.008,0,0,0,23.909,11.582ZM12,19c-4.411,0-8.146-3.552-9.89-7C3.854,8.552,7.589,5,12,5s8.146,3.552,9.89,7C20.146,15.448,16.411,19,12,19Z"/>
            <path d="M12,7a5,5,0,1,0,5,5A5.006,5.006,0,0,0,12,7Zm0,8a3,3,0,1,1,3-3A3,3,0,0,1,12,15Z"/>
        </g>
    </svg>
</button>