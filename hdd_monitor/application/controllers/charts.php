<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends CI_Controller {

        public function Charts() {
		parent::__construct();
 		$this->view_data = array();
	}
	public function index()
	{
	    $this->load->view("view_charts", $this->view_data);
        }
        
}

