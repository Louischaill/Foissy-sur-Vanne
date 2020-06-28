<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Histoire extends MY_Controller {
	public function index(){

		$this->load->view("header");
		$data1 = array();
		$data1['active'] = 5;
		
		if ($this->session->userdata("logged_in")) {
			$this->load->view('navbarCo',$data1);
		}
		else {
			$this->load->view('navbar',$data1);
		}
		$this->load->view("histoire");
		$this->load->view("footer");
	}
}