<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accueil_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function get_Activite(){
		$this->db->select('*')
		->from('AccueilFoissy')
		->where('PlacePage','Activite')
		->order_by('Placement', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_Texte(){
		$this->db->select('*')
		->from('AccueilFoissy')
		->where('PlacePage','Texte')
		->order_by('Placement', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_Personnel(){
		$this->db->select('*')
		->from('PersonnelFoissy')
		->order_by('Placement', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function modif_text($data){
		return	$this->db->set('Titre',$data['Titre'])->set('Description',$data['Description'])->where('PrimaK',$data['PrimaK'])->update('AccueilFoissy');
	}
	public function modif_mdm($data){
		return	$this->db->set('Titre',$data['Titre'])->where('PrimaK',$data['PrimaK'])->update('AccueilFoissy');
	}
	public function modif_personnel($data,$choix){
		if($choix==1){
			return	$this->db->set('Titre',$data['Titre'])->set('Metier',$data['Metier'])->set('Role',$data['Role'])->set('Placement',$data['Placement'])->where('PrimaK',$data['PrimaK'])->update('PersonnelFoissy');
		}else{
			return	$this->db->set('Titre',$data['Titre'])->set('Metier',$data['Metier'])->set('Role',$data['Role'])->set('Placement',$data['Placement'])->set('Image',$data['Image'])->where('PrimaK',$data['PrimaK'])->update('PersonnelFoissy');
		}
	}
	public function modif_activite($data,$choix){
		if($choix==1){
			return	$this->db->set('Titre',$data['Titre'])->set('Placement',$data['Placement'])->set('Couleur',$data['Couleur'])->where('PrimaK',$data['PrimaK'])->update('AccueilFoissy');
		}else{
			return	$this->db->set('Titre',$data['Titre'])->set('Couleur',$data['Couleur'])->set('Placement',$data['Placement'])->set('Image',$data['Image'])->where('PrimaK',$data['PrimaK'])->update('AccueilFoissy');
		}
	}
	public function diminuerKey($data){
		$place = $data->Placement;
		$place = $place-1;
		return	$this->db->set('Placement',$place)->where('PrimaK', $data->PrimaK)->update('AccueilFoissy');
	}
	public function augmenterKey($data){
		$place = $data->Placement;
		$place = $place+1;
		return	$this->db->set('Placement',$place)->where('PrimaK', $data->PrimaK)->update('AccueilFoissy');
	}

	public function create_personnel($data){
		return	$this->db->insert('PersonnelFoissy', $data);
	}

	public function augmenterPersonnel($data){
		$place = $data->Placement;
		$place = $place+1;
		return	$this->db->set('Placement',$place)->where('PrimaK', $data->PrimaK)->update('PersonnelFoissy');
	}
	public function diminuerPersonnel($data){
		$place = $data->Placement;
		$place = $place-1;
		return	$this->db->set('Placement',$place)->where('PrimaK', $data->PrimaK)->update('PersonnelFoissy');
	}
		public function delete_personnel($data){
		return $this->db
		->where('PrimaK',$data)
		->delete("PersonnelFoissy");
	}


	public function create_formu($data){
		return	$this->db->insert('Accueil', $data);
	}
	public function modif_formu($data){
		return	$this->db->set('Placement',$data['Position'])->set('Titre',$data['Titre'])->set('Description',$data['Description'])->where('PrimaK',$data['PrimaK'])->update('Accueil');
	}




}
