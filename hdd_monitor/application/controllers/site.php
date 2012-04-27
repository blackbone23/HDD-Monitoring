<?php 

class Site extends CI_Controller {

        public function __construct() {
            	parent::__construct();
            	$this->load->model('modelhddmonitor');
        }
	
	public function admin() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data['dynamiccontent'] = "admin";
			$data['title'] = "Welcome - $username";
			$this->load->model("modelhddmonitor");
			$query = $this->modelhddmonitor->view_device();
			$data['query'] = $query;
			$this->load->view('templates/template',$data);
		} else {
			redirect('hdd_monitor');
		}
        }

	public function logout() {
		$this->session->unset_userdata('username');
		redirect('hdd_monitor');
	}
	
	public function edit_person_info() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data['title'] = "Edit Account - ".$this->session->userdata('username');
	      		$data['dynamiccontent'] = "edit_person";
			$this->load->model('user');
			$query = $this->user->get_user();
			$data['user'] = $query;
			$this->load->view('templates/template',$data);
		} else {
			redirect('hdd_monitor');
		}
	}

        public function edit_account() {
		echo "disini script untuk edit account";
		$new_username = $this->input->post('new_username');
		$new_password = $this->input->post('new_password');
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'IP' => $this->input->post('IP'),
			'email' => $this->input->post('email')
		);

		if (!empty($new_username) && !empty($new_password)) {
			$data['username'] = $new_username;
			$data['password'] = $new_password;
		} else if (!empty($new_username)) {
			$data['username'] = $new_username;
		} else if (!empty($new_password)) {
			$data['password'] = $new_password;
		} else {
			
		}
		$this->load->model('user');
		$this->user->update_user($data);
		redirect('site/edit_person_info');
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
			'total' => $this->input->post('total'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time')
			);
		$this->modelhddmonitor->tambah_data_disk_status($data);
		redirect('site/admin');
	}

	public function view_statistic_from_IP_raw() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$IP = $_GET['IP'];
			$data['IP'] = $IP;
			$data['dynamiccontent'] = "view_statistic";
			$data['title'] = "view statistic";
			$this->load->model("modelhddmonitor");
			$query = $this->modelhddmonitor->view_statistic_from_IP_raw($IP);
			$data['query'] = $query;
			$this->load->view('templates/template',$data);
		} else {
			redirect('hdd_monitor');
		}
		
	}

	public function view_statistic_from_device_raw() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$IP = $_GET['IP'];
			$device = $_GET['device'];
			$data['IP'] = $IP;
			$data['dynamiccontent'] = "view_statistic";
			$data['title'] = "view statistic";
			$this->load->model("modelhddmonitor");
			$query = $this->modelhddmonitor->view_statistic_from_device_raw($IP, $device);
			$data['query'] = $query;
			$this->load->view('templates/template',$data);
		} else {
			redirect('hdd_monitor');
		}
		
	}
      
}

