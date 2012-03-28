<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Latihan2ci extends CI_Controller {

    function index() {

        $this->load->model("modellatihanci2");
        $hasil['data'] = $this->modellatihanci2->tangkapdb();
        $this->load->view("viewlatihan2ci", $hasil);

    }
}
?>
