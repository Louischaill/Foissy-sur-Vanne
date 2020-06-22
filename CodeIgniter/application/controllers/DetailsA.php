<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class DetailsA extends MY_Controller {

	public function redirection($key){
		$this->load->view("header");
		$this->load->model('DetailsA_model');

		$Infos = $this->DetailsA_model->get_Infos($key);
		$Diapo = $this->DetailsA_model->get_Diapo($key);
		$data=array('Infos' => $Infos, 'Diapo'=>$Diapo);

		if ($this->session->userdata("logged_in")) {
			$this->load->view("navbar");
		}
		else {
			$this->load->view("navbar");
		}
		$this->load->view("detailsAAdmin",$data);
		$this->load->view("footer");
	}

	public function modifierTexte($PrimaK){

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('DetailsA_model');

		$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
		$this->form_validation->set_rules('Description', 'Description', 'required|trim');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		if ($this->form_validation->run() === FALSE){

			$this->db->select('*')
			->from('DetailsAFoissy')
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
			$this->load->view('modifier_texte3',$data);
			$this->load->view('footer');

		}else{
			$Titre = $this->input->post('Titre');
			$Description = $this->input->post('Description');

			$datab['msg']	= '';

			$config['upload_path'] = './assets/img/activites/'; 
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '200000';
			$config['max_width']  = '600';
			$config['max_height']  = '600';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload()){
				$datab['error'] = $this->upload->display_errors();
				echo $datab['error'];
				if($datab['error']="You did not select a file to upload."){
					$data=array(
						'Titre'=>$Titre,
						'Description'=>$Description,
						'PrimaK'=>$PrimaK);
					if($this->DetailsA_model->modif_detailA($data,1)){
						redirect('detailsA/redirection/'.$PrimaK);
					}
				}else{
					echo '<script type="text/javascript">window.alert("'.$datab['error'].'");</script>';
					redirect('detailsA/redirection/'.$PrimaK);
				}
			}else{
				$datab = array('upload_data' => $this->upload->data());

				$fileName = $datab['upload_data']['file_name'];
				$filePath = $datab['upload_data']['full_path'];
				$fileSize = $datab['upload_data']['file_size'];
				$fileType = $datab['upload_data']['file_type'];

				$chemin = "assets/img/activites/".$fileName;

				$data=array(
					'Titre'=>$Titre,
					'Description'=>$Description,
					'Image'=>$chemin,
					'PrimaK'=>$PrimaK);
				if($this->DetailsA_model->modif_detailA($data,2)){
					redirect('detailsA/redirection/'.$PrimaK);
				}

			}
		}
	}

	public function modifierDiapo($PrimaK){

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('DetailsA_model');

		$this->form_validation->set_rules('Description', 'Description', 'required|trim');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		if ($this->form_validation->run() === FALSE){

			$this->db->select('*')
			->from('DiapoActi')
			->where('PrimaK',$PrimaK);
			$query = $this->db->get();

			$DescriptionAmodif='';
			foreach ($query->result() as $resultat){
				$DescriptionAmodif = $resultat->Description;
			}

			$this->load->view('header');
			$this->load->view('navbar');
			$data=array('PrimaK' => $PrimaK,'Description'=>$DescriptionAmodif);
			$this->load->view('modifier_diapo',$data);
			$this->load->view('footer');

		}else{
			$Description = $this->input->post('Description');

			$datab['msg']	= '';

			$config['upload_path'] = './assets/img/activites/'; 
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '200000';
			$config['max_width']  = '600';
			$config['max_height']  = '600';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload()){
				$datab['error'] = $this->upload->display_errors();
				echo $datab['error'];
				if($datab['error']="You did not select a file to upload."){
					$data=array(
						'Description'=>$Description,
						'PrimaK'=>$PrimaK);
					if($this->DetailsA_model->modif_DiapoA($data,1)){
						redirect('detailsA/redirection/'.$PrimaK);
					}
				}else{
					echo '<script type="text/javascript">window.alert("'.$datab['error'].'");</script>';
					redirect('detailsA/redirection/'.$PrimaK);
				}
			}else{
				$datab = array('upload_data' => $this->upload->data());

				$fileName = $datab['upload_data']['file_name'];
				$filePath = $datab['upload_data']['full_path'];
				$fileSize = $datab['upload_data']['file_size'];
				$fileType = $datab['upload_data']['file_type'];

				$chemin = "assets/img/activites/".$fileName;

				$data=array(
					'Description'=>$Description,
					'Image'=>$chemin,
					'PrimaK'=>$PrimaK);
				if($this->DetailsA_model->modif_DiapoA($data,2)){
					redirect('detailsA/redirection/'.$PrimaK);
				}
			}
		}
	}
	public function addDiapo($PrimaKPActi){

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('DetailsA_model');

		$this->form_validation->set_rules('Description', 'Description', 'required|trim');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('header');
			$this->load->view('navbar');
			$data=array('PrimaK' => $PrimaKPActi);
			$this->load->view('ajouter_diapo',$data);
			$this->load->view('footer');

		}else{

			//trouver le dernier placement
			$this->db->select('*')
			->from('DiapoActi')
			->where('Appartenance',$PrimaKPActi)
			->order_by("Placement", "asc");
			$query = $this->db->get();

			foreach ($query->result() as $res){
				$p = $res->Placement;
			}

			$Description = $this->input->post('Description');

			$datab['msg']	= '';

			$config['upload_path'] = './assets/img/activites/'; 
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '200000';
			$config['max_width']  = '1200';
			$config['max_height']  = '1200';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload()){
				$datab['error'] = $this->upload->display_errors();
				echo '<script type="text/javascript">window.alert("'.$datab['error'].'");</script>';
				redirect('detailsA/addDiapo/'.$PrimaKPActi);
				
			}else{
				$datab = array('upload_data' => $this->upload->data());

				$fileName = $datab['upload_data']['file_name'];
				$filePath = $datab['upload_data']['full_path'];
				$fileSize = $datab['upload_data']['file_size'];
				$fileType = $datab['upload_data']['file_type'];

				$chemin = "assets/img/activites/".$fileName;

				$data=array(
					'Description'=>$Description,
					'Image'=>$chemin,
					'Placement'=>$p+1,
					'Appartenance'=>$PrimaKPActi);
				if($this->DetailsA_model->add_DiapoA($data,2)){
					redirect('detailsA/redirection/'.$PrimaK);
				}
			}
		}
	}

	public function deletePersonnel($PrimaK,$Placement, $Appartenance){
		$this->load->database();
		$this->load->model('DetailsA_model');

		$this->session->set_flashdata("error", "<div style='color:green;'>Formulaire supprimée avec succès</div>");

		//selectionner la table 
		$this->db->select('*')
		->from('DiapoActi')
		->where('Appartenance', $Appartenance)
		->order_by("Placement", "asc");
		$query = $this->db->get();

			//Boucle pour change les keys
		foreach ($query->result() as $resultat){
			if($resultat->Placement > $Placement){
				$this->recherche($resultat->PrimaK);
			}
		}
		if($this->Accueil_model->delete_diapo($PrimaK)){
			redirect('detailsA/redirection/'.$PrimaK);
		}
	}

	public function recherche($placement){
		$this->db->select('*')
		->from('DiapoActi')
		->where('PrimaK',$placement)
		->limit(1);

		foreach ($this->db->get()->result() as $change){
			$data = $change;
			$this->DetailsA_model->diminuerDiapo($data);
		}
		
		
	}
}
