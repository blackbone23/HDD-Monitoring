<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Latihan5crudci extends CI_Controller {
	
	function __construct() {
		parent::__construct();
// 		$this->load->library('form_validation');
	}

    function index() {
           
    	   echo "Haloo";
//         if($query = $this->modellatihancrudci->ambil_data()) {
//             $data['rowrecord'] = $query;
//         }
//         $this->load->view("viewlatihancrudci",$data);
    }

    function tambahdata() {
//         echo "halo";
        $data = array('judul' => $this->input->post('judul') ,
                      'konten' => $this->input->post('konten'));
        $this->modellatihancrudci->tambah_data($data);
        redirect('latihan5crudci');
      
    }

    function hapusdata() {
        echo "halo";
        $id = $_GET['id'];
        echo $id;
        $this->modellatihancrudci->delete_row($id);
//         $this->index();
		redirect('latihan5crudci');
    }

    function update() {

        $data = array(
            'judul' => 'judul baru diupdate tiga kali!',
            'konten' => 'konten baru diupdate tiga kali'
        );
        $this->modellatihancrudci->update_data($data);
        $this->index();


    }


}
?>
