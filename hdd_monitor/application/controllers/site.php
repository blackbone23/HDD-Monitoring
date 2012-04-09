<?php 

class Site extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('modelhddmonitor');
        }
	
	public function admin() {
		$data['dynamiccontent'] = "admin";
		$data['title'] = "admin site";
		if($query = $this->modelhddmonitor->ambil_data_hdd_device()) {
			$data['rowrecord'] = $query;
		}
		$this->load->view('templates/template',$data);
            
            
        }
		
	 public function tambah_data() {
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

	public function add_disk_partition() {
		
		$data = array(
			'IP' => $this->input->post('IP'),
			'device' => $this->input->post('device'),
			'filetype' => $this->input->post('filetype'),
			'mount_on' => $this->input->post('mount_on'),
			);
		$this->modelhddmonitor->tambah_data_disk_partition($data);
		redirect('site/admin');
	}

	public function add_disk_status() {
		
		$data = array(
			'IP' => $this->input->post('IP'),
			'device' => $this->input->post('device'),
			'filetype' => $this->input->post('filetype'),
			'mount_on' => $this->input->post('mount_on'),
			'used' => $this->input->post('used'),
			'free' => $this->input->post('free'),
			'percent' => $this->input->post('percent'),
			'total' => $this->input->post('total')
			);
		$this->modelhddmonitor->tambah_data_disk_status($data);
		redirect('site/admin');
	}
      
}

