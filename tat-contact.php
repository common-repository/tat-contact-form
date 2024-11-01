<?php
/*
  Plugin Name: TAT Contact form
  Plugin URI: http://www.wordpress.turingapps.com/
  Description: TAT Contact Form plugin adds contact us/ feedback  responsive form to any page or post.
  Version: 1.0
  Author: Turingapps
  Author URI: http://www.turingapps.com/
  License: GPLv2 or later

 * TAT COntac Form WordPress Plugin, Copyright (C) 2013 Turingapps
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */
session_start();
require_once dirname(__FILE__) . '/install.php';

if (!class_exists("TAT_Contact_Form")) {

    class TAT_Contact_Form {
        ## Global Variables ##

        private $plugin_home_url;
        private $tatcnt_showtitle;
        private $tatcnt_fldicon;
        private $tatcnt_lastname;
        private $tatcnt_compnay;
        private $tatcnt_address1;
        private $tatcnt_address2;
        private $tatcnt_city;
        private $tatcnt_state;
        private $tatcnt_country;
        private $tatcnt_telnumber;
        private $tatcnt_mobnumber;
        private $tatcnt_faxnumber;
        private $tatcnt_mail;
        private $tatcnt_website;
        private $tatcnt_category;
        private $tatcnt_subject;
        private $tatcnt_attachment;
        private $tatcnt_captcha;
        private $tatcnt_captcha_type;
        private $tatcnt_lastname_req;
        private $tatcnt_compnay_req;
        private $tatcnt_address1_req;
        private $tatcnt_address2_req;
        private $tatcnt_city_req;
        private $tatcnt_state_req;
        private $tatcnt_country_req;
        private $tatcnt_telnumber_req;
        private $tatcnt_mobnumber_req;
        private $tatcnt_faxnumber_req;
        private $tatcnt_mail_req;
        private $tatcnt_website_req;
        private $tatcnt_category_req;
        private $tatcnt_subject_req;
        private $tatcnt_attachment_req;
        private $tatcnt_recpnt_mail;
        private $tatcnt_mail_adminsubject;
        private $tatcnt_blogname;
        private $tatcnt_mail_subject;
        private $tatcnt_cunfrm_mail;
        private $tatcnt_succ_msg;
        private $tatcnt_err_msg;
        private $tatcnt_cus_style;
        private $tatcnt_cus_style_enable;

        function init() {

            $this->plugin_home_url = WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), "", plugin_basename(__FILE__));
            //  set default values for email settings         
            add_option('tatcnt_blogname', __(get_option('blogname'), 'tatcf'));
            add_option('tatcnt_recpnt_mail', __('info@turingapps.com', 'tatcf'));
            add_option('tatcnt_mail_adminsubject', __('New Contact from website', 'tatcf'));
            add_option('tatcnt_mail_subject', __('Thanks for contacting us.', 'tatcf'));
            add_option('tatcnt_mail_cussubject', __('New Contact from website', 'tatcf'));
            add_option('tatcnt_cunfrm_mail', __('Thanks for contacting us.

Thanks
' . get_option('blogname'), 'tatcf'));
            add_option('tatcnt_succ_msg', __('Thanks for your contact, we will contact you soon.', 'tatcf'));
            add_option('tatcnt_err_msg', __('Please fill in the required fields.', 'tatcf'));

            //  Set default values for field settings         
            add_option('tatcnt_showtitle', __('0', 'tatcf'));
            add_option('tatcnt_fldicon', __('1', 'tatcf'));
            add_option('tatcnt_lastname', __('0', 'tatcf'));
            add_option('tatcnt_lastname_chk', __('0', 'tatcf'));
            add_option('tatcnt_compnay', __('1', 'tatcf'));
            add_option('tatcnt_compnay_chk', __('1', 'tatcf'));
            add_option('tatcnt_address1', __('0', 'tatcf'));
            add_option('tatcnt_address1_chk', __('0', 'tatcf'));
            add_option('tatcnt_address2', __('0', 'tatcf'));
            add_option('tatcnt_address2_chk', __('0', 'tatcf'));
            add_option('tatcnt_city', __('0', 'tatcf'));
            add_option('tatcnt_city_chk', __('0', 'tatcf'));
            add_option('tatcnt_state', __('0', 'tatcf'));
            add_option('tatcnt_state_chk', __('0', 'tatcf'));
            add_option('tatcnt_country', __('0', 'tatcf'));
            add_option('tatcnt_country_chk', __('0', 'tatcf'));
            add_option('tatcnt_telnumber', __('0', 'tatcf'));
            add_option('tatcnt_telnumber_chk', __('0', 'tatcf'));
            add_option('tatcnt_mobnumber', __('0', 'tatcf'));
            add_option('tatcnt_mobnumber_chk', __('0', 'tatcf'));
            add_option('tatcnt_faxnumber', __('0', 'tatcf'));
            add_option('tatcnt_faxnumber_chk', __('0', 'tatcf'));
            add_option('tatcnt_mail', __('1', 'tatcf'));
            add_option('tatcnt_mail_chk', __('1', 'tatcf'));
            add_option('tatcnt_website', __('0', 'tatcf'));
            add_option('tatcnt_website_chk', __('0', 'tatcf'));
            add_option('tatcnt_subject', __('1', 'tatcf'));
            add_option('tatcnt_subject_chk', __('1', 'tatcf'));
            add_option('tatcnt_category', __('0', 'tatcf'));
            add_option('tatcnt_category_chk', __('1', 'tatcf'));
            add_option('tatcnt_category_options', __('Billing Support,Pre purchase question,Support Question,Others', 'tatcf'));
            add_option('tatcnt_attachment', __('0', 'tatcf'));
            add_option('tatcnt_attachment_chk', __('0', 'tatcf'));
            add_option('tatcnt_captcha', __('0', 'tatcf'));
            add_option('tatcnt_captcha_type', __('0', 'tatcf'));
            add_option('tatcnt_cus_style', __('', 'tatcf'));
            add_option('tatcnt_cus_style_enable', __('0', 'tatcf'));

            ## Get form fields ##
            $this->getFormStatus();

            add_action('wp_head', array(&$this, 'addtatStyles_Scripts'), 1);
            add_action('admin_menu', array(&$this, 'adminMenu'), 1);
            add_shortcode('tat-contact', array(&$this, 'show_tat_contact_form'));
        }

        function addtatStyles_Scripts() {
            echo "<link rel='stylesheet' href='" . $this->plugin_home_url . "css/style.css' type='text/css' media='screen' />\n";
            if ($this->tatcnt_fldicon == 1) {
                echo "<link rel='stylesheet' href='" . $this->plugin_home_url . "css/icon_style.css' type='text/css' media='screen' />\n";
            }
        }

        function addtatAdmin_StylesScripts() {
            echo "<link rel='stylesheet' href='" . $this->plugin_home_url . "css/admin_style.css' type='text/css' media='screen' />\n";
        }

        function adminMenu() {
            add_menu_page(__('TAT Contact', 'tatcf'), __('TAT Contact', 'tatcf'), 'manage_options', "tat_contact", array(&$this, 'tat_contact'),plugins_url( 'tat-contact-form/images/icon.png' ));
            add_submenu_page("tat_contact", __('Settings', 'tatcf'), __('Settings', 'tatcf'), 'manage_options', "tat_settings", array(&$this, 'tat_settings'));
            add_submenu_page("", __('Contact Details', 'tatcf'), __('Contact Details', 'tatcf'), 'manage_options', "tat_contact_details", array(&$this, 'tat_contact_details'));
            add_submenu_page("", __('Reply', 'tatcf'), __('Reply', 'tatcf'), 'manage_options', "tat_contact_reply", array(&$this, 'tat_contact_reply'));
        }

        function tat_contact() {
            $this->addtatStyles_Scripts();
            include('contact_list.php');
        }

        function tat_settings() {
            $this->addtatAdmin_StylesScripts();
            include('tat_settings.php');
        }

        function tat_contact_details() {
            include('tat_contact_details.php');
        }

        function tat_contact_reply() {
            include('tat_contact_reply.php');
        }

        function getFormStatus() {

            ## Get form values from db ##                        
            $this->tatcnt_showtitle = get_option('tatcnt_showtitle');
            $this->tatcnt_fldicon = get_option('tatcnt_fldicon');
            $this->tatcnt_lastname = get_option('tatcnt_lastname');
            $this->tatcnt_compnay = get_option('tatcnt_compnay');
            $this->tatcnt_address1 = get_option('tatcnt_address1');
            $this->tatcnt_address2 = get_option('tatcnt_address2');
            $this->tatcnt_city = get_option('tatcnt_city');
            $this->tatcnt_state = get_option('tatcnt_state');
            $this->tatcnt_country = get_option('tatcnt_country');
            $this->tatcnt_telnumber = get_option('tatcnt_telnumber');
            $this->tatcnt_mobnumber = get_option('tatcnt_mobnumber');
            $this->tatcnt_faxnumber = get_option('tatcnt_faxnumber');
            $this->tatcnt_mail = get_option('tatcnt_mail');
            $this->tatcnt_website = get_option('tatcnt_website');
            $this->tatcnt_category = get_option('tatcnt_category');
            $this->tatcnt_category_options = get_option('tatcnt_category_options');
            $this->tatcnt_subject = get_option('tatcnt_subject');
            $this->tatcnt_attachment = get_option('tatcnt_attachment');
            $this->tatcnt_captcha = get_option('tatcnt_captcha');
            $this->tatcnt_captcha_type = get_option('tatcnt_captcha_type');

            $this->tatcnt_lastname_req = get_option('tatcnt_lastname_chk');
            $this->tatcnt_compnay_req = get_option('tatcnt_compnay_chk');
            $this->tatcnt_address1_req = get_option('tatcnt_address1_chk');
            $this->tatcnt_address2_req = get_option('tatcnt_address2_chk');
            $this->tatcnt_city_req = get_option('tatcnt_city_chk');
            $this->tatcnt_state_req = get_option('tatcnt_state_chk');
            $this->tatcnt_country_req = get_option('tatcnt_country_chk');
            $this->tatcnt_telnumber_req = get_option('tatcnt_telnumber_chk');
            $this->tatcnt_mobnumber_req = get_option('tatcnt_mobnumber_chk');
            $this->tatcnt_faxnumber_req = get_option('tatcnt_faxnumber_chk');
            $this->tatcnt_mail_req = get_option('tatcnt_mail_chk');
            $this->tatcnt_website_req = get_option('tatcnt_website_chk');
            $this->tatcnt_category_req = get_option('tatcnt_category_chk');
            $this->tatcnt_subject_req = get_option('tatcnt_subject_chk');
            $this->tatcnt_attachment_req = get_option('tatcnt_attachment_chk');

            $this->tatcnt_blogname = get_option('tatcnt_blogname');
            $this->tatcnt_recpnt_mail = get_option('tatcnt_recpnt_mail');
            $this->tatcnt_mail_adminsubject = get_option('tatcnt_mail_adminsubject');
            $this->tatcnt_mail_subject = get_option('tatcnt_mail_subject');
            $this->tatcnt_cunfrm_mail = get_option('tatcnt_cunfrm_mail');
            $this->tatcnt_succ_msg = get_option('tatcnt_succ_msg');
            $this->tatcnt_err_msg = get_option('tatcnt_err_msg');
            $this->tatcnt_cus_style = get_option('tatcnt_cus_style');
            $this->tatcnt_cus_style_enable = get_option('tatcnt_cus_style_enable');
        }

        function tat_update_formdata() {

            global $wpdb;
            $tableName = $wpdb->prefix . 'tat_contacts';
            $insertValues = array();
            $fname = '';
            $lname = '';
            $txtcompany = '';
            $txtaddress1 = '';
            $txtaddress2 = '';
            $txtcity = '';
            $txtstate = '';
            $country = '';
            $txtphone = '';
            $txtmobile = '';
            $txtfax = '';
            $email = '';
            $web = '';
            $txtcategory = '';
            $txtsubject = '';
            $message = '';

            if ($this->tatcnt_captcha == 1) {
                $captcha = $_POST['tat_txtcaptcha'];
                $captcha_answer = $_SESSION['captcha_answer'];
                if ($captcha != $captcha_answer) {
                    echo 'Incorrect captcha!';
                    return false;
                }
            }

            $mailBody = 'Contact<br/><hr>';

            if ($_POST['fname'] != '') {
                $fname = $_POST['fname'];
                $mailBody .= '<br/>First Name: ' . $_POST['fname'];
                $insertValues['fname'] = $_POST['fname'];
            }

            if ($_POST['lname'] != '') {
                $lname = $_POST['lname'];
                $mailBody .= '<br/>Last Name: ' . $_POST['lname'];
                $insertValues['lname'] = $_POST['lname'];
            }

            if ($_POST['txtcompany'] != '') {
                $txtcompany = $_POST['txtcompany'];
                $mailBody .= '<br/>Company: ' . $_POST['txtcompany'];
                $insertValues['compname'] = $_POST['txtcompany'];
            }

            if ($_POST['txtaddress1'] != '') {
                $txtaddress1 = $_POST['txtaddress1'];
                $mailBody .= '<br/>Address 1: ' . $_POST['txtaddress1'];
                $insertValues['address1'] = $_POST['txtaddress1'];
            }

            if ($_POST['txtaddress2'] != '') {
                $txtaddress2 = $_POST['txtaddress2'];
                $mailBody .= '<br/>Address 2: ' . $_POST['txtaddress2'];
                $insertValues['address2'] = $_POST['txtaddress2'];
            }

            if ($_POST['txtcity'] != '') {
                $txtcity = $_POST['txtcity'];
                $mailBody .= '<br/>City: ' . $_POST['txtcity'];
                $insertValues['city'] = $_POST['txtcity'];
            }

            if ($_POST['txtstate'] != '') {
                $txtstate = $_POST['txtstate'];
                $mailBody .= '<br/>State: ' . $_POST['txtstate'];
                $insertValues['state'] = $_POST['txtstate'];
            }

            if ($_POST['country'] != '') {
                $country = $_POST['country'];
                $mailBody .= '<br/>Country: ' . $_POST['country'];
                $insertValues['country'] = $_POST['country'];
            }

            if ($_POST['txtphone'] != '') {
                $txtphone = $_POST['txtphone'];
                $mailBody .= '<br/>Telephone Number: ' . $_POST['txtphone'];
                $insertValues['telnumber'] = $_POST['txtphone'];
            }

            if ($_POST['txtmobile'] != '') {
                $txtmobile = $_POST['txtmobile'];
                $mailBody .= '<br/>Mobile Number: ' . $_POST['txtmobile'];
                $insertValues['mobnumber'] = $_POST['txtmobile'];
            }

            if ($_POST['txtfax'] != '') {
                $txtfax = $_POST['txtfax'];
                $mailBody .= '<br/>Fax Number: ' . $_POST['txtfax'];
                $insertValues['faxnumber'] = $_POST['txtfax'];
            }

            if ($_POST['email'] != '') {
                $email = $_POST['email'];
                $mailBody .= '<br/>E Mail: ' . $_POST['email'];
                $insertValues['email'] = $_POST['email'];
            }

            if ($_POST['web'] != '') {
                $web = $_POST['web'];
                $mailBody .= '<br/>Website: ' . $_POST['web'];
                $insertValues['website'] = $_POST['web'];
            }

            if ($_POST['txtcategory'] != '') {
                $txtcategory = $_POST['txtcategory'];
                $mailBody .= '<br/>Category: ' . $_POST['txtcategory'];
                $insertValues['category'] = $_POST['txtcategory'];
            }

            if ($_POST['txtsubject'] != '') {
                $txtsubject = $_POST['txtsubject'];
                $mailBody .= '<br/>Subject: ' . $_POST['txtsubject'];
                $insertValues['subject'] = $_POST['txtsubject'];
            }

            if ($_POST['message'] != '') {
                $message = $_POST['message'];
                $mailBody .= '<br/>Message:<br/>' . nl2br($_POST['message']);
                $insertValues['msgtext'] = $_POST['message'];
            }
            $mailBody .= '<br/><br/>IP Address: ' . $this->getIP() . '<br/><br/>';

            $tatcf_senderName = $this->tatcnt_blogname;
            $tatcf_sendermail = $to = $this->tatcnt_recpnt_mail;

            if (empty($to)) {
                $tatcf_sendermail = $to = get_option('admin_email');
            }

            $subject2admin = $this->tatcnt_mail_adminsubject;
            if (empty($subject2admin)) {
                $subject2admin = 'Contact from ' . get_option('blogname');
            }

            $from = get_option('admin_email');

            $fileUpload = $this->esFileUpload($_FILES, 'upldfile');

            $attachments = '';
            if ($fileUpload) {
                $insertValues['attchfile'] = $fileUpload['url'];
                $attachments = array($fileUpload['file']);
            }

            $res = $wpdb->insert($tableName, $insertValues);
            $headers[] = 'From: ' . get_option('blogname') . ' <' . $from . '>';

            if ($res) {
                if (wp_mail($to, $subject2admin, wordwrap(nl2br($mailBody)), $headers, $attachments)) {
                    echo "\n" . $this->tatcnt_succ_msg . "\n";
                    wp_mail($email, $this->tatcnt_mail_subject, nl2br($this->tatcnt_cunfrm_mail), "From: " . $tatcf_senderName . " <$tatcf_sendermail>");
                } else {
                    echo "\n" . $this->tatcnt_err_msg . "\n";
                }
            }
        }

        function show_tat_contact_form() {

            if (isset($_POST['tatbtnsubmit'])) {
                $this->tat_update_formdata();
            }
            ?>

            <?php if ($this->tatcnt_cus_style_enable == 1 && $this->tatcnt_cus_style != '') { ?>
                <style type="text/css">
                <?php echo $this->tatcnt_cus_style; ?>
                </style>
            <?php }
            ?>

            <div id="tatcontactfrm">
                <div>

                    <?php if ($this->tatcnt_showtitle == 1) { ?>
                        <h2>Contact Us</h2>
                        <hr/>
                    <?php } ?>
                    <form method="post" enctype="multipart/form-data">	

                        <fieldset>
                            <p class="first">					
                                <label for="fname">First Name</label>				
                                <input tabindex="1" type="text" name="fname" id="fname" size="40" required placeholder="First Name" autofocus/>
                            </p>
                            <?php if ($this->tatcnt_lastname == 1) { ?>
                                <p class="lfirst">					
                                    <label for="lname">Last Name</label>				
                                    <input tabindex="2" type="text" name="lname" id="lname" size="40" <?php echo ($this->tatcnt_lastname_req == 1) ? 'required' : ''; ?> placeholder="Last Name"/>					
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_compnay == 1) { ?>
                                <p>
                                    <label for="txtcompany">Company</label>				
                                    <input tabindex="3" placeholder="Company" type="text" name="txtcompany" id="txtcompany" size="40" <?php echo ($this->tatcnt_compnay_req == 1) ? 'required' : ''; ?>/>										
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_address1 == 1) { ?>
                                <p>
                                    <label for="txtaddress1">Address 1</label>				
                                    <input tabindex="4" placeholder="Address 1" type="text" name="txtaddress1" id="txtaddress1" size="40" <?php echo ($this->tatcnt_address1_req == 1) ? 'required' : ''; ?>/>										
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_address2 == 1) { ?>
                                <p>
                                    <label for="txtaddress2">Address 2</label>				
                                    <input tabindex="4" placeholder="Address 2" type="text" name="txtaddress2" id="txtaddress2" size="40" <?php echo ($this->tatcnt_address2_req == 1) ? 'required' : ''; ?>/>										
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_city == 1) { ?>
                                <p>
                                    <label for="txtcity">City</label>				
                                    <input tabindex="5" placeholder="Your City" type="text" name="txtcity" id="txtcity" size="40" <?php echo ($this->tatcnt_city_req == 1) ? 'required' : ''; ?>/>										
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_state == 1) { ?>
                                <p>
                                    <label for="txtstate">State</label>				
                                    <input tabindex="6" placeholder="Your State" type="text" name="txtstate" id="txtstate" size="40" <?php echo ($this->tatcnt_state_req == 1) ? 'required' : ''; ?>/>										
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_country == 1) { ?>
                                <p>
                                    <label for="country">Country</label>
                                    <select tabindex="7" name="country" id="country" <?php echo ($this->tatcnt_country_req == 1) ? 'required' : ''; ?>>
                                        <option value="">Select country...</option>
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote D'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                        <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>

                                </p>     
                            <?php } ?>
                            <?php if ($this->tatcnt_telnumber == 1) { ?>
                                <p>
                                    <label for="txtphone">Telephone Number</label>				
                                    <input tabindex="8" placeholder="Telephone Number" type="tel" name="txtphone" id="txtphone" size="40" <?php echo ($this->tatcnt_telnumber_req == 1) ? 'required' : ''; ?>/>
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_mobnumber == 1) { ?>
                                <p>
                                    <label for="txtmobile">Mobile Number</label>				
                                    <input tabindex="9" placeholder="Mobile Number" type="tel" name="txtmobile" id="txtmobile" size="40" <?php echo ($this->tatcnt_mobnumber_req == 1) ? 'required' : ''; ?>/>										
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_faxnumber == 1) { ?>
                                <p>
                                    <label for="txtfax">Fax Number</label>				
                                    <input tabindex="10" placeholder="Fax Number" type="tel" name="txtfax" id="txtfax" size="40" <?php echo ($this->tatcnt_faxnumber_req == 1) ? 'required' : ''; ?>/>										
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_mail == 1) { ?>
                                <p>					
                                    <label for="email">Email</label>				
                                    <input tabindex="11" placeholder="Email" type="email" name="email" id="email" size="40" <?php echo ($this->tatcnt_mail_req == 1) ? 'required' : ''; ?>/>				
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_website == 1) { ?>
                                <p>
                                    <label for="web">Web Site</label>				
                                    <input tabindex="12" placeholder="Web Site" type="url" name="web" id="web" size="40" <?php echo ($this->tatcnt_website_req == 1) ? 'required' : ''; ?>/>										
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_category == 1) { ?>
                                <p>
                                    <label for="txtcategory">Category</label>                                
                                    <?php $category_list = explode(',', $this->tatcnt_category_options); ?>
                                    <select tabindex="13" name="txtcategory" id="txtcategory" <?php echo ($this->tatcnt_category_req == 1) ? 'required' : ''; ?>>
                                        <option value="">Select Category</option>
                                        <?php foreach ($category_list as $value) { ?>
                                            <option><?php echo trim($value); ?></option>
                                        <?php }
                                        ?>
                                    </select>									
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_subject == 1) { ?>
                                <p>
                                    <label for="txtsubject">Subject</label>				
                                    <input tabindex="14" placeholder="Subject" type="text" name="txtsubject" id="txtsubject" size="40" <?php echo ($this->tatcnt_subject_req == 1) ? 'required' : ''; ?>/>										
                                </p>
                            <?php } ?>
                            <p>
                                <label for="message">Message</label>
                                <textarea tabindex="15" placeholder="Enter your Message" name="message" id="message" cols="40" rows="10" required></textarea>
                            </p>
                            <?php if ($this->tatcnt_attachment == 1) { ?>
                                <p>
                                    <label for="upldfile">Attachment</label>
                                    <input type="file" name="upldfile" id="upldfile" <?php echo ($this->tatcnt_attachment_req == 1) ? 'required' : ''; ?>/>
                                </p>
                            <?php } ?>
                            <?php if ($this->tatcnt_captcha == 1) { ?>
                                <p>
                                    <?php if ($this->tatcnt_captcha_type == 0) { ?>
                                        <?php
                                        $rand_int1 = substr(mt_rand(), 0, 1);
                                        $rand_int2 = substr(mt_rand(), 0, 1);
                                        $captcha_answer = $rand_int1 + $rand_int2;
                                        $_SESSION['captcha_answer'] = $captcha_answer;
                                        ?>
                                    <label id="captchalbl" for="captcha">What is <?php echo $rand_int1 . ' + ' . $rand_int2; ?> = </label>                                    
                                    <?php } else { ?>                                    
                                        <?php
                                        include("captcha/php_captcha.php");
                                        $captchaArray = php_captcha();
                                        $_SESSION['captcha_answer'] = $captchaArray['code'];
                                        ?>
                                        <label id="captchalbl" for="captcha">
                                            <img src="<?php echo $captchaArray['image_src']; ?>" alt="CAPTCHA" />
                                        </label>                                    
                                    <?php } ?>
                                    <input tabindex="16" placeholder="CAPTCHA" type="text" name="tat_txtcaptcha" id="tat_txtcaptcha" value="" required>
                                </p>
                            <?php } ?>
                                <br/>
                            <p class="submit">
                                <button tabindex="17" type="submit" id="tatbtnsubmit" name="tatbtnsubmit">Send</button>
                                <button tabindex="18" type="reset" id="tatbtnreset" name="tatbtnreset">Reset</button>
                            </p>
                        </fieldset>								
                    </form>	
                </div>
            </div>
            <?php
        }

        function getIP() {
            if (isset($_SERVER)) {
                if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
            } else {
                if (getenv('HTTP_X_FORWARDED_FOR')) {
                    $ip = getenv('HTTP_X_FORWARDED_FOR');
                } elseif (getenv('HTTP_CLIENT_IP')) {
                    $ip = getenv('HTTP_CLIENT_IP');
                } else {
                    $ip = getenv('REMOTE_ADDR');
                }
            }
            return $ip;
        }

        function esFileUpload($esfile, $name) {
            if (!function_exists('wp_handle_upload'))
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            $uploadedfile = $esfile[$name];
            $upload_overrides = array('test_form' => false);
            $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
            if ($movefile) {
                return $movefile;
            } else {
                echo false;
            }
        }

    }

}

//load_plugin_textdomain('tatcf', false, basename(dirname(__FILE__)) . '/langs');

register_activation_hook(__FILE__, 'tatcontact_install');
register_activation_hook(__FILE__, 'tatcontact_install_data');


if (class_exists("TAT_Contact_Form")) {
    $TAT_Contact_Form_instance = new TAT_Contact_Form();
}

if (isset($TAT_Contact_Form_instance)) {
    $TAT_Contact_Form_instance->init();
}
?>