<?php 

class Site extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('modelhddmonitor');
        }
	
		public function admin()
		{
	    	$this->load->helper('file');
            $data['dynamiccontent'] = "admin";
	    	$data['title'] = "admin site";
	    	if($query = $this->modelhddmonitor->ambil_data()) {
            	$data['rowrecord'] = $query;
	        }
            $this->load->view('templates/template',$data);
            
            
        }
		
		public function tambah_data()
		{
			$data = array(
			'content1' => $this->input->post('content1'),
			'content2' => $this->input->post('content2')
			);
			$this->modelhddmonitor->tambah_data($data);
        	redirect('site/admin');
		}
		
        public function is_logged_in() {
            $is_logged_in = $this->session->userdata('is_logged_in');

            if(!isset($is_logged_in) || $is_logged_in != true) {
                redirect('hdd_monitor');
            }
        }
      
}

