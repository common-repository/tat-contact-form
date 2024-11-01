<?php
if ($_POST['tatcnt_hidden'] == 'Y') {
    ## Save form data ##
    $tatcnt_cus_style = $_POST['tatcnt_cus_style'];
    update_option('tatcnt_cus_style', $tatcnt_cus_style);

    $tatcnt_cus_style_enable = $_POST['tatcnt_cus_style_enable'];
    update_option('tatcnt_cus_style_enable', $tatcnt_cus_style_enable);
    ?>
    <div class="updated fade"><p><strong><?php _e('Settings saved.'); ?></strong></p></div>
    <?php
}
?>
<div class="wrap">
    <h2>Custom Style</h2>
    <form method="post" >
        <table class="form-table" style="width:500px">
            <tr valign="top">
                <th scope="row">Custom Style</th>
                <td>
                    <input type="radio" name="tatcnt_cus_style_enable" value="1" <?php checked('1', get_option('tatcnt_cus_style_enable')); ?>/><label>Enable</label>
                    <input type="radio" name="tatcnt_cus_style_enable" value="0" <?php checked('0', get_option('tatcnt_cus_style_enable')); ?>/><label>Disable</label>                    
                </td>
                <td></td>
            </tr>
            <tr valign="top">
                <th scope="row">Style</th>
                <td>
                    <textarea rows="15" cols="150" name="tatcnt_cus_style" id="tatcnt_cus_style" ><?php echo trim(get_option('tatcnt_cus_style')); ?></textarea>
                </td>
                <td></td>
            </tr>                   
        </table>
        <input type="hidden" name="tatcnt_hidden" id="tatcnt_hidden" value="Y" /> 
        <?php submit_button(); ?>
    </form>
</div>
