<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Error_404 extends MY_Controller {

	public function index()
	{
		$this->load->view("header");
		$data1 = array();
		$data1['active'] = 0;
		if ($this->session->userdata("logged_in")) {

			$this->load->view("navbarCo",$data1);
		}
		else {
			$this->load->view("navbar",$data1);
		}
		$this->load->view("error_404");
		$this->load->view("footer");
	}
}
