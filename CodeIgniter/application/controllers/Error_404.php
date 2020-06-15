<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Error_404 extends MY_Controller {

	public function index()
	{
		$this->load->view("header");
		if ($this->session->userdata("logged_in")) {
			$this->load->view("navbar");
		}
		else {
			$this->load->view("disconavbar");
		}
		$this->load->view("error_404");
		$this->load->view("footer");
	}
}
