<?php

namespace App\Models;

use CodeIgniter\Model;

class Da_vot_cluster extends Model
{
    protected $table = 'vot_cluster';
    protected $primaryKey = 'cst_id  ';
    protected $allowedFields = [
        'cst_number', 'cst_total_score', 'cst_image', 'cst_system_image '
    ];
}