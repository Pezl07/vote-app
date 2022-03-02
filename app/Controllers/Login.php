<?php

namespace App\Controllers;

use App\Models\M_cdms_user;

class Login extends Cdms_controller {

    public function login_show() {
        // session_start();
        echo view('v_new_login.php');
    }


    public function login(){
        session_start();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data['username'] = $username;

        $m_user = new M_cdms_user();
        $user = $m_user->get_by_username($username);

        //check password
        if(password_verify($password, $user->user_password) && !empty($user) && !preg_match('/[^a-z0-9 _]+/i', $username)){
            $_SESSION['invalid_password'] = false;
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] =  $user;
            unset($_SESSION['fail']);
            return $this->response->redirect(base_url('/Report/index'));
        }else{
            $_SESSION['logged_in'] = false;
            $_SESSION['invalid_password'] = true;
            $_SESSION['fail'] =  $username;
            return $this->response->redirect(base_url('/Login/login_show'));
        }
    }

}