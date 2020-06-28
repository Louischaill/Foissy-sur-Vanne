<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Comptes_rendus extends MY_Controller {

	public function index(){
		$this->load->model('ComptesRendus_model');
		$this->load->view("header");
		$data1 = array();
		$data1['active'] = 4;
		$Composants = $this->ComptesRendus_model->get_Data();
		$Date = $this->analyse($Composants);
		$data=array('Composants' => $Composants,'Date' => $Date);

		if ($this->session->userdata("logged_in")) {
			$this->load->view('navbarCo',$data1);
			$this->load->view("comptes_rendusAdmin",$data);
		}
		else {
			$this->load->view('navbar',$data1);
			$this->load->view("comptes_rendus",$data);
		}
		$this->load->view("footer");
	}

	public function analyse($data){
		$Tabdate= array();
		foreach ($data as $resultat){
			$Tabdate[$resultat->PrimaK] = $this->MeF_Date($resultat->Date);
		}
		return $Tabdate;
	}

	public function MeF_Date($str){ // Change une date aaaa/mm/dd en dd mois aaaa

    // Récupère la date dans des variables
		list($annee, $mois, $jour) = explode("-", $str);
    // Retire le 0 des jours
		if ($jour=="00") $jour="";
		elseif (substr($jour, 0, 1)=="0") $jour=substr($jour, 1, 1);
    // Met le mois en littéral
		$moisli{1} = "janvier";
		$moisli{2} = "février";
		$moisli{3} = "mars";
		$moisli{4} = "avril";
		$moisli{5} = "mai";
		$moisli{6} = "juin";
		$moisli{7} = "juillet";
		$moisli{8} = "août";
		$moisli{9} = "septembre";
		$moisli{10} = "octobre";
		$moisli{11} = "novembre";
		$moisli{12} = "décembre";
		if (substr($mois, 0, 1)=="0") $mois=substr($mois, 1, 1);
		$mois = $moisli[$mois];
    // Met en forme 
		$str = $jour.' '.$mois.' '.$annee;
		return $str;
	}
}