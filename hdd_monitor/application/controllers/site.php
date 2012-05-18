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
			'time' => $this->input->post('time'),
			'day' => $this->input->post('day'),
			'month' => $this->input->post('month'),
			'year' => $this->input->post('year')
			);
		$this->modelhddmonitor->tambah_data_disk_status($data);
		redirect('site/admin');
	}

	public function view_statistic_from_IP_raw() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$url = parse_url($_SERVER['REQUEST_URI']);
			parse_str($url['query'], $params);
			$data['IP'] = $params['IP'];
			$data['dynamiccontent'] = "view_statistic";
			$data['title'] = "view statistic";
			$this->load->model("modelhddmonitor");
			$query = $this->modelhddmonitor->view_statistic_from_IP_raw($data['IP']);
			$data['query'] = $query;
			$this->load->view('templates/template',$data);
		} else {
			redirect('hdd_monitor');
		}
		
	}

	public function view_statistic_from_device_raw() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$url = parse_url($_SERVER['REQUEST_URI']);
			parse_str($url['query'], $params);
			$data['IP'] = $params['IP'];
			$data['device'] = $params['device'];
			$data['dynamiccontent'] = "view_statistic";
			$data['title'] = "view statistic";
			$this->load->model("modelhddmonitor");
			$query = $this->modelhddmonitor->view_statistic_from_device_raw($data['IP'], $data['device']);
			$data['query'] = $query;
			$this->load->view('templates/template',$data);
		} else {
			redirect('hdd_monitor');
		}
		
	}
	public function chart() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
	 		$this->view_data = array();
			$decode = urldecode($_SERVER['REQUEST_URI']);
			$url = parse_url($decode);
			parse_str($url['query'], $params);
			$query =$this->db->select('*')->from('hdd_status')->where(array('IP'=> $params['IP'],'month'=>$params['month'],'year'=>$params['year']))->order_by('id_status','desc')->get();
			$cek = $query->result();
			if(empty($cek)) {
				$data['grafik'] = "no";
				$data['view_data'] = $this->view_data;
				$this->load->view("view_charts", $data);
			} else {
				if($params['device'] != "-" && $params['month'] != "-" && $params['year'] != "-") {
					$data['IP'] = $params['IP'];
					$data['device'] = $params['device'];
					$data['month'] = $params['month'];
					$data['year'] = $params['year'];
					$data['grafik'] = "yes";
					$data['view_data'] = $this->view_data;
					$this->load->view("view_charts", $data);
				} elseif ($params['month'] != "-" && $params['year'] != "-") {
					$data['device'] = "all";
					$data['IP'] = $params['IP'];
					$data['month'] = $params['month'];
					$data['year'] = $params['year'];
					$data['grafik'] = "yes";
					$data['view_data'] = $this->view_data;
					$this->load->view("view_charts", $data);
				} else {
					$data['grafik'] = "no";
					$data['view_data'] = $this->view_data;
					$this->load->view("view_charts", $data);
				}
			}
			
		} else {
			redirect('hdd_monitor');
		}
	}
	
	public function add_disk_alert() {
		$this->load->helper('file');
		$this->load->library('email');

		$IP = $this->input->post('IP');
		$device = $this->input->post('device');
		$filetype = $this->input->post('filetype');
		$mount_on = $this->input->post('mount_on');
		$used = ((($this->input->post('used')/1024)/1024)/1024);
		$used_explode = explode(".",$used);
		@$used_explode_2 = substr($used_explode[1], 0, 3);
		$used_to_send = $used_explode[0].".".$used_explode_2." GB";
		$free = ((($this->input->post('free')/1024)/1024)/1024);
		$free_explode = explode(".",$free);
		@$free_explode_2 = substr($free_explode[1], 0, 3);
		$free_to_send = $free_explode[0].".".$free_explode_2." GB";
		$percent = $this->input->post('percent');
		$total = ((($this->input->post('total')/1024)/1024)/1024);
		$total_explode = explode(".",$total);
		@$total_explode_2 = substr($total_explode[1], 0, 3);
		$total_to_send = $total_explode[0].".".$total_explode_2." GB";

		$query = $this->db->select('name, IP, email')->from("user")->get();

		foreach ($query->result() as $row) :
			$list_IP = explode(", ", $row->IP);
			foreach ($list_IP as $IP_check) :
				if($IP_check == $IP) :
					$row->email;
					$this->email->from('rully.lukman@gmail.com', 'Administrator');
					$this->email->to($row->email);

					$this->email->subject('Warning, your server hard disk exceed to 80%');
					$this->email->message("Hello $row->name,\n\nI'm sorry for your inconvenience, but your hard disk resource is exceed to 80% from total capacity. Here's result from our HDD Checker :\n\nIP : $IP\nPartition : $device\nFiletype : $filetype\nMount on : $mount_on\nUsed : $used_to_send\nFree : $free_to_send\nTotal : $total_to_send\nPercent used : $percent%\n\n\nThank you for your attention.\n\nRegards,\n\n\nAdministrator");

					$this->email->send();
					echo $this->email->print_debugger();
				endif;
			endforeach;
		endforeach;
			
	}

	public function view_hdd_status_now() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			if(!$ssh = ssh2_connect('192.168.11.31', 22)){
				echo "Couldn't connect to 192.168.11.31!";
			} else {
				if(!ssh2_auth_password($ssh, 'rully', 'slamdunk')) {
					echo "authentication rejected!";
				} else {
					$data_hdd_now = exec('/home/rully/git/HDD-Monitoring/psutil_disk_usage_json.py');
					echo $data_hdd_now;
				}
			}
			
		} else {
			redirect('hdd_monitor');
		}
	}
	
	public function show_hdd_info() {
		$query_id_user = $this->modelhddmonitor->get_id_user_by_username();
		$id_user = $query_id_user[0]->id_user;
		$data['query_hdd_show'] = $this->modelhddmonitor->show_hdd_user($id_user);
		$data['title'] = "Show HDD - ".$this->session->userdata('username');
		$data['dynamiccontent'] = "view_hdd";
		$this->load->view("templates/template",$data);
		
	}
      
}

