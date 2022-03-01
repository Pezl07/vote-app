<?php
namespace App\Models;
use App\Models\Da_cdms_user;

/*
* M_cdms_user
* get user
* @author   Kittipod
* @Create Date  2564-12-07
*/
class M_cdms_user extends Da_cdms_user {
    /*
    * get_all
    * get all user
    * @input    type
    * @output   array of user
    * @author   Kittipod
    * @Create Date  2564-12-07
    */
    public function get_by_username($username) {

        $sql = "SELECT * FROM `cdms_user` 
                WHERE `user_username` = '$username'" ;
        
        return $this->db->query($sql)->getRow();
    }
}
