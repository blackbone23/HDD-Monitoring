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

    function tambah_data($data) {
        $hasil = $this->db->insert('tester_post',$data);
        return;
    }

    function tambah_data_disk_partition($data) {
        $hasil = $this->db->insert('hdd_device',$data);
        return;
    }

    function tambah_data_disk_status($data) {
        $hasil = $this->db->insert('hdd_status',$data);
        return;
    }

    function update_data($data) {
        $this->db->where('id',1);
        $this->db->update('latihan2',$data);
    }

    function delete_row($data) {
//     	echo $data;
    	$this->db->where('id',$data);
    	$this->db->delete('latihan2');
    	return ;
    }
}
?>
