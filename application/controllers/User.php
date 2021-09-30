<?php
defined('BASEPATH') OR exit ('no directnscript access allowed');

class User extends CI_Controller{

    function __construct(){
        parent:: __Construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('modeluser','muser');
    }

    public function index(){
        if(($this->session->userdata('masuk')==TRUE)){
            $querydatabarang = $this->muser->datauser();
            $data = array('tampil' => $querydatabarang);
            $beranda = array(
                'menu'=> $this->load->view('beranda/menu','',TRUE),
                'judul'=>'',
                'dash'=>'User',
                'content'=> $this->load->view('user/vdatauser',$data,TRUE),
            );
            $this->parser->parse('beranda/template',$beranda);
        }else{
            echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
            redirect('Log')";

        }
    }

    function tambahdata(){
        $d['kode_user']=$this->kodeuser();
        $a['judul']='';
        $a['dash']='Tambah User';
        $a['menu']=$this->load->view('beranda/menu','',TRUE);
        $a['content']=$this->load->view('user/formtambah',$d,TRUE);
        $this->parser->parse('beranda/template',$a);
    }

    public function kodeuser(){
      $this->db->select('RIGHT(username,2) as username', FALSE); 
      $this->db->order_by('username','DESC'); 
      $this->db->limit(1); 
      $query = $this->db->get('user');  
      if($query->num_rows() <> 0){ 
        $dt = $query->row(); 
        $kode_user = intval($dt->username) + 1; 
    }else{ 
        $kode_user = 1; 
    } 
    $kodemax  = str_pad($kode_user, 3, "0", STR_PAD_LEFT); 
    $kodejadi = "USR-".$kodemax;  
    return $kodejadi;
}

function simpan(){
   $querysimpandata = $this->muser->simpandata();
   if($querysimpandata == FALSE) 
   {
    $this->index();
} else {
    $pesan = '<div class="alert alert-success alert-dismissible">'
    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
    . 'Data Berhasil di Simpan'
    . '</div>';
    $this->session->set_flashdata('pesan', $pesan);
    redirect('user');
}
}

public function edit(){
    $kode = $this->uri->segment(3);
    $queryambildata = $this->muser->ambildata($kode);
    if($queryambildata->num_rows() > 0) {
        $baris = $queryambildata->row_array();
        $data = array(
            'usen'=>$baris['username'],
            'nmal'=>$baris['namalengkap'],
            'telp'=>$baris['notelp'],
            'ps'=>$baris['password'],
            'mail'=>$baris['email'],
            'hak'=>$baris['hakakses']
        );

        $beranda = array(
            'menu'=> $this->load->view('beranda/menu','',TRUE),
            'judul'=>'',
            'dash'=>'Edit User',
            'content'=> $this->load->view('user/formedit',$data,TRUE)
        );
        $this->parser->parse('beranda/template',$beranda);
    }else{
        exit('Data Tidak Ditemukan');
    }

}

public function update(){
    $kdk = $this->input->post('kdk',TRUE);
    $queryupdatedata = $this->muser->updatedata();
    $pesan='<div class = "alert alert-succes alert-dismissible">'
    .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
    .'Data Berhasil Di Update '
    .'</div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect('user/index/'.$kdb);
}

function hapus($kode){   
    $kode = $this->uri->segment(3);
    $queryhapus = $this->muser->hapusdata($kode);
    if($queryhapus){
        $pesan = '<div class="alert alert-succes alert-dismissible">'
        .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
        .'Data Berhasil di Hapus'
        .'</div>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect('user/index');
    }
}  
}
?>