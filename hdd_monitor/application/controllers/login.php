<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Login extends CI_Controller {

    function index() {
        $data['dynamiccontent'] = "form_login";
        $this->load->view('templates/template',$data);
    }
}
?>
