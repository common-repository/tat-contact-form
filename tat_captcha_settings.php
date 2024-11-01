<?php
if ($_POST['tatcnt_hidden'] == 'Y') {
    ## Save form data ##
    $tatcnt_captcha_type = $_POST['tatcnt_captcha_type'];
    update_option('tatcnt_captcha_type', $tatcnt_captcha_type);
    ?>
    <div class="updated fade"><p><strong><?php _e('Settings saved.'); ?></strong></p></div>
    <?php
}
?>
<div class="wrap">
    <h2>Captcha Settings</h2>
    <form method="post" >
        <table class="form-table" style="width:500px">
            <tr valign="top">
                <th scope="row">Captcha Type</th>
                <td>
                    <input type="radio" name="tatcnt_captcha_type" value="0" <?php checked('0', get_option('tatcnt_captcha_type')); ?>/><label>Numeric</label>
                    <br/>
                    <input type="radio" name="tatcnt_captcha_type" value="1" <?php checked('1', get_option('tatcnt_captcha_type')); ?>/><label>Image</label>                    
                </td>
                <td></td>
            </tr>                   
        </table>
        <input type="hidden" name="tatcnt_hidden" id="tatcnt_hidden" value="Y" /> 
        <?php submit_button(); ?>

    </form>
</div>
