<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Register extends MY_Controller {

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("username", "Username", "trim|required|is_unique[user.username]");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("repassword", "Confirm password", "trim|required");

		$this->form_validation->set_message('is_unique', '<div style="color:lightgrey;">{field} est déjà crée.</div>');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		if ($this->form_validation->run() == true)
		{
			$this->load->model('Register_model', 'register');
			// check the username & password of user
			$status = $this->register->validate();
			if ($status == ERR_INVALID_USERNAME) {
				$this->session->set_flashdata("error", "Pseudonyme trop long (- 25 caractères)");
			}
			elseif ($status == ERR_INVALID_PASSWORD) {
				$this->session->set_flashdata("error", "Les deux mots de passe sont différent");
			}
			else
			{
				// redirect to Connexion pannel
				$this->session->set_flashdata("error", "<div style='color:green;'>Compte créé avec succès</div>");
				redirect("auth");
			}
		}
		$this->load->view("header");
		$this->load->view("disconavbar");
		$this->load->view("register");
		$this->load->view("footer");
	}

}
