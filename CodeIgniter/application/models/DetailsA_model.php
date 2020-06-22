<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetailsA_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}
	public function get_Infos($PrimaK){
		$this->db->select('*')
		->from('DetailsAFoissy')
		->where('PrimaK', $PrimaK);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_Diapo($PrimaK){
		$this->db->select('*')
		->from('DiapoActi')
		->where('Appartenance', $PrimaK)
		->order_by('Placement', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function modif_detailA($data,$choix){
		if($choix==1){
			return	$this->db->set('Titre',$data['Titre'])->set('Description',$data['Description'])->where('PrimaK',$data['PrimaK'])->update('DetailsAFoissy');
		}else{
			return	$this->db->set('Titre',$data['Titre'])->set('Description',$data['Description'])->set('Image',$data['Image'])->where('PrimaK',$data['PrimaK'])->update('DetailsAFoissy');
		}
	}
	public function modif_DiapoA($data,$choix){
		if($choix==1){
			return	$this->db->set('Description',$data['Description'])->where('PrimaK',$data['PrimaK'])->update('DiapoActi');
		}else{
			return	$this->db->set('Description',$data['Description'])->set('Image',$data['Image'])->where('PrimaK',$data['PrimaK'])->update('DetailsAFoissy');
		}
	}
	public function add_DiapoA($data){
		return	$this->db->insert('DiapoActi', $data);
	}
	public function delete_personnel($data){
		return $this->db
		->where('PrimaK',$data)
		->delete("DetailsAFoissy");
	}
	public function diminuerDiapo($data){
		$place = $data->Placement;
		$place = $place-1;
		return	$this->db->set('Placement',$place)->where('PrimaK', $data->PrimaK)->update('DetailsAFoissy');
	}
}
