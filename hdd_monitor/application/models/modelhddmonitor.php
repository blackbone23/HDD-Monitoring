<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Modelhddmonitor extends CI_Model {

    public function ambil_data() {
        $query = $this->db->get("tester_post");
        return $query->result();
    }

    public function ambil_data_user() {
        $query = $this->db->get("user");
        return $query->result();
    }

    public function ambil_data_hdd_device() {
        $query = $this->db->query("select device,filetype from hdd_device");
        return $query->result();
    }

    public function ambil_data_hdd_status() {
        $query = $this->db->get("hdd_status");
        return $query->result();
    }

    public function tambah_data($data) {
        $hasil = $this->db->insert('tester_post',$data);
        return;
    }

    public function tambah_data_disk_partition($data) {
        $hasil = $this->db->insert('hdd_device',$data);
        return;
    }

    public function tambah_data_disk_status($data) {
        $hasil = $this->db->insert('hdd_status',$data);
        return;
    }

    public function update_data($data) {
        $this->db->where('id',1);
        $this->db->update('latihan2',$data);
    }

    public function delete_row($data) {
    	$this->db->where('id',$data);
    	$this->db->delete('latihan2');
    	return ;
    }

    public function view_statistic_from_IP_raw($data) {
	$query =$this->db->select('*')->from('hdd_status')->where('IP', $data)->order_by('id_status','desc')->get();
	return $query->result();
    }

     public function view_statistic_from_device_raw($IP, $device) {
	$query =$this->db->select('*')->from('hdd_status')->where('IP', $IP)->where('device', $device)->order_by('id_status','desc')->get();
	return $query->result();
    }

    public function view_device() {
        $username = $this->session->userdata('username');
	$id_user_query = $this->modelhddmonitor->get_id_user_by_username();
	$id_user = $id_user_query[0]->id_user;
	$user_query = $this->db->query("select * from user as a, harddisk as b where b.id_user=a.id_user && a.id_user='$id_user'");
	$user = $user_query->result();
	if(!empty($user)) {
	    foreach($user as $row) {
	   	$IP_arr[] = $row->IP;
	    }
	    $sql = $this->db->select("IP")->distinct()->from('hdd_device')->where_in('IP', $IP_arr)->get();
	    $query = $sql->result();
	} else {
	    $query = "no_query";
	}
	return $query;
    }

    public function get_id_user_by_username() {
	$username = $this->session->userdata('username');
	$user = $this->db->query("select id_user from user where username = '$username'");
	return $user->result();
    }
    public function show_hdd_user_by_id_user($id_user) {
	$hdd_show = $this->db->query("select * from harddisk where id_user = '$id_user'");
	return $hdd_show->result();
    }
    
    public function show_hdd_user_by_IP($IP) {
	$hdd_show = $this->db->query("select * from harddisk where IP = '$IP'");
	return $hdd_show->result();
    }

    public function update_hdd_settings($data) {
	$username = $data['username'];
       	$this->db->where('id_harddisk',$data['id_harddisk']);
        $this->db->update('harddisk',$data);
    	return ;
    }

    public function delete_hdd($data) {
	$this->db->where('IP',$data);
    	$this->db->delete('harddisk');
    	return ;
    }

    public function add_hdd($data) {
	$hasil = $this->db->insert('harddisk',$data);
        return;
    }

    public function get_hdd_by_IP($data) {
	$hdd = $this->db->query("select * from harddisk where IP = '$data'");
	return $hdd->result();
    }

    public function get_user_type() {
	$username = $this->session->userdata('username');
	$query = $this->db->query("select user_type from user where username = '$username'");
	return $query->result();
    }

    public function add_new_user($data) {
	$hasil = $this->db->insert('user',$data);
        return;
    }
    
    public function get_user_by_id($data) {
	$query = $this->db->query("select * from user where id_user = '$data'");
	return $query->result();
    }

    public function get_IP_hdd() {
	$query = $this->db->query("select IP from harddisk");
	return $query->result();
    }
}
?>
