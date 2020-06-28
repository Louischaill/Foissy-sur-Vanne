<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Demarches_administratives extends MY_Controller {

	public function index()
	{
		$this->load->model('Demarches_model');
		$this->load->view("header");
		$data1 = array();
		$data1['active'] = 4;
		$Composants = $this->Demarches_model->get_Sections();
		$data=array('Composants' => $Composants);
		if ($this->session->userdata("logged_in")) {
			$this->load->view('navbarCo',$data1);
			$this->load->view("demarches_administrativesAdmin",$data);
		}
		else {
			$this->load->view('navbar',$data1);
			$this->load->view("demarches_administratives",$data);
		}
		$this->load->view("footer");
	}
	public function modifierTexte($PrimaK){
		if ($this->session->userdata("logged_in")) {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('Demarches_model');

			$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
			$this->form_validation->set_rules('Description', 'Description', 'required|trim');
			$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

			if ($this->form_validation->run() === FALSE){

				$this->db->select('*')
				->from('DemarchesFoissy')
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
				$data1['active'] = 4;
				$this->load->view('navbarCo',$data1);
				$data=array('PrimaK' => $PrimaK, 'Titre'=>$TitreAmodif, 'Description'=>$DescriptionAmodif);
				$this->load->view('modifier_texte5',$data);
				$this->load->view('footer');

			}else{
				$Titre = $this->input->post('Titre');
				$Description = $this->input->post('Description');

				$data=array(
					'Titre'=>$Titre,
					'Description'=>$Description,
					'PrimaK'=>$PrimaK);
				if($this->Demarches_model->modif_text($data)){
					redirect('demarches_administratives');
				}

			}
		}else{
			redirect('demarches_administratives');
		}
	}
}