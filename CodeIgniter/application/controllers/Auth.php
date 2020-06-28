<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Auth extends MY_Controller {

	public function logged_in_check()
	{
		if ($this->session->userdata("logged_in")) {
			$this->logout();
		}
	}

	public function authenti()
	{
		$this->logged_in_check();

		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");

		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');
		if ($this->form_validation->run() == true)
		{
			$this->load->model('auth_model');
			// check the username & password of user
			$status = $this->auth_model->validate();
			if ($status == ERR_INVALID_USERNAME) {
				$this->session->set_flashdata("error", "Mauvais Pseudonyme");
			}
			elseif ($status == ERR_INVALID_PASSWORD) {
				$this->session->set_flashdata("error", "Mauvais mot de passe");
			}
			else
			{
				// success
				// store the user data to session
				$this->session->set_userdata($this->auth_model->get_data());
				$this->session->set_userdata("logged_in", true);
				// redirect to dashboard
				redirect("accueil");
			}
		}
				$this->load->view("header");
		$data1 = array();
		$data1['active'] = 1;
		$this->load->view("navbar",$data1);
		$this->load->view("auth");
		$this->load->view("footer");

	}

	public function logout()
	{
		$this->session->unset_userdata("logged_in");
		$this->session->sess_destroy();
		redirect("accueil");
	}
	public function index()
	{
		$this->load->model('Auth_model');
		$this->load->view("header");
		$data1 = array();
		$data1['active'] = 1;
		$this->load->view("navbar",$data1);
		$this->load->view("auth");
		$this->load->view("footer");
	}
}
