<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('DirektoriModel');
    $this->load->helper(array('url_helper', 'form', 'url'));
    $this->load->library(array('pagination','form_validation'));
    $this->_init();

    function excerpt($string){
    	$string = substr($string, 0, 100);
    	return $string. "...";
    }

    $sesdat = $this->session->userdata('logged_in');
    
    // if($sesdat['role'] == 5){
    // 	//die($sesdat['role']);
    // 	redirect(site_url('cms/artikel'));
    // }
    // else{
    // 	redirect(site_url('berita'));
    // }

  }

  private function _init()
	{
	setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
	date_default_timezone_set('Asia/Jakarta');
	$this->load->css('assets/css/bootstrap.css');
    $this->load->js('assets/js/jquery-2.2.3.js');
    $this->load->css('assets/dist/css/skins/_all-skins.min.css');
    $this->load->js('assets/plugins/fastclick/fastclick.min.js');
    $this->load->js('assets/plugins/slimScroll/jquery.slimscroll.min.js');
    $this->load->js('assets/dist/js/demo.js');
	}

	public function index()
	{
		$this->load->js('assets/js/datatables.min.js');
		$this->load->css('assets/css/datatables.min.css');
		//$this->load->js('assets/bootstrap/js/bootstrap.min.js');
		$data = array(
			'sesdat'=>$this->whoami->sesdat(),
			'direktori'=>$this->DirektoriModel->get_direktori(),
		);
		//$data['artikel'] = $this->ArtikelModel->get_artikel();
		$this->output->set_template('pengembang');
		// $this->load->view('cms/header');	
		$this->load->view('pengembang/aplikasi', $data);
		//$this->load->view('cms/footer');
	}

	public function create(){
		$data = array(
			'sesdat'=>$this->whoami->sesdat(),
			//'artikel'=>$this->ArtikelModel->get_artikel(),
		);
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'Judul', 'required', array('required'=>'%s Harus diisi'));
		$this->form_validation->set_rules('isi', 'Isi', 'required', array('required'=>'%s Harus diisi'));
		$this->form_validation->set_rules('artikel_status', 'status', 'required', array('required'=>'%s Harus diisi'));

		if($this->form_validation->run() === FALSE){
			$this->output->set_template('pengembang');
			$this->load->view('pengembang/tambah_aplikasi',$data);
		}
		else{
			$this->DirektoriModel->set_artikel();
      		redirect('pengembang/permainan');
		}

	}

}