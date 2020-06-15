<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function modifier($Placement, $TitreAmodif,$DescriptionAmodif, $Total){
		if ($this->session->userdata("logged_in")) {
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('Dashboard_model');

			$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
			$this->form_validation->set_rules('Description', 'Description', 'required|trim');
			$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

			if ($this->form_validation->run() === FALSE){
				$this->load->view('header');
				$this->load->view('navbar');
				$data=array('Placement' => $Placement, 'Titre'=>$TitreAmodif, 'Description'=> $DescriptionAmodif, 'Total'=> $Total);
				$this->load->view('modifier_formulaire',$data);
				$this->load->view('footer');

			}else{

				$Titre = $this->input->post('Titre');
				$Description = $this->input->post('Description');
				$Position = $this->input->post('Position');
				echo $Titre."<br>".$Description."<br>".$Position."<br>";
				//selectionner la table 
				$this->db->select('*')
				->from('Accueil')
				->order_by("Placement", "asc");
				$query = $this->db->get();
				echo "Placement ".$Placement." Position : ".$Position."<br>";

				if($Placement < $Position){
					//Boucle pour change les keys
					foreach ($query->result() as $resultat){
						if($resultat->Placement == $Placement){
							echo "titre ".$resultat->Titre." PLace : ".$resultat->Placement."<br>";
							$data=array(
								'Titre'=>$Titre,
								'Description'=>$Description,
								'Position'=>$Position,
								'PrimaK'=>$resultat->PrimaK
							);
							$this->Dashboard_model->modif_formu($data);				
						}
						if($resultat->Placement > $Placement && $resultat->Placement <= $Position ){
							$data=$resultat;
							$this->Dashboard_model->diminuerKey($data);
						}
					}
					redirect('dashboard');
				}else if($Placement > $Position){
					//Boucle pour change les keys
					foreach ($query->result() as $resultat){
						echo "Placement ".$resultat->Placement." PLace : ".$Placement."<br>";
						if($resultat->Placement == $Placement){
							echo "titre ".$resultat->Titre." PLace : ".$resultat->Placement."<br>";
							$data=array(
								'Titre'=>$Titre,
								'Description'=>$Description,
								'Position'=>$Position,
								'PrimaK'=>$resultat->PrimaK
							);
							$this->Dashboard_model->modif_formu($data);				
						}
						if($resultat->Placement >= $Position && $resultat->Placement < $Placement ){
							$data=$resultat;
							$this->Dashboard_model->augmenterKey($data);
						}
					}
					redirect('dashboard');
				}else if($Placement == $Position){
					//Boucle pour change les keys
					foreach ($query->result() as $resultat){
						echo "Placement ".$resultat->Placement." PLace : ".$Placement."<br>";
						if($resultat->Placement == $Placement){
							echo "titre ".$resultat->Titre." PLace : ".$resultat->Placement."<br>";
							$data=array(
								'Titre'=>$Titre,
								'Description'=>$Description,
								'Position'=>$Position,
								'PrimaK'=>$resultat->PrimaK
							);
							$this->Dashboard_model->modif_formu($data);				
						}
					}
					redirect('dashboard');
				}
			}
		}else{
			redirect('home');
		}
	}


	public function add($Place){
		if ($this->session->userdata("logged_in")) {
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->model('Dashboard_model');

			$this->form_validation->set_rules('Titre', 'Titre', 'required|trim');
			$this->form_validation->set_rules('Description', 'Description', 'required|trim');
			$this->form_validation->set_message('required', '<div style="color:lightgrey;">{field} doit être renseigné.</div>');

			$chemin = '';

			if ($this->form_validation->run() === FALSE){
				$this->load->view('header');
				$this->load->view('navbar');
				$data=array('Place' => $Place);
				$this->load->view('ajouter_formulaire',$data);
				$this->load->view('footer');

			}else{
				// recuperer le titre et description
				$Titre = $this->input->post('Titre');
				$Description = $this->input->post('Description');
				
				//selectionner la table 
				$this->db->select('*')
				->from('Accueil')
				->order_by("Placement", "asc");
				$query = $this->db->get();

				//Boucle pour change les keys
				foreach ($query->result() as $resultat){
					//si place a changer atteinte
					if($resultat->Placement > $Place){
						echo "titre ".$resultat->Titre." PLace : ".$resultat->Placement."<br>";
						$this->recherche($resultat->PrimaK,1);
					}
				}

				$datab['msg']	= '';

				$config['upload_path'] = './uploads/'; 
				$config['allowed_types'] = 'pdf|docx|gif|jpg|png|txt|jpeg';
				$config['max_size']	= '52428800';
				$config['max_width']  = '100000';
				$config['max_height']  = '100000';


				$this->load->library('upload', $config);


				if ( ! $this->upload->do_upload())
				{
					$datab['error'] = $this->upload->display_errors();
					echo $datab['error'];

				}
				else
				{
					$datab = array('upload_data' => $this->upload->data());

					$fileName = $datab['upload_data']['file_name'];
					$filePath = $datab['upload_data']['full_path'];
					$fileSize = $datab['upload_data']['file_size'];
					$fileType = $datab['upload_data']['file_type'];

					$chemin = base_url()."uploads/".$fileName;
					$lien =array('lien' => $chemin);
					$datab['msg']	= 'The file '.$fileName.' was successfully uploaded!';
					//$this->load->view('succesPage',$lien);

				}

				$data=array(
					'Titre'=>$Titre,
					'Description'=>$Description,
					'Image'=>$chemin,
					'Placement'=>$Place+1,
				);
				var_dump($data);
				if	($this->Dashboard_model->create_formu($data)){
					//redirect("dashboard");

				}
			}
		}

		else {
			redirect("home");
		}
	}
	// Attention quand on va deplacer sur hergeur pas oublier de donner les droits au dossier desti
	function do_upload()
	{
		$data['msg']	= '';

		$config['upload_path'] = './uploads/'; //donner droits doss upload
		$config['allowed_types'] = 'pdf|docx|gif|jpg|png|txt|jpeg';
		$config['max_size']	= '52428800';
		$config['max_width']  = '100000';
		$config['max_height']  = '100000';
		

		$this->load->library('upload', $config);


		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			echo $data['error'];

		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$fileName = $data['upload_data']['file_name'];
			$filePath = $data['upload_data']['full_path'];
			$fileSize = $data['upload_data']['file_size'];
			$fileType = $data['upload_data']['file_type'];

			$chemin = base_url()."uploads/".$fileName;
			$lien =array('lien' => $chemin);
			$data['msg']	= 'The file '.$fileName.' was successfully uploaded!';
			echo $data['msg'];
			//$this->load->view('succesPage',$lien);
			return base_url()."uploads/".$fileName;
			
		}
	}

	public function recherche($placement, $choix){
		$this->db->select('*')
		->from('Accueil')
		->where('PrimaK',$placement)
		->limit(1);

		if($choix == 1){
			foreach ($this->db->get()->result() as $change){
				$data = $change;
				$this->Dashboard_model->augmenterKey($data);
			}
		}else{
			if($choix == 2){
				foreach ($this->db->get()->result() as $change){
					$data = $change;
					$this->Dashboard_model->diminuerKey($data);
				}
			}
		}
	}


	public function delete($Place,$key){
		if ($this->session->userdata("logged_in")) {
			$this->load->database();
			$this->load->model('Dashboard_model');

			$this->session->set_flashdata("error", "<div style='color:green;'>Formulaire supprimée avec succès</div>");

			//selectionner la table 
			$this->db->select('*')
			->from('Accueil')
			->order_by("Placement", "asc");
			$query = $this->db->get();

			//Boucle pour change les keys
			foreach ($query->result() as $resultat){
				if($resultat->Placement > $Place){
					echo "titre ".$resultat->Titre." PLace : ".$resultat->Placement."<br>";
					$this->recherche($resultat->PrimaK,2);
				}
			}

			if($this->Dashboard_model->delete_formu($key)){
				redirect('dashboard');
			}

		}else{
			redirect('home');
		}
	}

	public function index(){
		$this->load->helpers('form');
		$this->load->model('Dashboard_model');
		$this->load->library('table');

		$Composants = $this->Dashboard_model->get_composants();
		$data=array('Composants' => $Composants);
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}
}
