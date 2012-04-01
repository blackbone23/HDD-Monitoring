<?php 

class Site extends CI_Controller {

        public function __construct() {
            parent::__construct();
        }
	public function admin()
	{
	    $this->load->helper('file');
            $data['dynamiccontent'] = "admin";
	    $data['title'] = "admin site";
	    //$data['df'] = exec("php execution.php");
            $this->load->view('templates/template',$data);
        }

        public function is_logged_in() {
            $is_logged_in = $this->session->userdata('is_logged_in');

            if(!isset($is_logged_in) || $is_logged_in != true) {
                redirect('hdd_monitor');
            }
        }
      
}

