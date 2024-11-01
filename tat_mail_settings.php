<?php
if ($_POST['tatcnt_hidden'] == 'Y') {
    ## Get form data
    $tatcnt_blogname = $_POST['tatcnt_blogname'];
    $tatcnt_recpnt_mail = $_POST['tatcnt_recpnt_mail'];
    $tatcnt_mail_adminsubject = $_POST['tatcnt_mail_adminsubject'];
    $tatcnt_mail_subject = $_POST['tatcnt_mail_subject'];
    $tatcnt_cunfrm_mail = $_POST['tatcnt_cunfrm_mail'];
    $tatcnt_mail_cussubject = $_POST['tatcnt_mail_cussubject'];
    $tatcnt_succ_msg = $_POST['tatcnt_succ_msg'];
    $tatcnt_err_msg = $_POST['tatcnt_err_msg'];

    ## Validate form data
    if ($tatcnt_mail_adminsubject == '') {
        ?>
        <div class="updated error-message fade"><p><strong><?php _e('Subject for admin notification should not be empty.'); ?></strong></p></div>
    <?php } else if ($tatcnt_mail_subject == '') { ?>
        <div class="updated error-message fade"><p><strong><?php _e('Auto reply subject should not be empty.'); ?></strong></p></div>
    <?php } else if ($tatcnt_cunfrm_mail == '') { ?>
        <div class="updated error-message fade"><p><strong><?php _e('Confirmation Mail should not be empty.'); ?></strong></p></div>
    <?php } else if ($tatcnt_succ_msg == '') { ?>
        <div class="updated error-message fade"><p><strong><?php _e('Success message not be empty.'); ?></strong></p></div>
        <?php
    } else {
        ## Save form data
        update_option('tatcnt_blogname', $tatcnt_blogname);
        update_option('tatcnt_recpnt_mail', $tatcnt_recpnt_mail);
        update_option('tatcnt_mail_adminsubject', $tatcnt_mail_adminsubject);
        update_option('tatcnt_mail_subject', $tatcnt_mail_subject);
        update_option('tatcnt_cunfrm_mail', $tatcnt_cunfrm_mail);
        update_option('tatcnt_mail_cussubject', $tatcnt_mail_cussubject);
        update_option('tatcnt_succ_msg', $tatcnt_succ_msg);
        update_option('tatcnt_err_msg', $tatcnt_err_msg);
    }
    ?>
    <div class="updated fade"><p><strong><?php _e('Settings saved.'); ?></strong></p></div>
    <?php
} else {
    ## Get form data from db
    $tatcnt_blogname = get_option('tatcnt_blogname');
    $tatcnt_recpnt_mail = get_option('tatcnt_recpnt_mail');
    $tatcnt_mail_adminsubject = get_option('tatcnt_mail_adminsubject');
    $tatcnt_mail_subject = get_option('tatcnt_mail_subject');
    $tatcnt_mail_cussubject = get_option('tatcnt_mail_cussubject');
    $tatcnt_cunfrm_mail = get_option('tatcnt_cunfrm_mail');
    $tatcnt_succ_msg = get_option('tatcnt_succ_msg');
    $tatcnt_err_msg = get_option('tatcnt_err_msg');
}
?>

<div class="wrap">
    <h2>E Mail Template Settings</h2>

    <form method="post" >
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><b>Blog name or Your name</b></th>
                <td>
                    <input type="text" name="tatcnt_blogname" id="tatcnt_blogname" value="<?php echo get_option('tatcnt_blogname'); ?>" size="58"/><br/>
                    <i>Blog name or Your name used where contact form success mail from name. If left blank, the blog's name is used</i>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><b>Recipient e-mail</b></th>
                <td>
                    <input type="email" name="tatcnt_recpnt_mail" id="tatcnt_recpnt_mail" value="<?php echo get_option('tatcnt_recpnt_mail'); ?>" size="58"/><br/>
                    <i>E-mail address where feedback form content will be sent to. If left blank, the blog's admin email is used</i>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Subject for admin notification</th>
                <td>
                    <input required type="text" name="tatcnt_mail_adminsubject" id="tatcnt_mail_adminsubject" value="<?php echo get_option('tatcnt_mail_adminsubject'); ?>" size="58"/>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Auto reply subject</th>
                <td>
                    <input required type="text" name="tatcnt_mail_subject" id="tatcnt_mail_subject" value="<?php echo get_option('tatcnt_mail_subject'); ?>" size="58"/>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Custom reply subject</th>
                <td>
                    <input type="text" name="tatcnt_mail_cussubject" id="tatcnt_mail_cussubject" value="<?php echo get_option('tatcnt_mail_cussubject'); ?>" size="58"/>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Confirmation Mail</th>
                <td>
                    <textarea required name="tatcnt_cunfrm_mail" cols="60" rows="6"><?php echo get_option('tatcnt_cunfrm_mail'); ?></textarea><br/>
                    <i>Message to send when mail received to notify mail</i>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Success message</th>

                <td>
                    <textarea required name="tatcnt_succ_msg" cols="60" rows="6"><?php echo get_option('tatcnt_succ_msg'); ?></textarea><br/>
                    <i>Message to display when form is successfully submitted</i>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Error message</th>
                <td>
                    <textarea name="tatcnt_err_msg" cols="60" rows="6"><?php echo get_option('tatcnt_err_msg'); ?></textarea><br/>
                    <i>Message to display when user input errors are detected (for instance, empty required fields)</i>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row" colspan="2">
            <hr/>
            </th>
            </tr>
        </table>
        <input type="hidden" name="tatcnt_hidden" id="tatcnt_hidden" value="Y" /> 
        <?php submit_button(); ?>
    </form>
</div>
