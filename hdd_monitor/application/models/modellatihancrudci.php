<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Modellatihancrudci extends CI_Model {

    function ambil_data() {
        $query = $this->db->get("latihan2");
        return $query->result();
    }

    function tambah_data($data) {
        $this->db->insert('latihan2',$data);
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
