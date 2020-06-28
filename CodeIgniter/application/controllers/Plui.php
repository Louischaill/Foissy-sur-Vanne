<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Plui extends MY_Controller {

	public function index(){
		$this->load->model('Plui_model');
		$Composants = $this->Plui_model->get_Data();
		$data=array('Data' => $Composants);
		$data1 = array();
		$data1['active'] = 4;
		$this->load->view("header");

		if ($this->session->userdata("logged_in")) {
			$this->load->view('navbarCo',$data1);
			$this->load->view("pluiAdmin",$data);
		}
		else {
			$this->load->view('navbar',$data1);
			$this->load->view("plui",$data);
		}	
		$this->load->view("footer");
	}

	public function modifierPlui($PrimaK){
		if ($this->session->userdata("logged_in")) {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('Plui_model');
			$this->load->helper('url');

			$this->form_validation->set_rules('TitreDom', 'TitreDom', 'required|trim');
			$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
			$this->form_validation->set_rules('Description', 'Description', 'required|trim');
			$this->form_validation->set_rules('Lien', 'Lien', 'required|trim');
			$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

			if ($this->form_validation->run() === FALSE){

				$this->db->select('*')
				->from('PluiFoissy');
				$query = $this->db->get();

				$TitreDomAmodif='';
				$TitreAmodif = '';
				$DescriptionAmodif='';
				$LienAmodif = '';

				foreach ($query->result() as $resultat){
					$TitreDomAmodif = $resultat->TitreDom;
					$TitreAmodif = $resultat->Titre;
					$DescriptionAmodif = $resultat->Description;
					$LienAmodif = $resultat->Lien;
				}
				$this->load->view('header');
				$data1 = array();
				$data1['active'] = 4;
				$this->load->view('navbarCo',$data1);
				$data=array('PrimaK' => $PrimaK, 'TitreDom'=>$TitreDomAmodif,'Titre'=>$TitreAmodif, 'Description'=>$DescriptionAmodif,'Lien'=>$LienAmodif);
				$this->load->view('modifier_plui',$data);
				$this->load->view('footer');

			}else{
				$TitreDom = $this->input->post('TitreDom');
				$Titre = $this->input->post('Titre');
				$Description = $this->input->post('Description');
				$Lien = $this->input->post('Lien');


				$datab['msg']	= '';

				$config['upload_path'] = './assets/Documents/'; 
				$config['allowed_types'] = 'pdf';
				$config['max_size']	= '200000';
				$config['max_width']  = '600';
				$config['max_height']  = '600';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()){
					$datab['error'] = $this->upload->display_errors();
					if($datab['error']="You did not select a file to upload."){
						$data=array(
							'TitreDom'=>$TitreDom,
							'Titre'=>$Titre,
							'Description'=>$Description,
							'Lien'=>$Lien,
							'PrimaK'=>$PrimaK);
						if($this->Plui_model->modif_plui($data,1)){
							redirect('plui');
						}
					}else{
						echo '<script type="text/javascript">window.alert("'.$datab['error'].'");</script>';
						redirect('plui');
					}
				}else{
					$datab = array('upload_data' => $this->upload->data());

					$fileName = $datab['upload_data']['file_name'];
					$filePath = $datab['upload_data']['full_path'];
					$fileSize = $datab['upload_data']['file_size'];
					$fileType = $datab['upload_data']['file_type'];

					$chemin = "assets/Documents/".$fileName;

					$data=array(
						'TitreDom'=>$TitreDom,
						'Titre'=>$Titre,
						'Description'=>$Description,
						'Lien'=>$Lien,
						'Image'=>$chemin,
						'PrimaK'=>$PrimaK);
					if($this->Plui_model->modif_plui($data,2)){
						redirect('plui');
					}

				}
			}
		}else{
			redirect('plui');
		}
	}	
}

