<?php
namespace App\Models;
use App\Models\Da_cdms_user;

class M_cdms_user extends Da_cdms_user {
    public function get_by_username($username) {
        $sql = "SELECT * FROM `vot_user` 
                WHERE `usr_name` = '$username' " ;
        
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
    public function minus_usr_remain_score($score, $usr_id) {
        $sql = "UPDATE `vot_user` SET usr_remain_score = usr_remain_score - $score
                WHERE usr_id = '$usr_id'";
        return $this->db->query($sql); 
    }
}
