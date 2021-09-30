<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('Modelpendapatan','mpendapatan');
        $this->load->model('Modelpengeluaran','mpengeluaran');
        $this->load->model('modelsaldo','msaldo');
    }

    public function index(){
       if(($this->session->userdata('masuk')==TRUE) && ($this->session->userdata('akses')==1) || ($this->session->userdata('akses')==2)|| ($this->session->userdata('akses')==3)){
          $d['tampil1']=$this->mpendapatan->data();
          $d['tampil2']=$this->mpengeluaran->datapengeluaran();
          $d['tampil3']=$this->msaldo->datasaldo();
          $a['judul'] ='';
          $a['dash']='Home';
          $a['menu']  =$this->load->view('beranda/menu','',TRUE);
          $a['content']=$this->load->view('beranda/beranda',$d,TRUE);
        $this->parser->parse('beranda/template',$a);
          
      }else{
        echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
        redirect(Log)";
    }
}
}
?>