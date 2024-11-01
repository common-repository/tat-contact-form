<?php
require_once ('class/tat_contact_class.php'); 
$TATContact = new tat_contact_class();
$contactDetails = $TATContact->get_tatContact($_GET['cid']);
$tatcnt_showtitle = get_option('tatcnt_showtitle');
    
    $tatcnt_firstname = get_option('tatcnt_firstname');

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

    $tatcnt_category = get_option('tatcnt_category');
    
    $tatcnt_subject = get_option('tatcnt_subject');

    $tatcnt_captcha = get_option('tatcnt_captcha');
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
</style>
<div class="wrap"> 
    <h2>Contact Details</h2> 
    <hr/>
    <form method="post" >
        <table class="form-table" style="width: 500px!important">
            
            <tr valign="top">
                <th scope="row"><b>First Name</b></th>
                <td><?php echo $contactDetails->fname; ?></td>
            </tr>
            <?php if($tatcnt_firstname ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Last Name</b></th>
                <td><?php echo $contactDetails->lname; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_compnay ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Company</b></th>
                <td><?php echo $contactDetails->compname; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_address1 ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Address 1</b></th>
                <td><?php echo $contactDetails->address1; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_address2 ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Address 2</b></th>
                <td><?php echo $contactDetails->address2; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_city ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>City</b></th>
                <td><?php echo $contactDetails->city; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_state ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>State</b></th>
                <td><?php echo $contactDetails->state; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_country ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Country</b></th>
                <td><?php echo $contactDetails->country; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_telnumber ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Telephone Number</b></th>
                <td><?php echo $contactDetails->telnumber; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_mobnumber ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Mobile Number</b></th>
                <td><?php echo $contactDetails->mobnumber; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_faxnumber ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Fax Number</b></th>
                <td><?php echo $contactDetails->faxnumber; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_mail ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Email</b></th>
                <td><?php echo $contactDetails->email; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_website ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Web Site</b></th>
                <td><?php echo $contactDetails->website; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_category ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Category</b></th>
                <td id="categorycnt"><?php echo $contactDetails->category; ?></td>
            </tr>
            <?php } ?>
            <?php if($tatcnt_subject ==1){ ?>
            <tr valign="top">
                <th scope="row"><b>Subject</b></th>
                <td id="subjectcnt"><?php echo $contactDetails->subject; ?></td>
            </tr>
            <?php } ?>
            <tr valign="top">
                <th scope="row" colspan="2"><b>Message</b></th>                
            </tr>
            <tr valign="top" >                
                <td colspan="2" id="msgcnt"><?php echo $contactDetails->msgtext; ?></td>
            </tr>
            <tr valign="top" >                
                <td colspan="2">
                    <input type="button" name="" value="Reply to Contact" class="button-primary" onclick="window.open('?page=tat_contact_reply&cid=<?php echo $_GET['cid']; ?>','_self');"/>
                    <input type="button" name="" value="Back to List" class="button-primary" onclick="window.history.back();"/>
                </td>
            </tr>
        </table>
    </form>
</div>