<?php
namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Pusher\Pusher;

/*
* Agent_show
* show agent list, delete anget
* @author   Klayuth, Preechaya
* @Create Date  2564-07-30
*/
class Report extends Cdms_controller {
    /*
    * agent_show_ajax
    * show agent list
    * @input    -
    * @output   array of agent
    * @author   Klayuth
    * @Create Date  2564-07-30
    */
    public function show_report() {
        // $this->output('v_report'); // Chart.js
        $this->output('v_test'); // amCharts 5 
    }

    public function index() {
        echo view("v_vote");
    }

    public function show_input() {
        $this->output('v_input');
    }

    public function process() {
        $obj_score_input =  $this->request->getPost("score_input_cluster");
    
        // echo "Cluster : " . $obj['cluster'] . '<br>';
        // echo "Score : " . $obj['score'] . '<br>';
        echo "<pre>";
        print_r($obj_score_input);
        echo "</pre>";

        // $number = mt_rand(0,1);    // $this->show_input();
        $number  = 0;
        if($number == 0)
            $this->process1($obj_score_input);
            // echo '1';
        // }else{
        //     $this->process2($obj_score_input);
        //     echo '2';
        // }

    }

    public function process1($obj_score_input) {
        $app_id = "1354801";
        $key = "b485b70127147958e1fa";
        $secret = "fc79828e41d97bae4df6";
        $app_cluster = "ap1";
        $pusher = new Pusher($key, $secret, $app_id, ['cluster' => $app_cluster]);
        $data = $obj_score_input;
        $pusher->trigger('pusher_score', 'up_score', $data);
    }

    public function process2($obj_score_input) {
        $app_id = "1354955";
        $key = "e07bc6c3ee7696ad0104";
        $secret = "5a4aae53ea8f5fc88003";
        $app_cluster = "ap1";
        $pusher = new Pusher($key, $secret, $app_id, ['cluster' => $app_cluster]);
        $data = $obj_score_input;
        $pusher->trigger('pusher_score', 'up_score', $data);
    }
}


