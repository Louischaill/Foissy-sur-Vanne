<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ecole_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}
	public function get_Sections(){
		$this->db->select('*')
		->from('EcoleFoissy')
		->order_by('Placement', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function modif_text($data){
		return	$this->db->set('Titre',$data['Titre'])->set('Description',$data['Description'])->where('PrimaK',$data['PrimaK'])->update('EcoleFoissy');

	}
}