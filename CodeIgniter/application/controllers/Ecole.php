<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Ecole extends MY_Controller {


	public function modifierTexte($PrimaK){
		if ($this->session->userdata("logged_in")) {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('Ecole_model');

			$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
			$this->form_validation->set_rules('Description', 'Description', 'required|trim');
			$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

			if ($this->form_validation->run() === FALSE){

				$this->db->select('*')
				->from('EcoleFoissy')
				->where('PrimaK',$PrimaK);
				$query = $this->db->get();
				$TitreAmodif = '';
				$DescriptionAmodif='';
				foreach ($query->result() as $resultat){
					$TitreAmodif = $resultat->Titre;
					$DescriptionAmodif = $resultat->Description;
				}

				$this->load->view('header');
				$data1 = array();
				$data1['active'] = 2;
				$this->load->view('navbarCo',$data1);
				$data=array('PrimaK' => $PrimaK, 'Titre'=>$TitreAmodif, 'Description'=>$DescriptionAmodif);
				$this->load->view('modifier_texte2',$data);
				$this->load->view('footer');

			}else{
				$Titre = $this->input->post('Titre');
				$Description = $this->input->post('Description');

				$data=array(
					'Titre'=>$Titre,
					'Description'=>$Description,
					'PrimaK'=>$PrimaK);
				if($this->Ecole_model->modif_text($data)){
					redirect('ecole');
				}
			}
		}else{
			redirect('ecole');
		}
	}	

	public function index()
	{
		$this->load->model('Ecole_model');
		$this->load->view("header");
		$Composants = $this->Ecole_model->get_Sections();
		$data=array('Composants' => $Composants);
		$data1 = array();
		$data1['active'] = 2;
		if ($this->session->userdata("logged_in")) {
			$this->load->view('navbarCo',$data1);
			$this->load->view("ecoleAdmin",$data);
		}
		else {
			$this->load->view('navbar',$data1);
			$this->load->view("ecole",$data);
		}
		
		$this->load->view("footer");
	}
}
