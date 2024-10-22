<style>
.fm-nav, .fm-nav a {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
.fm-nav a {
    text-decoration: none;
    text-transform: uppercase;
    color: #3c434a;
    font-weight: 700;
    font-size: 13px;
    border-width: 1px;
    border-color: #c3c3c3;
    border-style: solid;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    border-top-width: 0;
    border-bottom-width: 1px;
    border-left-width: 1px;
    border-right-width: 1px;
    padding: 3px 10px;
    line-height: 1;
    background-color: #fff;
    margin: 0 1px;
    box-shadow: none!important;
}
.fm-nav a svg {
    margin-right: 3px;
    width: 20px;
    height: auto;
}
.fm-nav a:hover,
.fm-nav a.active {
    color: #2271b1;
}
</style>
<div class="fm-nav">
    <a href="/wp-admin/admin.php?page=ohrdp-fm" class="<?php echo $current_page=='home' ? 'active' : 'inactive' ?>">
        <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z"/></svg>
        <span>Dashboard</span>
    </a>
    <a href="/wp-admin/admin.php?page=ohrdp-fm&reports=1&form_id=<?php echo $form_id ?>" class="<?php echo $current_page=='reports' ? 'active' : 'inactive' ?>">
        <svg height="30" style="enable-background:new 0 0 1701 1701;" version="1.1" viewBox="0 0 1701 1701" width="30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="full_inbox"><g><path d="M1701,162.902C1701,72.934,1628.066,0,1538.098,0H162.902C72.934,0,0,72.934,0,162.902v1375.195    C0,1628.066,72.934,1701,162.902,1701h1375.195c89.969,0,162.902-72.934,162.902-162.902V162.902z M164.832,132h1375.517    c16.963,0,28.651,11.502,28.651,28.465V935h-398.719c-36.494,0-66.07,28.313-66.07,64.801    c0,143.903-117.076,260.348-260.979,260.348c-140.287,0-255.075-111.57-260.76-250.487c0.581-3.517,0.881-6.02,0.881-9.7    c0-36.49-29.581-64.961-66.071-64.961H132V160.465C132,143.502,147.87,132,164.832,132z M1540.349,1569H164.832    c-16.962,0-32.832-16.057-32.832-33.02V1067h323.663c31.503,185,193.305,327.05,387.568,327.05    c194.26,0,356.063-142.05,387.565-327.05H1569v468.98C1569,1552.943,1557.312,1569,1540.349,1569z"/><path d="M477.639,439h746.599c36.49,0,66.07-29.509,66.07-66s-29.58-66-66.07-66H477.639c-36.491,0-66.071,29.509-66.071,66    S441.148,439,477.639,439z"/><path d="M477.639,743h746.599c36.49,0,66.07-29.51,66.07-66s-29.58-66-66.07-66H477.639c-36.491,0-66.071,29.51-66.071,66    S441.148,743,477.639,743z"/></g></g><g id="Layer_1"/></svg>
        <span>Orders</span>
    </a>
    <a href="/wp-admin/admin.php?page=ohrdp-fm&manage=1&form_id=<?php echo $form_id ?>" class="<?php echo $current_page=='manage' ? 'active' : 'inactive' ?>">
        <svg viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><rect fill="none" height="30" width="30"/><path d="M229.6,106,203.7,91.6a73.6,73.6,0,0,0-6.3-10.9l.5-29.7a102.6,102.6,0,0,0-38.2-22L134.3,44.2a88.3,88.3,0,0,0-12.6,0L96.2,28.9A104,104,0,0,0,58.1,51l.5,29.7a73.6,73.6,0,0,0-6.3,10.9L26.3,106a103.6,103.6,0,0,0,.1,44l25.9,14.4a80.1,80.1,0,0,0,6.3,11L58.1,205a102.6,102.6,0,0,0,38.2,22l25.4-15.2a88.3,88.3,0,0,0,12.6,0l25.5,15.3A104,104,0,0,0,197.9,205l-.5-29.7a73.6,73.6,0,0,0,6.3-10.9l26-14.4A102,102,0,0,0,229.6,106ZM128,176a48,48,0,1,1,48-48A48,48,0,0,1,128,176Z" opacity="0.2"/><circle cx="128" cy="128" fill="none" r="48" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><path d="M197.4,80.7a73.6,73.6,0,0,1,6.3,10.9L229.6,106a102,102,0,0,1,.1,44l-26,14.4a73.6,73.6,0,0,1-6.3,10.9l.5,29.7a104,104,0,0,1-38.1,22.1l-25.5-15.3a88.3,88.3,0,0,1-12.6,0L96.3,227a102.6,102.6,0,0,1-38.2-22l.5-29.6a80.1,80.1,0,0,1-6.3-11L26.4,150a103.6,103.6,0,0,1-.1-44l26-14.4a73.6,73.6,0,0,1,6.3-10.9L58.1,51A104,104,0,0,1,96.2,28.9l25.5,15.3a88.3,88.3,0,0,1,12.6,0L159.7,29a102.6,102.6,0,0,1,38.2,22Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/></svg>
        <span>Manage Form</span>
    </a>
    <a href="#" class="inactive get-shortcode">
        <input type="text" value="[ORDER-FORM id='<?php echo $form_id ?>']" class="shortcode-input">
        <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg" width="30" height="30"><path d="M448 80C448 35.82 412.2 0 368 0C323.8 0 288 35.82 288 80c0 32.79 19.77 60.89 48 73.25V192c0 17.66-14.36 32-32 32h-160c-11.28 0-21.94 2.312-32 5.898V153.2C140.2 140.9 160 112.8 160 80C160 35.82 124.2 0 80 0C35.82 0 0 35.82 0 80c0 32.79 19.77 60.89 48 73.25v205.5C19.77 371.1 0 399.2 0 432C0 476.2 35.82 512 80 512C124.2 512 160 476.2 160 432c0-32.79-19.77-60.89-48-73.25V320c0-17.66 14.36-32 32-32h160c52.94 0 96-43.06 96-96V153.2C428.2 140.9 448 112.8 448 80zM80 56c13.23 0 24 10.77 24 24S93.23 104 80 104c-13.23 0-24-10.77-24-24S66.77 56 80 56zM80 456c-13.23 0-24-10.77-24-24s10.77-24 24-24c13.23 0 24 10.77 24 24S93.23 456 80 456zM368 56c13.23 0 24 10.77 24 24s-10.77 24-24 24c-13.23 0-24-10.77-24-24S354.8 56 368 56z"/></svg>
        <span>Get Code</span>
    </a>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
    const $doc = $(document);
    // Get shortcode
    $doc.on('click', '.get-shortcode', function(e) {
        e.preventDefault();
        // Get the text field
        const $input = $(this).find('.shortcode-input');

        // Select the text field
        $input.select();        
        
        // Copy the text inside the text field
        document.execCommand("copy");

        alert('Shortcode successfully copied to clipboard. You can now use it to your page by pressing CTRL + v shortcut key.');
    });
});
</script>