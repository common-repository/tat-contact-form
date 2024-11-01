<?php

global $tatcf_db_version;
$tatcf_db_version = "1.0";

function tatcontact_install() {
    global $wpdb;
    global $tatcf_db_version;

    ## get default collate ##
    $charset_collate = '';

    if (version_compare(mysql_get_server_info(), '4.1.0', '>=')) {
        if (!empty($wpdb->charset))
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
        if (!empty($wpdb->collate))
            $charset_collate .= " COLLATE $wpdb->collate";
    }

    $table_name = $wpdb->prefix . "tat_contacts";

    $sql = "CREATE TABLE $table_name (
                    id bigint(20) NOT NULL AUTO_INCREMENT,
                    fname varchar(250) NOT NULL,
                    lname varchar(250) NOT NULL,
                    compname varchar(250) NOT NULL,
                    address1 text NOT NULL,
                    address2 text NOT NULL,
                    city varchar(250) NOT NULL,
                    state varchar(250) NOT NULL,
                    country varchar(250) NOT NULL,
                    telnumber varchar(250) NOT NULL,
                    mobnumber varchar(250) NOT NULL,
                    faxnumber varchar(250) NOT NULL,
                    email varchar(250) NOT NULL,
                    website varchar(250) NOT NULL,
                    category varchar(250) NOT NULL,
                    subject varchar(250) NOT NULL,
                    msgtext text NOT NULL,
                    attchfile text NOT NULL,
                    is_active tinyint(1) NOT NULL DEFAULT '1',
                    created_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id)
                  ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);

    add_option("tatcf_db_version", $tatcf_db_version);
}

function tatcontact_install_data() {
    global $wpdb;
}

?>