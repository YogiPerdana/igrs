<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller{
	private $role = '6';

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
	    $this->load->library('form_validation','session');
	    $this->load->model('LoginModel');
	    //$this->load->library('Login/isLogged');
	    //$this->load->model('ArtikelModel');
	    $this->_init();
	}

	private function _init()
	{
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
	date_default_timezone_set('Asia/Jakarta');
     $this->load->css('assets/libraries/bootstrap/bootstrap.min.css');
	 $this->load->css('assets/libraries/style.css');
	 $this->load->css('assets/libraries/owl-carousel/owl.theme.css');
	 $this->load->css('assets/libraries/flexslider/flexslider.css');
	 $this->load->css('assets/libraries/fonts/font-awesome.min.css');
	 $this->load->css('assets/css/components.css');
	    // $this->load->js('assets/libraries/jquery.animateNumber.min.js');
	 $this->load->js('assets/libraries/flexslider/jquery.flexslider-min.js');
	    //$this->load->js('assets/dist/js/app.min.js');
	 $this->load->js('assets/js/functions.js');
	 $this->load->js('assets/js');
	}

	function isLogged(){
		$sesdat = $this->session->userdata('logged_in');
		$role = $sesdat['role'];
		if($sesdat){
			if($role == 6){
				return $sesdat;
			}else{
				show_404();
			}
		}else{
			echo "";
		}
	}

	public function get_profil($nama){
		$sesdat = $this->session->userdata('logged_in');
		$iden_user = $sesdat['nama_contributor'];
		if($nama == $iden_user){
			$data =array(
			'action'=>'',
			'selected'=>'',
			);
		$this->output->set_title('Artikel');
		$this->output->set_template('home');
		$this->load->view('contributor/profil',$data);	
		}else{
			print_r($iden_user);
		}

	} 


}
?>