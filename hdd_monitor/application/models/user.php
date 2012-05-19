<?php
class User extends CI_Model {

    public function __construct() {
	parent::__construct();
	$this->load->library('session');
    }

    public function validasi() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));

        $ambil = $this->db->get('user');

        if($ambil->num_rows == 1) {
            return true;
        }
    }

    public function get_user() {
        $username = $this->session->userdata('username');
        $query = $this->db->query("select * from user where username = '$username'");
        return $query->result();
    }

    public function update_user($data) {
	$username = $data['username'];
       	$this->db->where('id_user',$data['id_user']);
        $this->db->update('user',$data);
	$session = array(
            'username' => $username,
            'is_logged_in' => true
        );
        $this->session->set_userdata($session);
    	return ;
    }

    public function get_all_user() {
	$query = $this->db->query("select * from user");
	return $query->result();
    }
}

?>
