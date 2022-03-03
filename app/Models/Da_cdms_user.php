<?php

namespace App\Models;

use CodeIgniter\Model;

/*
* Da_cdms_user
* insert update delete user
* @author   Kittipod
* @Create Date  2564-12-07
*/
class Da_cdms_user extends Model
{
    protected $table = 'vot_user';
    protected $primaryKey = 'usr_id ';
    protected $allowedFields = [
        'usr_name', 'usr_password', 'usr_full_name', 'usr_cluster_id ', 'usr_role', 'usr_remain_score', 'usr_image'
    ];

}