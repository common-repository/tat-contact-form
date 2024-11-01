<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tat_contact_class
 *
 * @author Karthik
 */
class tat_contact_class {

    public function get_tatContacts() {
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "tat_contacts WHERE is_active=1", OBJECT);
        return $result;
    }

    public function get_tatContact($id) {
        global $wpdb;
        $where = '';
        if ($id != 0) {
            $where = ' WHERE id=' . $id . ' AND is_active=1';
            $result = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "tat_contacts" . $where, OBJECT);
            return $result[0];
        }
        return false;
    }

    public function deleteContact($cid) {
        global $wpdb;
        $tableName = $wpdb->prefix . 'tat_contacts';
        $res = $wpdb->update($tableName, array('is_active' => 0), array('id' => $cid));
        if ($res) {
            ?>
            <div class="updated fade"><p><strong><?php _e("Contact deleted."); ?></strong></p></div>
            <?php
        }
    }

}
?>
