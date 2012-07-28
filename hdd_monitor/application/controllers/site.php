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
			$query_user_type = $this->modelhddmonitor->get_user_type();
			$data['user_type'] = $query_user_type[0]->user_type;
			$data['query'] = $this->modelhddmonitor->view_device();
			$this->load->view('templates/template',$data);
		} else {
			redirect('hdd_monitor');
		}
        }
	
	public function user() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$this->load->model("user");
			$data['title'] = "User settings HDD - ".$this->session->userdata('username');
			$data['dynamiccontent'] = "view_user";
			$query_user_type = $this->modelhddmonitor->get_user_type();
			$data['user_type'] = $query_user_type[0]->user_type;
			$data['user_all'] = $this->user->get_all_user();
			$this->load->view("templates/template",$data);
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
		//echo "disini script untuk edit account";
		$new_username = $this->input->post('new_username');
		$new_password = $this->input->post('new_password');
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
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
		if(preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/",$data['email'],$matches)):
			$this->load->model('user');
			$this->user->update_user($data);
			redirect('site/edit_person_info?edit_person=success');
		else : 
			redirect('site/edit_person_info?email_valid=false');
		endif;
		
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
				if ($params['month'] != "-" && $params['year'] != "-") {
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
		$used = ((($this->input->post('used')/1000)/1000)/1000);
		$used_explode = explode(".",$used);
		@$used_explode_2 = substr($used_explode[1], 0, 3);
		$used_to_send = $used_explode[0].".".$used_explode_2." GB";
		$free = ((($this->input->post('free')/1000)/1000)/1000);
		$free_explode = explode(".",$free);
		@$free_explode_2 = substr($free_explode[1], 0, 3);
		$free_to_send = $free_explode[0].".".$free_explode_2." GB";
		$percent = $this->input->post('percent');
		$total = ((($this->input->post('total')/1000)/1000)/1000);
		$total_explode = explode(".",$total);
		@$total_explode_2 = substr($total_explode[1], 0, 3);
		$total_to_send = $total_explode[0].".".$total_explode_2." GB";

		$query = $this->db->query('select * from user as a, harddisk as b where a.id_user = b.id_user');

		$email_sender = "rully.lukman@gmail.com";
		$user_sender = "Administrator";
		$email_subject = "Warning, your server hard disk exceed to 80%";
		$email_message = "Hello $row->name,\n\nI'm sorry for your inconvenience, but your hard disk resource is exceed to 80% from total capacity. Here's result from our HDD Checker :\n\nIP : $IP\nPartition : $device\nFiletype : $filetype\nMount on : $mount_on\nUsed : $used_to_send\nFree : $free_to_send\nTotal : $total_to_send\nPercent used : $percent%\n\n\nThank you for your attention.\n\nRegards,\n\n\nAdministrator";

		foreach ($query->result() as $row) : 
			$list_IP = $row->IP;
			
				if($list_IP == $IP) :
					$row->email;
					$this->email->from($email_sender, $user_sender);
					$this->email->to($row->email);

					$this->email->subject($email_subject);
					$this->email->message($email_message);

					$this->email->send();
					echo $this->email->print_debugger();
				endif;
			
		endforeach;
			
	}
	
	public function view_hdd_status_now() {
		$query_id_user = $this->modelhddmonitor->get_id_user_by_username();
		$id_user = $query_id_user[0]->id_user;
		$data['query_hdd_show'] = $this->modelhddmonitor->show_hdd_user_by_id_user($id_user);
		$data['title'] = "Show HDD - ".$this->session->userdata('username');
		$data['dynamiccontent'] = "view_hdd_status";
		$this->load->view("templates/template",$data);
	}

	public function view_hdd_status() {
		$this->load->helper('file');
		$this->load->library('email');
		$this->load->model('user');
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			parse_str($_SERVER['QUERY_STRING'], $_GET);
			$IP = $_GET['IP'];
			$hdd_query = $this->modelhddmonitor->get_hdd_by_IP($IP);
			$hdd = $hdd_query[0];
			$data['IP'] = $hdd->IP;
			$data['username'] = $hdd->username_hdd;
			if(!$ssh = ssh2_connect($data['IP'], 22)){
				echo "Couldn't connect to ".$data['IP']."!";
			} else {
				if(!ssh2_auth_password($ssh, $data['username'], $hdd->password_hdd)) {
					echo "authentication rejected!";
				} else {
					$data_hdd = exec('/home/'.$data['username'].'/git/HDD-Monitoring/psutil_disk_usage_json.py');
					$data['data_hdd'] = json_decode($data_hdd);
					$data['title'] = "View HDD statistic now - ".$this->session->userdata('username');
					$data['dynamiccontent'] = "view_hdd_status_now";
					$row = $data['data_hdd'][0];
					$user_data = $this->user->get_user();
					$used = ((($row->used)/1000)/1000)/1000;
					$free = ((($row->free)/1000)/1000)/1000;
					$total = ((($row->total)/1000)/1000)/1000;
					$message= "Hello $username,\n\nHere's result for your hard disk statistic from our HDD Checker :\n\nIP : $IP\nPartition : $row->device\nFiletype : $row->filetype\nMount on : $row->mount_on\nUsed : $used GB\nFree : $free\nTotal : $total\nPercent used : $row->percent%\n\n\nThank you for your attention.\n\nRegards,\n\n\nAdministrator";
					$email_sender = "rully.lukman@gmail.com";
					$user_sender = "Administrator";
					$email_subject = "Statistic for your harddisk now";

					$this->email->from($email_sender, $user_sender);
					$this->email->to($user_data[0]->email);

					$this->email->subject($email_subject);
					$this->email->message($message);

					$this->email->send();
					//echo $this->email->print_debugger();

					$this->load->view("templates/template",$data);
				}
			}
			
		} else {
			redirect('hdd_monitor');
		}
	}
	
	public function show_hdd_info() {
		$query_id_user = $this->modelhddmonitor->get_id_user_by_username();
		$id_user = $query_id_user[0]->id_user;
		$data['query_hdd_show'] = $this->modelhddmonitor->show_hdd_user_by_id_user($id_user);
		$data['title'] = "Show HDD - ".$this->session->userdata('username');
		$data['dynamiccontent'] = "view_hdd";
		$this->load->view("templates/template",$data);
		
	}
     	
	public function edit_hdd_info() {
		parse_str($_SERVER['QUERY_STRING'], $_GET);
		$IP = $_GET['IP'];
		$query_hdd_show = $this->modelhddmonitor->show_hdd_user_by_IP($IP);
		$data['query_hdd_edit'] = $query_hdd_show[0];
		$data['title'] = "Edit HDD - ".$this->session->userdata('username');
		$data['dynamiccontent'] = "edit_hdd";
		$this->load->view("templates/template",$data);
	}

	public function edit_hdd() {
		$new_username = $this->input->post('new_hdd_username');
		$new_password = $this->input->post('new_hdd_password');
		$data = array(
			'id_harddisk' => $this->input->post('id_harddisk'),
			'id_user' => $this->input->post('id_user'),
			'IP' => $this->input->post('IP'),
			'username_hdd' => $this->input->post('username_hdd'),
			'password_hdd' => $this->input->post('password_hdd')
		);
		$current_IP = $this->input->post('current_IP');
		if (!empty($new_username) && !empty($new_password)) {
			$data['username_hdd'] = $new_username;
			$data['password_hdd'] = $new_password;
		} else if (!empty($new_username)) {
			$data['username_hdd'] = $new_username;
		} else if (!empty($new_password)) {
			$data['password_hdd'] = $new_password;
		} else if($current_IP != $data['IP']){
		} else {
			redirect("site/edit_hdd_info?IP=".$data['IP']."&status=no_update");
		}
		$this->modelhddmonitor->update_hdd_settings($data);
		redirect("site/edit_hdd_info?IP=".$data['IP']."&status=complete");
        }
	
	public function delete_hdd() {
		parse_str($_SERVER['QUERY_STRING'], $_GET);
		$IP = $_GET['IP'];
		$this->modelhddmonitor->delete_hdd($IP);
		redirect("site/show_hdd_info");
	}

  	public function add_new_hdd() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$query_id_user = $this->modelhddmonitor->get_id_user_by_username();
			$data['id_user'] = $query_id_user[0]->id_user;
			$data['title'] = "Add new HDD - ".$this->session->userdata('username');
			$data['dynamiccontent'] = "add_new_hdd";
			$this->load->view("templates/template",$data);
		} else {
			redirect('hdd_monitor');
		}
	}

	public function add_hdd() {
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'IP' => $this->input->post('IP'),
			'username_hdd' => $this->input->post('username_hdd'),
			'password_hdd' => $this->input->post('password_hdd')
		);
		$IP_list = $this->modelhddmonitor->get_IP_hdd();
		if(empty($data['IP'])) {redirect("site/add_new_hdd?status=no_IP");}
		elseif(empty($data['username_hdd'])) {redirect("site/add_new_hdd?status=no_username");}
		elseif(empty($data['password_hdd'])) {redirect("site/add_new_hdd?status=no_password");}
		foreach($IP_list as $row) { 
			if($row->IP == $data['IP']) { echo "duplikat IP";
				redirect("site/add_new_hdd?status=duplicate_IP");
			}
		}
		$this->modelhddmonitor->add_hdd($data);
		redirect("site/add_new_hdd?status=complete");
	}
	
	public function add_user() {
		$username = $this->session->userdata('username');
		if (!empty($username)) {
			$data['title'] = "Add new user";
			$data['dynamiccontent'] = "add_new_user";
			$this->load->view("templates/template",$data);
		} else {
			redirect('hdd_monitor');
		}
		
	}

	public function add_account() {
		$this->load->model('user');
		$data = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'user_type' => '2'
		);
		$new_user = $this->input->post('username');
		if(empty($data['username']) && empty($data['password'])) {redirect("site/add_user?status=not_complete");}
		$user = $this->user->get_all_user();
		foreach($user as $row) {
			if($row->username == $data['username']) {
				redirect("site/add_user?status=duplicate&user=$new_user");
			}
		}
		if(preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/",$data['email'],$matches)):
			$this->modelhddmonitor->add_new_user($data);
			redirect("site/add_user?status=complete&user=$new_user");
		else: 
			redirect('site/add_user?email_valid=false');
		endif;
	}

	public function edit_user_type() {
		$data['title'] = "Edit user type";
		$data['dynamiccontent'] = "edit_user_type";
		if(isset($_GET['id_user'])) {@$id_user = $_GET['id_user'];}
		$data['user'] = $this->modelhddmonitor->get_user_by_id($id_user);
		$this->load->view("templates/template",$data);
		
	}

	public function edit_user_type_proc() {
		$new_username = $this->input->post('new_username');
		$new_password = $this->input->post('new_password');
      		$data = array(
			'id_user' => $this->input->post('id_user'),
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'user_type' => $this->input->post('user_type')
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
		if($data['user_type'] == 'user') {$data['user_type'] = "2";}
		else {$data['user_type'] = "1";}
		var_dump($data);
		$this->load->model('user');
		$this->user->update_user_type($data);
		redirect("site/edit_user_type?id_user=".$data['id_user']."&status=complete");
	}

	public function delete_user() {
		$this->load->model('user');
		$id_user = $_GET['id_user'];
		$this->user->delete_user($id_user);
		redirect("site/user?status=complete");
        }
}

