<?php
namespace App\Controllers;
use Pusher\Pusher;
use App\Models\M_vot_vote;
use App\Models\M_vot_cluster;
use App\Models\M_vot_user;

class Report extends Vot_controller {

    function __construct() {
        session_start();
    }

    public function index() {
        if (!isset($_SESSION["usr_id"])) {
            return $this->response->redirect(base_url('/login'));
        }
        if ($_SESSION["usr_role"] == 4) {
            echo "Access denied";
            exit(0);
        }

        if (!isset($_SESSION["vote_status"]))
            $_SESSION["vote_status"] = "";
        
        // get user information
        $m_usr = new M_vot_user();
        $obj_user = $m_usr->get_by_usr_id($_SESSION["usr_id"]);
        $data["obj_user"] = $obj_user;
        echo view("v_vote", $data);
    }

    public function show_report() {
        if (!isset($_SESSION["usr_id"]))
            return $this->response->redirect(base_url('/login'));
        // อย่าเพิ่งลบ
        // if ($_SESSION["usr_role"] != 4) {
        //     echo "Access denied, Admin only";
        //     exit(0);
        // }
        
        $m_cst = new M_vot_cluster();
        $data['cluster'] = $m_cst->get_all();
        echo view('v_report', $data);
    }
    
    public function process() {
        $arr_score_input =  $this->request->getPost("score_input_cluster");

        $m_vot = new M_vot_vote();

        $sum_score = array_sum($arr_score_input);
        
        if ($this->check_score_enough($sum_score)){
            $_SESSION["vote_status"] = "success";

            $number = mt_rand(0,1);
            if($number == 0) {
                $this->process1($arr_score_input);
            }
            else {
                $this->process2($arr_score_input);
            }

            $this->minus_remain_score($sum_score);
            for ($i = 0 ; $i < count($arr_score_input); $i++) {
                $this->add_total_score($arr_score_input[$i], $i + 1);
            }
            
            $m_vot->insert_vote($arr_score_input, $_SESSION["usr_id"]);
        }
        else{
            $_SESSION["vote_status"] = "fail";
        }

        return $this->response->redirect(base_url() . "/vote");
    }
    
    public function add_total_score($score = NULL, $cst_id) {
        if ($score != NULL) {
            $m_cst = new M_vot_cluster();
            $m_cst->add_total_score($score, $cst_id);
        }
    }

    public function check_score_enough($score) {
        $m_usr = new M_vot_user();
        $obj_user = $m_usr->get_usr_remain_score_by_usr_id($_SESSION["usr_id"]);
        $user_score = $obj_user->usr_remain_score;
        return ($score <= $user_score);
    }

    public function minus_remain_score($score) {
        $m_usr = new M_vot_user();
        $m_usr->minus_usr_remain_score($score, $_SESSION["usr_id"]);
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


