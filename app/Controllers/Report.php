<?php
namespace App\Controllers;
use Pusher\Pusher;

class Report extends Cdms_controller {

    public function show_report() {
        echo view('v_report');
    }

    public function index($vote_status = NULL) {
        if ($vote_status == NULL)
            $vote_status = "test";

        $data["vote_status"] = $vote_status;

        echo view("v_vote", $data);
    }

    public function show_input() {
        echo view('v_input');
    }

    public function process() {
        $arr_score_input =  $this->request->getPost("score_input_cluster");

        $number = mt_rand(0,1);
        if($number == 0) {
            $this->process1($arr_score_input);
        }
        else {
            $this->process2($arr_score_input);
        }

        $sum_score = array_sum($arr_score_input);
        if ($this->check_score_enough($sum_score))
            return $this->response->redirect(base_url() . "/Report/index/success");
        return $this->response->redirect(base_url() . "/Report/index/success");
    }
    public function check_score_enough($score) {
        $user_score = 500;
        return ($user_score < $score);
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


