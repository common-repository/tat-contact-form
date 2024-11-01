<?php
require_once ('class/tat_contact_class.php'); 
$TATContact = new tat_contact_class();

require_once 'class/pagination.php';

if (isset($_GET['delid']) && $_GET['delid'] != '' && $_GET['delid'] != 0) {
    $TATContact->deleteContact($_GET['delid']);
}
?>
<style type="text/css">
    .wrap label{
        margin:0px 5px 0px 5px !important; 
    }
    .wrap td{
        padding: 10px !important;
        width: 150px !important;
        font-weight: normal !important;
    }
    .wrap th{
        font-weight: bolder !important;
    }
    .deleteTatContact{
        cursor: pointer !important;
    }
    #id{
        width: 5% !important;
    }
    #fname{
        width: 15% !important;
    }
    #subject{
        width: 20% !important;
    }
    #created_date{
        width: 8% !important;
    }
    #manage{
        width: 13% !important;
    }
</style>
<div class="wrap"> 
    <h2>Contact List</h2>    
    <?php
    $TATPagination = new B5F_WP_Table();
    ?>    
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.deleteTatContact').live('click', function() {
            var s = confirm('Are you sure you want delete this contact?');
            if (s) {
                window.open('admin.php?page=tat_contact&delid=' + jQuery(this).attr('id'), '_self');
            } else {
                return false;
            }
        });
    });
</script>