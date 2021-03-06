<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Direktori extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  	function __construct()
	{
	parent::__construct();
	$this->load->helper(array('url_helper', 'form', 'url'));
    $this->load->library(array('form_validation','session','Whoami'));
    $this->load->model(array('LoginModel', 'DirektoriModel'));
	$this->_init();
	}

	private function _init()
	{
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
	date_default_timezone_set('Asia/Jakarta');
     $this->load->css('assets/libraries/bootstrap/bootstrap.min.css');
	 $this->load->css('assets/libraries/style.css');
	    // $this->load->css('assets/libraries/owl-carousel/owl.theme.css');
	 $this->load->css('assets/libraries/flexslider/flexslider.css');
	 $this->load->css('assets/libraries/fonts/font-awesome.min.css');
	 $this->load->css('assets/css/components.css');
	    // $this->load->js('assets/libraries/jquery.animateNumber.min.js');
	 $this->load->js('assets/libraries/jquery.min.js');
	 $this->load->js('assets/libraries/flexslider/jquery.flexslider-min.js');
	    //$this->load->js('assets/dist/js/app.min.js');
	 $this->load->js('assets/js/functions.js');
	 $this->load->js('assets/js');
	}

	  
 	//check status
	// private function WhoI(){
	// 	if($this->session->userdata('logged_in')['role'] != NULL){

	// 		redirect('home');
	// 	}else{
	// 		redirect('home');
	// 	}
	// }

	function isLogged(){
		if($this->session->userdata('logged_in')){
			return true;
		}else{
			return false;
		}
	}

	// <link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
 //    <script src="libraries/jquery.min.js"></script>
 //    <script src="js/rating-input.min.js" type="text/javascript"></script>
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data = 
			array(
				'selected'=>array('parent'=>'','child'=>'',),
			);

		$this->load->css('assets/libraries/owl-carousel/owl.carousel.css');
		$this->load->css('assets/libraries/owl-carousel/owl.theme.css');
		$this->load->css('assets/css/media.css');
		$this->load->js('assets/libraries/owl-carousel/owl.carousel.min.js');
		$this->load->js('assets/libraries/expanding-search/modernizr.custom.js');
		$this->load->js('assets/libraries/expanding-search/classie.js');
		$this->load->js('assets/libraries/expanding-search/uisearch.js');
		$this->load->js('assets/libraries/jssor.js');
		$this->load->js('assets/libraries/jssor.slider.min.js');
		$this->load->js('assets/libraries/jquery.marquee.js');
		$this->output->set_template('home');
		$this->output->set_title('IGRS');
 
		$data['direktori'] = $this->DirektoriModel->get_direktori();
		$data['populer'] = $this->DirektoriModel->get_direktori_popular();
		$this->load->view('direktori', $data);

	}

	public function view_direktori($slug = NULL)
	{

		// $data = 
		// 	array(
		// 		'selected'=>'',
		// 	);	
		$this->load->css('assets/libraries/owl-carousel/owl.carousel.css');
		$this->load->css('assets/libraries/owl-carousel/owl.theme.css');
		$this->load->css('assets/css/media.css');
		$this->load->js('assets/libraries/owl-carousel/owl.carousel.min.js');
		$this->load->js('assets/libraries/expanding-search/modernizr.custom.js');
		$this->load->js('assets/libraries/expanding-search/classie.js');
		$this->load->js('assets/libraries/expanding-search/uisearch.js');
		$this->load->js('assets/libraries/jssor.js');
		$this->load->js('assets/libraries/jssor.slider.min.js');
		$this->load->js('assets/libraries/jquery.marquee.js');
		$this->output->set_template('home2');
		$this->output->set_title('IGRS - Indonesian Game Rating System');

	    $direktori = $this->DirektoriModel->get_direktori($slug);
	    $data['direktori_item'] = $direktori;
	    $cek = $this->DirektoriModel->cek_bintang($slug);
	    $data['cek_item'] = $cek;
	    // $id = $data['artikel_item']['id_artikel'];
	    // $komentar = $this->ArtikelModel->get_komentar($id);
	    // $data['komentar_item'] = $komentar;
	    
	    $data =array(
	    	'cek_item'=>$cek,
	    	'direktori_item'=>$direktori,
	    	'action'=>'direktori/bintang/'.$slug,
	    	'selected'=>array('parent'=>'',),
	    	//'komentar_item'=>$komentar,
	    	'sesdat'=>$this->whoami->sesdat(),
	    	);
	    //die(print_r($artikel['artikel_kategori']));
	    $genre = $direktori['genre'];
	    $id = $direktori['no_aplikasi'];
	    $data['terkait'] = $this->DirektoriModel->get_direktori_related($genre, $id);
	    $this->load->view('detail_aplikasi', $data);
	}

	public function bintang($slug = NULL){

	    $direktori = $this->DirektoriModel->get_direktori($slug);
	    $data['direktori_item'] = $direktori;
		$data = array(
			'artikel_item'=>$direktori,
			'sesdat'=>$this->whoami->sesdat(),
			'selected'=>'',
			'action'=>'',
			);
		$sesdat = $this->whoami->sesdat() ;
		$this->output->set_template('home1');
		$this->form_validation->set_rules('bintang','Rating','trim|required');
		if($this->form_validation->run() == false){
			echo "error";
			// die();
			$this->load->view('detail_aplikasi',$data);
		}else{
			//echo "bisa";
			$this->DirektoriModel->bintang();
			redirect('direktori/'.$slug);
		}
	}
}
