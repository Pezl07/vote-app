<?php
namespace App\Models;
use App\Models\Da_cdms_user;

class M_cdms_user extends Da_cdms_user {
    public function get_by_username($username) {

        $sql = "SELECT * FROM `cdms_user` 
                WHERE `user_username` = '$username'" ;
        
        return $this->db->query($sql)->getRow();
    }
    public function get_usr_remain_score_by_usr_id($usr_id) {
        $sql = "SELECT usr_remain_score FROM vot_user WHERE usr_id = '$usr_id'";
        return $this->db->query($sql)->getRow();
    }
    public function get_by_usr_id($usr_id) {
        $sql = "SELECT * FROM vot_user WHERE usr_id = '$usr_id'";
        return $this->db->query($sql)->getRow();
    }
}
