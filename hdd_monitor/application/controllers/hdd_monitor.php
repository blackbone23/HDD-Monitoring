<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hdd_monitor extends CI_Controller {

        public function __construct() {
		parent::__construct();
 		$this->load->library('session');
	}
	public function index()
	{
            // echo "Halo duniaa!!!";
            $data['dynamiccontent'] = "form_login";
	    $data['title'] = "Hardisk Monitoring";
            $this->load->view('templates/template',$data);
        }
        
        public function validate_login() {
            $this->load->model('user');
            $query = $this->user->validasi();
            if($query) {
                $session = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => true
                );
                $this->session->set_userdata($session);
                redirect('site/admin');
            }
            else {
                redirect('hdd_monitor');
            }
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
