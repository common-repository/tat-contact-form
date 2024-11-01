<?php

$tabs = array('field-settings' => 'Field Settings', 'mail-settings' => 'Email Settings','captcha'=>'Captcha Settings','custom-style'=>'Custom Style');
$links = array();
echo '<div id="icon-themes" class="icon32"><br></div>';
echo '<h2 class="nav-tab-wrapper">';
$current = (isset($_GET['tab'])) ? $_GET['tab'] : 'field-settings';
foreach ($tabs as $tab => $name) {
    $class = ( $tab == $current ) ? ' nav-tab-active' : '';
    echo "<a class='nav-tab$class' href='?page=tat_settings&tab=$tab'>$name</a>";
}
echo '</h2>';


switch ($current) {
    case 'field-settings' :

        require_once 'tat_field_settings.php';

        break;
    case 'mail-settings' :

        require_once 'tat_mail_settings.php';

        break;
    case 'captcha' :

        require_once 'tat_captcha_settings.php';

        break;
    case 'custom-style' :

        require_once 'tat_custom_style.php';

        break;
}
?>