<?php
namespace App\Controllers;
use App\Models\M_vot_user;
class Login extends Vot_controller {
    public function __construct() {
        session_start();
    }

    public function index() {
        echo view('v_new_login.php');
    }

    public function login(){
        $usr_name = $this->request->getPost('username');
        $usr_password = $this->request->getPost('password');
        
        $m_user = new M_vot_user();
        $obj_user = $m_user->get_by_usr_name($usr_name);

        if($usr_password === $obj_user->usr_password) {
            $_SESSION["logged_in"] = true;
            $_SESSION["usr_id"] =  $obj_user->usr_id;
            $_SESSION["usr_full_name"] = $obj_user->usr_full_name;
            echo $_SESSION["usr_full_name"];
            return $this->response->redirect(base_url('/Report/index'));
        }
        else {
            $_SESSION["logged_in"] = false;
            $_SESSION["usr_name"] = $usr_name;
            $_SESSION["usr_password"] = $usr_password;
            return $this->response->redirect(base_url('/Login/index'));
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        return $this->response->redirect(base_url('/Login/index'));
    }

}