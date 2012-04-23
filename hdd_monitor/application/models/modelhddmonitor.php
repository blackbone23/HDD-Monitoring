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
}
?>
