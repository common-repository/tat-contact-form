<?php
require_once ('class/tat_contact_class.php');
$TATContact = new tat_contact_class();
$contactDetails = $TATContact->get_tatContact($_GET['cid']);
if (isset($_POST['tatcnt_hidden'])) {

    $to = $contactDetails->email;
    $tatcnt_from = get_option('tatcnt_recpnt_mail');
    if (empty($tatcnt_from)) {
        $tatcnt_from = get_option('admin_email');
    }

    $tatcnt_blogname = get_option('tatcnt_blogname');
    if (empty($tatcnt_blogname)) {
        $tatcnt_blogname = get_option('blogname');
    }

    $repsubject = $_POST['repsubject'];
    if ($repsubject) {
        $repsubject = get_option('tatcnt_mail_subject');
    }

    $repmsg = $_POST['repmsg'];
    $repmsg = nl2br($repmsg);

    if ($to == '') {
        ?>
        <div class="updated error-message fade"><p><strong><?php _e('Email should not be empty.'); ?></strong></p></div>
    <?php } else if ($repmsg == '') { ?>
        <div class="updated error-message fade"><p><strong><?php _e('Message should not be empty.'); ?></strong></p></div>
        <?php
    } else {
        if (wp_mail($to, $repsubject, $repmsg, "From: $tatcnt_blogname <$tatcnt_from>")) {
            ?>
            <div class="updated fade"><p><strong><?php _e('Successfully replied to ' . $contactDetails->fname); ?></strong></p></div>
        <?php } else { ?>
            <div class="updated error-message fade"><p><strong><?php _e('Failed.'); ?></strong></p></div>
            <?php
        }
    }
}
?>
<style type="text/css">
    .wrap td{
        word-wrap: break-word !important;
    }

    #subjectcnt{
        word-wrap: break-word !important;
        max-width: 600px !important;
    }

    #msgcnt{
        word-wrap: break-word !important;
        max-width: 700px !important;
    }
    p.submit{
        width: 60px !important;
        float: left !important;
        margin: 0px !important;
        padding: 0px !important;
    }
</style>
<div class="wrap"> 
    <h2>Reply</h2> 
    <hr/>
    <form method="post" >
        <table class="form-table" style="width: 500px!important">
            <tr valign="top">
                <th scope="row"><b>First Name</b></th>
                <td><?php echo $contactDetails->fname; ?></td>
            </tr>            
            <tr valign="top">
                <th scope="row"><b>Email</b></th>
                <td><?php echo $contactDetails->email; ?></td>
            </tr>
            <tr valign="top">
                <th scope="row"><b>Subject</b></th>
                <td id="subjectcnt"><?php echo $contactDetails->subject; ?></td>                
            </tr>
            <tr valign="top">
                <th scope="row" colspan="2"><b>Message</b></th>                
            </tr>
            <tr valign="top" >                
                <td colspan="2" id="msgcnt"><?php echo $contactDetails->msgtext; ?></td>
            </tr>
            <tr valign="top">
                <th scope="row"><b>Reply Subject</b></th>
                <td>
                    <input required type="text" name="repsubject" id="repsubject" value="<?php echo get_option('tatcnt_mail_adminsubject'); ?>" size="75"/>
                    <br/><i>If subject left blank, the auto reply subject is used.</i>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row" colspan="2"><b>Reply Message</b></th>                
            </tr>
            <tr valign="top" >                
                <td colspan="2" id="msgcnt">
                    <textarea required name="repmsg" cols="120" rows="10"><?php echo get_option('tatcnt_cunfrm_mail'); ?></textarea>
                </td>
            </tr>
            <tr valign="top" >                
                <td colspan="2">
                    <?php submit_button('Send'); ?>
                    <input type="button" name="" value="Back to List" class="button-primary" onclick="window.history.back();"/>
                    <input type="hidden" name="tatcnt_hidden" id="tatcnt_hidden" value="Y" /> 
                </td>
            </tr>
        </table>
    </form>
</div>