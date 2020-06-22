<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plui_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}
	public function get_Data(){
		$this->db->select('*')
		->from('PluiFoissy');
		$query = $this->db->get();
		return $query->result();
	}
	public function modif_plui($data,$choix){
		if($choix==1){
			return	$this->db->set('TitreDom',$data['TitreDom'])->set('Titre',$data['Titre'])->set('Description',$data['Description'])->set('Lien',$data['Lien'])->where('PrimaK',$data['PrimaK'])->update('PluiFoissy');
		}else{
			return	$this->db->set('TitreDom',$data['TitreDom'])->set('Titre',$data['Titre'])->set('Description',$data['Description'])->set('Lien',$data['Lien'])->set('Image',$data['Image'])->where('PrimaK',$data['PrimaK'])->update('PluiFoissy');
		}
	}

}