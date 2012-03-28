<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Modellatihanci2 extends CI_Model {

    function tangkapdb() {
        /*ini query biasa
         * $tangkap = $this->db->query("select * from latihan2");
         */

        /*ini get active record
         * $tangkap = $this->db->get("latihan2");
         */

        /*ini get spesific record
         * $tangkap = $this->db->select("judul,konten")
         * $tangkap = $this->db->get("latihan2")
         */

        /*menggunakan filter
         * $sqlquery = "select judul,konten from latihan2 where id = ? AND judul = ?";
         * $tangkap = $this->db->query($sqlquery,array(2,"judul 2");
         *
         */
        $sqlquery = "select judul,konten from latihan2 where id = ? AND judul = ?";
        $tangkap = $this->db->query($sqlquery,array(2,"judul 2"));
        if ($tangkap->num_rows() > 0) {
            foreach ($tangkap->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
}
?>
