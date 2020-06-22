<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Administratif extends MY_Controller {
	public function index()
	{
		$this->load->model('Administratif_model');
		$this->load->view("header");
		if ($this->session->userdata("logged_in")) {
			$this->load->view("navbar");
		}
		else {
			$this->load->view("navbar");
		}
		$Composants = $this->Administratif_model->get_Data();
		$data=array('Data' => $Composants);
		$this->load->view("administratifAdmin",$data);
		$this->load->view("footer");
	}
	public function modifierTexte($PrimaK){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Administratif_model');

		$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
		$this->form_validation->set_rules('Description', 'Description', 'required|trim');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		if ($this->form_validation->run() === FALSE){

			$this->db->select('*')
			->from('AdministratifFoissy')
			->where('PrimaK',$PrimaK);
			$query = $this->db->get();

			$TitreAmodif = '';
			$DescriptionAmodif='';
			foreach ($query->result() as $resultat){
				$TitreAmodif = $resultat->Titre;
				$DescriptionAmodif = $resultat->Description;
			}
			$this->load->view('header');
			$this->load->view('navbar');
			$data=array('PrimaK' => $PrimaK, 'Titre'=>$TitreAmodif, 'Description'=>$DescriptionAmodif);
			$this->load->view('modifier_texte4',$data);
			$this->load->view('footer');

		}else{
			$Titre = $this->input->post('Titre');
			$Description = $this->input->post('Description');

			$data=array(
				'Titre'=>$Titre,
				'Description'=>$Description,
				'PrimaK'=>$PrimaK);
			if($this->Administratif_model->modif_text($data)){
				redirect('administratif');
			}
		}
	}
}

