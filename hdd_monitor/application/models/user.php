<?php
class User extends CI_Model {

    public function validasi() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));

        $ambil = $this->db->get('user');

        if($ambil->num_rows == 1) {
            return true;
        }
    }
}

?>
