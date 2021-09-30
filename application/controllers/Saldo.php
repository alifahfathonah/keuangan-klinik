<?php
defined('BASEPATH') OR exit ('no directnscript access allowed');

class Saldo extends CI_Controller{

    function __construct(){
        parent:: __Construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('modelsaldo','msaldo');
    }

    public function index(){
        if(($this->session->userdata('masuk')==TRUE)){
            $querydatabarang = $this->msaldo->datasaldo();
            $data = array('tampil' => $querydatabarang);
            $beranda = array(
                'menu'=> $this->load->view('beranda/menu','',TRUE),
                'judul'=>'',
                'dash'=>'Saldo',
                'content'=> $this->load->view('saldo/vdatasaldo',$data,TRUE),
            );
            $this->parser->parse('beranda/template',$beranda);
        }else{
            echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
            redirect('Log')";

        }
    }


    function tambahdata1(){
        $d['kode_saldo']=$this->kodesaldo();
        $a['judul']='';
        $a['dash']='Tambah Saldo';
        $a['menu']=$this->load->view('beranda/menu','',TRUE);
        $a['content']=$this->load->view('saldo/formtambah',$d,TRUE);
        $this->parser->parse('beranda/template',$a);
    }

   function tambahdata(){

  $queryambildata = $this->msaldo->data();
  if($queryambildata->num_rows() > 0) {
    $baris = $queryambildata->row_array();
    $data = array(
        'kode_saldo'=>$this->kodesaldo(),
        'sdak'=>$baris['saldoakhir']
    );

    $beranda = array(
        'menu'=> $this->load->view('beranda/menu','',TRUE),
        'judul'=>'',
        'dash'=>'Tambah Saldo',
        'content'=> $this->load->view('saldo/formtambah',$data,TRUE)
    );
    $this->parser->parse('beranda/template',$beranda);
}else{
    $baris = $queryambildata->row_array();
    $data = array(
        'kode_saldo'=>$this->kodesaldo(),
        'sdak'=>$baris['saldoakhir']
    );

    $beranda = array(
        'menu'=> $this->load->view('beranda/menu','',TRUE),
        'judul'=>'',
        'dash'=>'Tambah Saldo',
        'content'=> $this->load->view('saldo/formtambah',$data,TRUE)
    );
    $this->parser->parse('beranda/template',$beranda);
}
}

public function kodesaldo(){
      $this->db->select('RIGHT(kodesaldo,2) as kodesaldo', FALSE); 
      $this->db->order_by('kodesaldo','DESC'); 
      $this->db->limit(1); 
      $query = $this->db->get('saldo');  
      if($query->num_rows() <> 0){ 
        $dt = $query->row(); 
        $kode_akun = intval($dt->kodesaldo) + 1; 
    }else{ 
        $kode_akun = 1; 
    } 
    $kodemax  = str_pad($kode_akun, 3, "0", STR_PAD_LEFT); 
    $kodejadi = "SAL-".$kodemax;  
    return $kodejadi;
}

function simpan(){
 $querysimpandata = $this->msaldo->simpandata();
 if($querysimpandata == FALSE) 
 {
    $this->index();
} else {
    $pesan = '<div class="alert alert-success alert-dismissible">'
    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
    . 'Data Berhasil di Simpan'
    . '</div>';
    $this->session->set_flashdata('pesan', $pesan);
    redirect('saldo');
}
}

public function edit(){
    $kode = $this->uri->segment(3);
    $queryambildata = $this->msaldo->ambildata($kode);
    if($queryambildata->num_rows() > 0) {
        $baris = $queryambildata->row_array();
        $data = array(
            'kda'=>$baris['kodesaldo'],
            'jna'=>$baris['jenissaldo'],
            'nma'=>$baris['namasaldo']
        );

        $beranda = array(
            'menu'=> $this->load->view('beranda/menu','',TRUE),
            'judul'=>'',
            'dash'=>'Edit Saldo',
            'content'=> $this->load->view('saldo/formedit',$data,TRUE)
        );
        $this->parser->parse('beranda/template',$beranda);
    }else{
        exit('Data Tidak Ditemukan');
    }

}

public function update(){
    $kdk = $this->input->post('kdk',TRUE);
    $queryupdatedata = $this->msaldo->updatedata();
    $pesan = '<div class="alert alert-success alert-dismissible">'
    . '<button type="button" class="close" data-dismiss="alert" 
    aria-hidden="true">&times;</button>'
    . 'Data Berhasil di Update'
    . '</div>';
    $this->session->set_flashdata('pesan', $pesan);
    redirect('saldo/index/'.$kdb);
}

function hapus($kode){   
    $kode = $this->uri->segment(3);
    $queryhapus = $this->msaldo->hapusdata($kode);
    if($queryhapus){
        $pesan = '<div class="alert alert-success alert-dismissible">'
        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
        . 'Data Berhasil di Hapus'
        . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('saldo/index');
    }
}  
}
?>