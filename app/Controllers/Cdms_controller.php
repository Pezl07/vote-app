<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/*
* Cdms_controller
* main controller
* @author	Wirat
* @Create Date	2564-07-29
*/
class Cdms_controller extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['code'];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);
	}

	/*
    * output
    * แสดงหน้าจอ แบบมี Template Header Footer
    * @input -
    * @output แสดงหน้าจอ View พร้อม Header Footer
    * @author Wirat
    * @Create Date 2564-07-28
    * @Update Date 2564-07-28
    */
	public function output($views = '', $data = []) {
		echo view('/template/header', $data);
		echo view($views, $data);
		echo view('/template/footer', $data);
	}
}
