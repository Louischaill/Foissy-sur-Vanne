<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Accueil extends MY_Controller {

	public function modifierTexte($PrimaK){

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Accueil_model');

		$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
		$this->form_validation->set_rules('Description', 'Description', 'required|trim');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		if ($this->form_validation->run() === FALSE){

			$this->db->select('*')
			->from('AccueilFoissy')
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
			$this->load->view('modifier_texte1',$data);
			$this->load->view('footer');

		}else{
			$Titre = $this->input->post('Titre');
			$Description = $this->input->post('Description');

			$data=array(
				'Titre'=>$Titre,
				'Description'=>$Description,
				'PrimaK'=>$PrimaK);
			if($this->Accueil_model->modif_text($data)){
				redirect('accueil');
			}

		}
	}
	public function modifierMDM($PrimaK){

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Accueil_model');

		$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		if ($this->form_validation->run() === FALSE){

			$this->db->select('*')
			->from('AccueilFoissy')
			->where('PrimaK',$PrimaK);
			$query = $this->db->get();
			$TitreAmodif = '';
			$DescriptionAmodif='';

			foreach ($query->result() as $resultat){
				$TitreAmodif = $resultat->Titre;
			}
			$this->load->view('header');
			$this->load->view('navbar');
			$data=array('PrimaK' => $PrimaK, 'Titre'=>$TitreAmodif);
			$this->load->view('modifier_MDM',$data);
			$this->load->view('footer');

		}else{
			$Titre = $this->input->post('Titre');

			$data=array(
				'Titre'=>$Titre,
				'PrimaK'=>$PrimaK);
			if($this->Accueil_model->modif_mdm($data)){
				redirect('accueil');
			}
		}
	}

	public function modifierPersonnel($PrimaK,$total){

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Accueil_model');
		$this->load->helper('url');

		$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
		$this->form_validation->set_rules('Metier', 'Description', 'required|trim');
		$this->form_validation->set_rules('Role', 'Description', 'required|trim');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		$PlacementAmodif;

		$TitreAmodif = '';
		$MetierAmodif='';
		$RoleAmodif='';

		$this->db->select('*')
		->from('PersonnelFoissy')
		->where('PrimaK',$PrimaK);
		$query = $this->db->get();

		foreach ($query->result() as $resultat){
			$TitreAmodif = $resultat->Titre;
			$MetierAmodif = $resultat->Metier;
			$RoleAmodif = $resultat->Role;
			$PlacementAmodif = $resultat->Placement;
		}

		if ($this->form_validation->run() === FALSE){

			$this->load->view('header');
			$this->load->view('navbar');
			$data=array('PrimaK' => $PrimaK, 'Titre'=>$TitreAmodif, 'Metier'=>$MetierAmodif,"Placement"=>$PlacementAmodif,'Role'=>$RoleAmodif,"Total"=>$total);
			$this->load->view('modifier_personnel',$data);
			$this->load->view('footer');

		}else{
			$Titre = $this->input->post('Titre');
			$Metier = $this->input->post('Metier');
			$Role = $this->input->post('Role');
			$Position = $this->input->post('Position');

			$datab['msg']	= '';

			$config['upload_path'] = './assets/img/personnel/'; 
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '200000';
			$config['max_width']  = '600';
			$config['max_height']  = '600';

			$this->db->select('*')
			->from('PersonnelFoissy')
			->order_by("Placement", "asc");
			$query = $this->db->get();

			if($Position == $PlacementAmodif){
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()){
					$datab['error'] = $this->upload->display_errors();
					if($datab['error']="You did not select a file to upload."){
						$data=array(
							'Titre'=>$Titre,
							'Metier'=>$Metier,
							'Role'=>$Role,
							'Placement'=>$Position,
							'PrimaK'=>$PrimaK);
						if($this->Accueil_model->modif_personnel($data,1)){
							redirect('accueil');
						}
					}

				}else{
					$datab = array('upload_data' => $this->upload->data());

					$fileName = $datab['upload_data']['file_name'];
					$filePath = $datab['upload_data']['full_path'];
					$fileSize = $datab['upload_data']['file_size'];
					$fileType = $datab['upload_data']['file_type'];

					$chemin = "assets/img/personnel/".$fileName;

					$data=array(
						'Titre'=>$Titre,
						'Metier'=>$Metier,
						'Role'=>$Role,
						'Image'=>$chemin,
						'Placement'=>$Position,
						'PrimaK'=>$PrimaK);
					if($this->Accueil_model->modif_personnel($data,2)){
						redirect('accueil');
					}
				}
			}else if($PlacementAmodif < $Position){

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()){
					$datab['error'] = $this->upload->display_errors();
					echo $datab['error'];
					if($datab['error']="You did not select a file to upload."){
						foreach ($query->result() as $resultat){
							echo $resultat->Placement.">".$PlacementAmodif."   ".$resultat->Placement."<=".$Position;
							if($resultat->Placement == $PlacementAmodif){
								$data=array(
									'Titre'=>$Titre,
									'Metier'=>$Metier,
									'Role'=>$Role,
									'Placement'=>$Position,
									'PrimaK'=>$PrimaK);
								$this->Accueil_model->modif_personnel($data,1);
							}
							if($resultat->Placement > $PlacementAmodif && $resultat->Placement <= $Position ){
								$data=$resultat;
								$this->Accueil_model->diminuerPersonnel($data);
							}
							
						}
					}
					redirect('accueil');
				}else{
					$datab = array('upload_data' => $this->upload->data());

					$fileName = $datab['upload_data']['file_name'];
					$filePath = $datab['upload_data']['full_path'];
					$fileSize = $datab['upload_data']['file_size'];
					$fileType = $datab['upload_data']['file_type'];

					$chemin = "assets/img/personnel/".$fileName;

					foreach ($query->result() as $resultat){
						if($resultat->Placement == $PlacementAmodif){
							$data=array(
								'Titre'=>$Titre,
								'Metier'=>$Metier,
								'Role'=>$Role,
								'Placement'=>$Position,
								'Image'=>$chemin,
								'PrimaK'=>$PrimaK);
							$this->Accueil_model->modif_personnel($data,2);
						}
						if($resultat->Placement > $PlacementAmodif && $resultat->Placement <= $Position ){
							$data=$resultat;
							$this->Accueil_model->diminuerPersonnel($data);
						}
					}
					redirect("accueil");
				}

			}else if($PlacementAmodif > $Position){
				echo ">";
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()){
					$datab['error'] = $this->upload->display_errors();
					if($datab['error']="You did not select a file to upload."){
						foreach ($query->result() as $resultat){
							if($resultat->Placement == $PlacementAmodif){
								$data=array(
									'Titre'=>$Titre,
									'Metier'=>$Metier,
									'Role'=>$Role,
									'Placement'=>$Position,
									'PrimaK'=>$PrimaK);
								$this->Accueil_model->modif_personnel($data,1);						
							}
							if($resultat->Placement >= $Position && $resultat->Placement < $PlacementAmodif){
								$data=$resultat;
								$this->Accueil_model->augmenterPersonnel($data);
							}	
						}		
					}		
					redirect('accueil');
				}else{
					$datab = array('upload_data' => $this->upload->data());

					$fileName = $datab['upload_data']['file_name'];
					$filePath = $datab['upload_data']['full_path'];
					$fileSize = $datab['upload_data']['file_size'];
					$fileType = $datab['upload_data']['file_type'];

					$chemin = "assets/img/personnel/".$fileName;

					foreach ($query->result() as $resultat){
						if($resultat->Placement == $PlacementAmodif){
							$data=array(
								'Titre'=>$Titre,
								'Metier'=>$Metier,
								'Role'=>$Role,
								'Placement'=>$Position,
								'Image'=>$chemin,
								'PrimaK'=>$PrimaK);
							$this->Accueil_model->modif_personnel($data,2);
						}
						if($resultat->Placement >= $Position && $resultat->Placement < $PlacementAmodif ){
							$data=$resultat;
							$this->Accueil_model->augmenterPersonnel($data);
						}
					}
					redirect("accueil");
				}
			}
		}
	}

	public function modifierActivite($PrimaK,$total){

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Accueil_model');
		$this->load->helper('url');

		$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
		$this->form_validation->set_rules('bgcolor', 'bgcolor', 'trim');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		$TitreAmodif = '';
		$MetierAmodif='';
		$RoleAmodif='';
		$PlacementAmodif;

		$this->db->select('*')
		->from('AccueilFoissy')
		->where('PrimaK',$PrimaK);
		$query = $this->db->get();

		foreach ($query->result() as $resultat){
			$TitreAmodif = $resultat->Titre;
			$PlacementAmodif = $resultat->Placement;
			$colorAmodif = $resultat->Couleur;
		}

		if ($this->form_validation->run() === FALSE){

			$this->load->view('header');
			$this->load->view('navbar');
			$data=array('PrimaK' => $PrimaK, 'Titre'=>$TitreAmodif,'Couleur'=>$colorAmodif, "Placement"=>$PlacementAmodif,"Total"=>$total);
			$this->load->view('modifier_activite',$data);
			$this->load->view('footer');

		}else{
			echo $PlacementAmodif;
			$Titre = $this->input->post('Titre');
			$bgcolor = $this->input->post('Bgcolor');
			$Position = $this->input->post('Position');

			$datab['msg']	= '';

			$config['upload_path'] = './assets/img/activites/'; 
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '200000';
			$config['max_width']  = '600';
			$config['max_height']  = '600';

			$this->db->select('*')
			->from('AccueilFoissy')
			->where('PlacePage','Activite')
			->order_by("Placement", "asc");
			$query = $this->db->get();

			if($Position == $PlacementAmodif){
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()){
					$datab['error'] = $this->upload->display_errors();
					if($datab['error']="You did not select a file to upload."){
						$data=array(
							'Titre'=>$Titre,
							'Couleur'=>$bgcolor,
							'Placement'=>$Position,
							'PrimaK'=>$PrimaK);
						if($this->Accueil_model->modif_activite($data,1)){
							redirect('accueil');
						}
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
						'Image'=>$chemin,
						'Couleur'=>$bgcolor,
						'Placement'=>$Position,
						'PrimaK'=>$PrimaK);
					if($this->Accueil_model->modif_activite($data,2)){
						redirect('accueil');
					}
				}
			}else if($PlacementAmodif < $Position){

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()){
					echo 'passage;';
					$datab['error'] = $this->upload->display_errors();
					if($datab['error']="You did not select a file to upload."){
						foreach ($query->result() as $resultat){
							if($resultat->Placement == $PlacementAmodif){
								$data=array(
									'Titre'=>$Titre,
									'Couleur'=>$bgcolor,
									'Placement'=>$Position,
									'PrimaK'=>$PrimaK);
								$this->Accueil_model->modif_activite($data,1);
							}
							if($resultat->Placement > $PlacementAmodif && $resultat->Placement <= $Position ){
								$data=$resultat;
								$this->Accueil_model->diminuerKey($data);
							}
						}
					}
					redirect('accueil');
				}else{
					$datab = array('upload_data' => $this->upload->data());

					$fileName = $datab['upload_data']['file_name'];
					$filePath = $datab['upload_data']['full_path'];
					$fileSize = $datab['upload_data']['file_size'];
					$fileType = $datab['upload_data']['file_type'];

					$chemin = "assets/img/activites/".$fileName;

					foreach ($query->result() as $resultat){
						if($resultat->Placement == $PlacementAmodif){
							$data=array(
								'Titre'=>$Titre,
								'Couleur'=>$bgcolor,
								'Placement'=>$Position,
								'Image'=>$chemin,
								'PrimaK'=>$PrimaK);
							$this->Accueil_model->modif_activite($data,2);
						}
						if($resultat->Placement > $PlacementAmodif && $resultat->Placement <= $Position ){
							$data=$resultat;
							$this->Accueil_model->diminuerKey($data);
						}
					}
					redirect("accueil");
				}

			}else if($PlacementAmodif > $Position){
				echo ">";
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload()){
					$datab['error'] = $this->upload->display_errors();
					if($datab['error']="You did not select a file to upload."){
						foreach ($query->result() as $resultat){
							if($resultat->Placement == $PlacementAmodif){
								$data=array(
									'Titre'=>$Titre,
									'Couleur'=>$bgcolor,
									'Placement'=>$Position,
									'PrimaK'=>$PrimaK);
								$this->Accueil_model->modif_activite($data,1);						
							}
							if($resultat->Placement >= $Position && $resultat->Placement < $PlacementAmodif){
								$data=$resultat;
								$this->Accueil_model->augmenterKey($data);
							}	
						}		
					}		
					redirect('accueil');
				}else{
					$datab = array('upload_data' => $this->upload->data());

					$fileName = $datab['upload_data']['file_name'];
					$filePath = $datab['upload_data']['full_path'];
					$fileSize = $datab['upload_data']['file_size'];
					$fileType = $datab['upload_data']['file_type'];

					$chemin = "assets/img/activites/".$fileName;

					foreach ($query->result() as $resultat){
						if($resultat->Placement == $PlacementAmodif){
							$data=array(
								'Titre'=>$Titre,
								'Couleur'=>$bgcolor,
								'Placement'=>$Position,
								'Image'=>$chemin,
								'PrimaK'=>$PrimaK);
							$this->Accueil_model->modif_activite($data,2);
						}
						if($resultat->Placement >= $Position && $resultat->Placement < $PlacementAmodif ){
							$data=$resultat;
							$this->Accueil_model->augmenterKey($data);
						}
					}
					redirect("accueil");
				}
			}
		}
	}

	public function ajouterPersonnel(){
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Accueil_model');

		$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
		$this->form_validation->set_rules('Metier', 'Description', 'required|trim');
		$this->form_validation->set_rules('Role', 'Description', 'required|trim');
		$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

		$chemin = '';

		if ($this->form_validation->run() === FALSE){
			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('ajouter_personnel');
			$this->load->view('footer');

		}else{

			$Titre = $this->input->post('Titre');
			$Metier = $this->input->post('Metier');
			$Role = $this->input->post('Role');

			//trouver le dernier placement
			$this->db->select('*')
			->from('PersonnelFoissy')
			->order_by("Placement", "asc");
			$query = $this->db->get();

			foreach ($query->result() as $res){
				$p = $res->Placement;
			}

			$datab['msg']	= '';

			$config['upload_path'] = './assets/img/personnel/'; 
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '52428800';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';


			$this->load->library('upload', $config);


			if ( ! $this->upload->do_upload()){
				//pas de photo upload
				$datab['error'] = $this->upload->display_errors();
				echo '<script type="text/javascript">window.alert("'.$datab['error'].'");</script>';
				redirect('accueil');
			}
			else{
				//tout ce passe bien 
				$datab = array('upload_data' => $this->upload->data());

				$fileName = $datab['upload_data']['file_name'];
				$filePath = $datab['upload_data']['full_path'];
				$fileSize = $datab['upload_data']['file_size'];
				$fileType = $datab['upload_data']['file_type'];

				$chemin = "assets/img/personnel/".$fileName;

				$data=array(
					'Titre'=>$Titre,
					'Metier'=>$Metier,
					'Role'=>$Role,
					'Image'=>$chemin,
					'Placement'=>$p+1
				);

				if	($this->Accueil_model->create_personnel($data)){
					redirect("accueil");
				}
			}
		}
	}

	public function recherche($placement){
		$this->db->select('*')
		->from('PersonnelFoissy')
		->where('PrimaK',$placement)
		->limit(1);

		foreach ($this->db->get()->result() as $change){
			$data = $change;
			$this->Accueil_model->diminuerPersonnel($data);
		}
		
		
	}

	public function deletePersonnel($PrimaK,$Placement){
		$this->load->database();
		$this->load->model('Accueil_model');

		$this->session->set_flashdata("error", "<div style='color:green;'>Formulaire supprimée avec succès</div>");

			//selectionner la table 
		$this->db->select('*')
		->from('PersonnelFoissy')
		->order_by("Placement", "asc");
		$query = $this->db->get();

			//Boucle pour change les keys
		foreach ($query->result() as $resultat){
			if($resultat->Placement > $Placement){
				echo "titre ".$resultat->Titre." PLace : ".$resultat->Placement."<br>";
				$this->recherche($resultat->PrimaK);
			}
		}
		if($this->Accueil_model->delete_personnel($PrimaK)){
			redirect('accueil');
		}
	}


	public function index()
	{
		$this->load->model('Accueil_model');
		$this->load->view("header");
		if ($this->session->userdata("logged_in")) {
			$this->load->view("navbar");
		}
		else {
			$this->load->view("navbar");
		}

		$Composants1 = $this->Accueil_model->get_Texte();
		$Composants2 = $this->Accueil_model->get_Activite();
		$Composants3 = $this->Accueil_model->get_Personnel();

		$data=array('Texte' => $Composants1,'Activite'=> $Composants2,'Personnel'=>$Composants3);
		$this->load->view("accueilAdmin",$data);
		$this->load->view("footer");
	}

}
