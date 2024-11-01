<?php
if ($_POST['tatcnt_hidden'] == 'Y') {
    ## Save form data ##
    $tatcnt_showtitle = $_POST['tatcnt_showtitle'];
    update_option('tatcnt_showtitle', $tatcnt_showtitle);
    
    $tatcnt_fldicon = $_POST['tatcnt_fldicon'];
    update_option('tatcnt_fldicon', $tatcnt_fldicon);
    
    $tatcnt_lastname = $_POST['tatcnt_lastname'];
    update_option('tatcnt_lastname', $tatcnt_lastname);
    update_option('tatcnt_lastname_chk', $_POST['tatcnt_lastname_chk']);

    $tatcnt_compnay = $_POST['tatcnt_compnay'];
    update_option('tatcnt_compnay', $tatcnt_compnay);
    update_option('tatcnt_compnay_chk', $_POST['tatcnt_compnay_chk']);

    $tatcnt_address1 = $_POST['tatcnt_address1'];
    update_option('tatcnt_address1', $tatcnt_address1);
    update_option('tatcnt_address1_chk', $_POST['tatcnt_address1_chk']);

    $tatcnt_address2 = $_POST['tatcnt_address2'];
    update_option('tatcnt_address2', $tatcnt_address2);
    update_option('tatcnt_address2_chk', $_POST['tatcnt_address2_chk']);

    $tatcnt_city = $_POST['tatcnt_city'];
    update_option('tatcnt_city', $tatcnt_city);
    update_option('tatcnt_city_chk', $_POST['tatcnt_city_chk']);

    $tatcnt_state = $_POST['tatcnt_state'];
    update_option('tatcnt_state', $tatcnt_state);
    update_option('tatcnt_state_chk', $_POST['tatcnt_state_chk']);

    $tatcnt_country = $_POST['tatcnt_country'];
    update_option('tatcnt_country', $tatcnt_country);
    update_option('tatcnt_country_chk', $_POST['tatcnt_country_chk']);

    $tatcnt_telnumber = $_POST['tatcnt_telnumber'];
    update_option('tatcnt_telnumber', $tatcnt_telnumber);
    update_option('tatcnt_telnumber_chk', $_POST['tatcnt_telnumber_chk']);

    $tatcnt_mobnumber = $_POST['tatcnt_mobnumber'];
    update_option('tatcnt_mobnumber', $tatcnt_mobnumber);
    update_option('tatcnt_mobnumber_chk', $_POST['tatcnt_mobnumber_chk']);

    $tatcnt_faxnumber = $_POST['tatcnt_faxnumber'];
    update_option('tatcnt_faxnumber', $tatcnt_faxnumber);
    update_option('tatcnt_faxnumber_chk', $_POST['tatcnt_faxnumber_chk']);

    $tatcnt_mail = $_POST['tatcnt_mail'];
    update_option('tatcnt_mail', $tatcnt_mail);
    update_option('tatcnt_mail_chk', $_POST['tatcnt_mail_chk']);

    $tatcnt_website = $_POST['tatcnt_website'];
    update_option('tatcnt_website', $tatcnt_website);
    update_option('tatcnt_website_chk', $_POST['tatcnt_website_chk']);
    
    $tatcnt_category = $_POST['tatcnt_category'];
    update_option('tatcnt_category', $tatcnt_category);
    update_option('tatcnt_category_chk', $_POST['tatcnt_category_chk']);
    update_option('tatcnt_category_options', $_POST['tatcnt_category_options']);

    $tatcnt_subject = $_POST['tatcnt_subject'];
    update_option('tatcnt_subject', $tatcnt_subject);
    update_option('tatcnt_subject_chk', $_POST['tatcnt_subject_chk']);
    
    $tatcnt_attachment = $_POST['tatcnt_attachment'];
    update_option('tatcnt_attachment', $tatcnt_attachment);
    update_option('tatcnt_attachment_chk', $_POST['tatcnt_attachment_chk']);    

    $tatcnt_captcha = $_POST['tatcnt_captcha'];
    update_option('tatcnt_captcha', $tatcnt_captcha);
    
    ?>
    <div class="updated fade"><p><strong><?php _e('Settings saved.'); ?></strong></p></div>
    <?php
} else {
    ## Get form data from db ##
    
    $tatcnt_showtitle = get_option('tatcnt_showtitle');
    
    $tatcnt_fldicon = get_option('tatcnt_fldicon');
        
    $tatcnt_lastname = get_option('tatcnt_lastname');

    $tatcnt_compnay = get_option('tatcnt_compnay');

    $tatcnt_address1 = get_option('tatcnt_address1');

    $tatcnt_address2 = get_option('tatcnt_address2');

    $tatcnt_city = get_option('tatcnt_city');

    $tatcnt_state = get_option('tatcnt_state');

    $tatcnt_country = get_option('tatcnt_country');

    $tatcnt_telnumber = get_option('tatcnt_telnumber');

    $tatcnt_mobnumber = get_option('tatcnt_mobnumber');

    $tatcnt_faxnumber = get_option('tatcnt_faxnumber');

    $tatcnt_mail = get_option('tatcnt_mail');

    $tatcnt_website = get_option('tatcnt_website');

    $tatcnt_subject = get_option('tatcnt_subject');
    
    $tatcnt_attachment = get_option('tatcnt_attachment');

    $tatcnt_captcha = get_option('tatcnt_captcha');

}
?>
<div class="wrap">
    <h2>Form Field Settings</h2>
    <form method="post" >
        <table class="form-table" style="width:500px">
            <tr valign="top">
                <th scope="row">Show Form Title</th>
                <td>
                    <input type="radio" name="tatcnt_showtitle" value="1" <?php checked('1', get_option('tatcnt_showtitle')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_showtitle" value="0" <?php checked('0', get_option('tatcnt_showtitle')); ?>/><label>Hide</label>                    
                </td>
                <td></td>
            </tr>
            <tr valign="top">
                <th scope="row">Fields Icon</th>
                <td>
                    <input type="radio" name="tatcnt_fldicon" value="1" <?php checked('1', get_option('tatcnt_fldicon')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_fldicon" value="0" <?php checked('0', get_option('tatcnt_fldicon')); ?>/><label>Hide</label>                    
                </td>
                <td></td>
            </tr>
            <tr valign="top">
                <th scope="row">Last Name</th>
                <td>
                    <input type="radio" name="tatcnt_lastname" value="1" <?php checked('1', get_option('tatcnt_lastname')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_lastname" value="0" <?php checked('0', get_option('tatcnt_lastname')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_lastname_chk" value="1" <?php checked(get_option('tatcnt_lastname_chk')); ?>/><label>Required</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Company</th>
                <td>
                    <input type="radio" name="tatcnt_compnay" value="1" <?php checked('1', get_option('tatcnt_compnay')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_compnay" value="0" <?php checked('0', get_option('tatcnt_compnay')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_compnay_chk" value="1" <?php checked(get_option('tatcnt_compnay_chk')); ?>/><label>Required</label>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Address 1</th>
                <td>
                    <input type="radio" name="tatcnt_address1" value="1" <?php checked('1', get_option('tatcnt_address1')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_address1" value="0" <?php checked('0', get_option('tatcnt_address1')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_address1_chk" value="1" <?php checked(get_option('tatcnt_address1_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Address 2</th>
                <td>
                    <input type="radio" name="tatcnt_address2" value="1" <?php checked('1', get_option('tatcnt_address2')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_address2" value="0" <?php checked('0', get_option('tatcnt_address2')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_address2_chk" value="1" <?php checked(get_option('tatcnt_address2_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">City</th>
                <td>
                    <input type="radio" name="tatcnt_city" value="1" <?php checked('1', get_option('tatcnt_city')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_city" value="0" <?php checked('0', get_option('tatcnt_city')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_city_chk" value="1" <?php checked(get_option('tatcnt_city_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">State</th>
                <td>
                    <input type="radio" name="tatcnt_state" value="1" <?php checked('1', get_option('tatcnt_state')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_state" value="0" <?php checked('0', get_option('tatcnt_state')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_state_chk" value="1" <?php checked(get_option('tatcnt_state_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Country</th>
                <td>
                    <input type="radio" name="tatcnt_country" value="1" <?php checked('1', get_option('tatcnt_country')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_country" value="0" <?php checked('0', get_option('tatcnt_country')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_country_chk" value="1" <?php checked(get_option('tatcnt_country_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Telephone Number</th>
                <td>
                    <input type="radio" name="tatcnt_telnumber" value="1" <?php checked('1', get_option('tatcnt_telnumber')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_telnumber" value="0" <?php checked('0', get_option('tatcnt_telnumber')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_telnumber_chk" value="1" <?php checked(get_option('tatcnt_telnumber_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Mobile Number</th>
                <td>
                    <input type="radio" name="tatcnt_mobnumber" value="1" <?php checked('1', get_option('tatcnt_mobnumber')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_mobnumber" value="0" <?php checked('0', get_option('tatcnt_mobnumber')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_mobnumber_chk" value="1" <?php checked(get_option('tatcnt_mobnumber_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Fax Number</th>
                <td>
                    <input type="radio" name="tatcnt_faxnumber" value="1" <?php checked('1', get_option('tatcnt_faxnumber')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_faxnumber" value="0" <?php checked('0', get_option('tatcnt_faxnumber')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_faxnumber_chk" value="1" <?php checked(get_option('tatcnt_faxnumber_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Email</th>
                <td>
                    <input type="radio" name="tatcnt_mail" value="1" <?php checked('1', get_option('tatcnt_mail')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_mail" value="0" <?php checked('0', get_option('tatcnt_mail')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_mail_chk" value="1" <?php checked(get_option('tatcnt_mail_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Web Site</th>
                <td>
                    <input type="radio" name="tatcnt_website" value="1" <?php checked('1', get_option('tatcnt_website')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_website" value="0" <?php checked('0', get_option('tatcnt_website')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_website_chk" value="1" <?php checked(get_option('tatcnt_website_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Category</th>
                <td>
                    <input type="radio" name="tatcnt_category" value="1" <?php checked('1', get_option('tatcnt_category')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_category" value="0" <?php checked('0', get_option('tatcnt_category')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_category_chk" value="1" <?php checked(get_option('tatcnt_category_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <label>Category list values should be separated by comma(,)</label>
                    <textarea rows="3" cols="75" name="tatcnt_category_options"><?php echo get_option('tatcnt_category_options'); ?></textarea>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Subject</th>
                <td>
                    <input type="radio" name="tatcnt_subject" value="1" <?php checked('1', get_option('tatcnt_subject')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_subject" value="0" <?php checked('0', get_option('tatcnt_subject')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_subject_chk" value="1" <?php checked(get_option('tatcnt_subject_chk')); ?>/><label>Required</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Attachment</th>
                <td>
                    <input type="radio" name="tatcnt_attachment" value="1" <?php checked('1', get_option('tatcnt_attachment')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_attachment" value="0" <?php checked('0', get_option('tatcnt_attachment')); ?>/><label>Hide</label>                    
                </td>
                <td>
                    <input type="checkbox" name="tatcnt_attachment_chk" value="1" <?php checked(get_option('tatcnt_attachment_chk')); ?>/><label>Required</label>
                </td>
            </tr> 
            <tr valign="top">
                <th scope="row">Captcha</th>
                <td>
                    <input type="radio" name="tatcnt_captcha" value="1" <?php checked('1', get_option('tatcnt_captcha')); ?>/><label>Show</label>
                    <input type="radio" name="tatcnt_captcha" value="0" <?php checked('0', get_option('tatcnt_captcha')); ?>/><label>Hide</label>                    
                </td>
                <td>                    
                </td>
            </tr>
        </table>
        <input type="hidden" name="tatcnt_hidden" id="tatcnt_hidden" value="Y" /> 
        <?php submit_button(); ?>

    </form>
</div>
