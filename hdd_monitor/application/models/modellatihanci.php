<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Modellatihanci extends CI_Model {

    function tangkapdb() {
        $tangkap = $this->db->get('latihan');

        if ($tangkap->num_rows > 0) {
            foreach ($tangkap->result()as $row){
                $data[] = $row;
            }
            return $data;
        }
    }
}
?>
