<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}
	public function set_formu($Formu){
		$KeyF = $Formu['KeyF'];
		$data = array(
		//	'id'=>$id,
			'username' => $this->session->userdata('username'),
			'Titre' => $Formu['Titre'],
			'Description' => $Formu['Description'],
			'bgcolor' => $Formu['bgcolor']
		);

		$this->db->where('KeyF', $KeyF);
		return $this->db->update('Formulaire', $data);
		//return $this->db->replace('Formulaire',$data);

	}

	public function get_composants(){
		$this->db->select('*')
		->from('Accueil')
		->order_by('Placement', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function create_formu($data){
		return	$this->db->insert('Accueil', $data);
	}
	public function modif_formu($data){
		return	$this->db->set('Placement',$data['Position'])->set('Titre',$data['Titre'])->set('Description',$data['Description'])->where('PrimaK',$data['PrimaK'])->update('Accueil');
	}
	public function augmenterKey($data){
		$place = $data->Placement;
		$place = $place+1;
		return	$this->db->set('Placement',$place)->where('PrimaK', $data->PrimaK)->update('Accueil');
	}
	public function diminuerKey($data){
		$place = $data->Placement;
		$place = $place-1;
		return	$this->db->set('Placement',$place)->where('PrimaK', $data->PrimaK)->update('Accueil');
	}

	public function delete_formu($data){
		return $this->db
		->where('PrimaK',$data)
		->delete("Accueil");
	}

	public function activate_formu($KeyF,$Etat){
		if ($Etat=='Inactif') {
			return $this->db
			->where('KeyF',$KeyF)
			->set('Etat', 'Actif')
			->update("Formulaire");
		}
		else {
			return $this->db
			->where('KeyF',$KeyF)
			->set('Etat', 'Inactif')
			->update("Formulaire");
		}
	}

}
