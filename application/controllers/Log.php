<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class log extends CI_Controller {
public function __construct(){
    parent:: __construct();
    $this->load->model("Login");
}
	public function index(){
		$this->load->view("login/home");
	}
    public function masuk(){
        $user = strip_tags(str_replace("'","", $this->input->post('un',true)));
        $pass = strip_tags(str_replace("'","", $this->input->post('psw',true)));
        $cekakun = $this->Login->in($user,$pass);
        
            if(strlen($user)==''|| strlen($pass)==''){
                $this->session->set_flashdata('msg','Username dan Password tidak boleh kosong !!');
                $url=base_url();
                redirect($url);
            }else{
                if($cekakun->num_rows() > 0){
                    $rcekakun = $cekakun->row_array();
                    $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('status_login','oke');
                    $this->session->set_userdata('user',$rcekakun['username']);
                    $this->session->set_userdata('nama',$rcekakun['namalengkap']);
                    $this->session->set_userdata('akses',$rcekakun['hakakses']);
                    $this->session->set_userdata('ft',$rcekakun['foto']);
                }else{
                    $this->session->set_userdata('masuk',FALSE);
                }
            }
        if($this->session->userdata('masuk')==TRUE){
            $user = $this->session->userdata('user');
            redirect('Home/index');
        }else{
            $this->session->set_flashdata('msg','Periksa kembali Username dan Password anda');
            $url=base_url();
            redirect($url);
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        $url=base_url();
        redirect($url);
    }
}
?>