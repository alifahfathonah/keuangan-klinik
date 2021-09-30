<?php
defined('BASEPATH') OR exit ('no directnscript access allowed');

class Akun extends CI_Controller{

    function __construct(){
        parent:: __Construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('modelakun','makun');
    }

    public function index(){
        if(($this->session->userdata('masuk')==TRUE)){
            $querydatabarang = $this->makun->dataakun();
            $data = array('tampil' => $querydatabarang);
            $beranda = array(
                'menu'=> $this->load->view('beranda/menu','',TRUE),
                'judul'=>'',
                'dash'=>'Akun',
                'content'=> $this->load->view('akun/vdataakun',$data,TRUE),
            );
            $this->parser->parse('beranda/template',$beranda);
        }else{
            echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
            redirect('Log')";

        }
    }

    function tambahdata(){
        $d['kode_akun']=$this->kodeakun();
        $a['judul']='';
        $a['dash']='Tambah Data';
        $a['menu']=$this->load->view('beranda/menu','',TRUE);
        $a['content']=$this->load->view('akun/formtambah',$d,TRUE);
        $this->parser->parse('beranda/template',$a);
    }

    public function kodeakun(){
      $this->db->select('RIGHT(kodeakun,2) as kodeakun', FALSE); 
      $this->db->order_by('kodeakun','DESC'); 
      $this->db->limit(1); 
      $query = $this->db->get('akun');  
      if($query->num_rows() <> 0){ 
        $dt = $query->row(); 
        $kode_akun = intval($dt->kodeakun) + 1; 
    }else{ 
        $kode_akun = 1; 
    } 
    $kodemax  = str_pad($kode_akun, 3, "0", STR_PAD_LEFT); 
    $kodejadi = "KDA-".$kodemax;  
    return $kodejadi;
}

function simpan(){
   $querysimpandata = $this->makun->simpandata();
   if($querysimpandata == FALSE) 
   {
    $this->index();
} else {
    $pesan = '<div class="alert alert-success alert-dismissible">'
    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
    . 'Data Berhasil di Simpan'
    . '</div>';
    $this->session->set_flashdata('pesan', $pesan);
    redirect('akun');
}
}

public function edit(){
    $kode = $this->uri->segment(3);
    $queryambildata = $this->makun->ambildata($kode);
    if($queryambildata->num_rows() > 0) {
        $baris = $queryambildata->row_array();
        $data = array(
            'kda'=>$baris['kodeakun'],
            'jna'=>$baris['jenisakun'],
            'nma'=>$baris['namaakun']
        );

        $beranda = array(
            'menu'=> $this->load->view('beranda/menu','',TRUE),
            'judul'=>'',
            'dash'=>'Edit Akun',
            'content'=> $this->load->view('akun/formedit',$data,TRUE)
        );
        $this->parser->parse('beranda/template',$beranda);
    }else{
        exit('Data Tidak Ditemukan');
    }

}

public function update(){
    $kdk = $this->input->post('kdk',TRUE);
    $queryupdatedata = $this->makun->updatedata();
    $pesan = '<div class="alert alert-success alert-dismissible">'
    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
    . 'Data Berhasil di Update'
    . '</div>';
    $this->session->set_flashdata('pesan', $pesan);
    redirect('akun/index/'.$kdb);
}

function hapus($kode){   
    $kode = $this->uri->segment(3);
    $queryhapus = $this->makun->hapusdata($kode);
    if($queryhapus){
        $pesan = '<div class="alert alert-success alert-dismissible">'
    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
    . 'Data Berhasil di Hapus'
    . '</div>';
    $this->session->set_flashdata('pesan', $pesan);
        redirect('akun/index');
    }
}  
}
?>