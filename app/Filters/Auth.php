<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null) {
        session_start();
        if($_SESSION['logged_in'] != true){
            return redirect()->to(base_url('/Login_show/login_show_ajax'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {

    }
}