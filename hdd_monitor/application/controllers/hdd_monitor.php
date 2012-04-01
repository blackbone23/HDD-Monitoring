<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hdd_monitor extends CI_Controller {


	public function index()
	{
            // echo "Halo duniaa!!!";
            $data['dynamiccontent'] = "form_login";
            $this->load->view('templates/template',$data);
        }
        
        public function fungsibaru() {
            echo "Ini adalah fungsi baru";
        }

        public function aboutus() {
            $about['about'] = "Ini adalah Halaman About Us";
            $this->load->view('viewaboutus',$about);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
