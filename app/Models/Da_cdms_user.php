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
    protected $table = 'cdms_user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'user_username', 'user_password', 'user_nickname', 'user_prefix ', 'user_name_th', 'user_name_en', 'user_position', 'user_group_id',
        'user_active', 'user_status', 'create_by', 'update_by', 'created_at', 'updated_at', 'created', 'updated_at', 'deleted_at'
    ];

}