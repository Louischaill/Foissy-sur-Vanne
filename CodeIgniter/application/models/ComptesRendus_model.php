<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ComptesRendus_model extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function get_Data(){
		$this->db->select('*')
		->from('ComptesRendusFoissy')
		->order_by('Date', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

}