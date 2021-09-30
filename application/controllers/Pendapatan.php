<?php
defined('BASEPATH') OR exit ('no directnscript access allowed');

class Pendapatan extends CI_Controller{

    function __construct(){
        parent:: __Construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modelpendapatan','mpendapatan');
        $this->load->model('Modelakun');
        $this->load->model('Modelsaldo');
    }

    public function index(){
        if(($this->session->userdata('masuk')==TRUE)){
            // $querydatabarang = $this->mpendapatan->datapendapatan();
            // $data = array('tampil' => $querydatabarang);
            // $beranda = array(
            //     'menu'=> $this->load->view('beranda/menu','',TRUE),
            //     'judul'=>'',
            //     'dash'=>'Data Pendapatan',
            //     'content'=> $this->load->view('pendapatan/vdatapendapatan',$data,TRUE),
            // );
            // $this->parser->parse('beranda/template',$beranda);


            $queryambildata = $this->Modelsaldo->datasaldotran();
        if($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $d = array(
                'kda'=>$baris['kodesaldo'],
                'sdak'=>$baris['saldoakhir']
            );
        }
        //$d['kode_tran']=$this->kodeakun();
        $d['tampil']=$this->mpendapatan->datapendapatan();
        $a['judul'] ='';
        $a['dash']='Data Pendapatan';
        $a['menu']  =$this->load->view('beranda/menu','',TRUE);
        $a['content']=$this->load->view('pendapatan/vdatapendapatan',$d,TRUE);
        $this->parser->parse('beranda/template',$a);
        }else{
            echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
            redirect('Log')";

        }
    }

    function tambahdata(){
        $queryambildata = $this->Modelsaldo->datasaldotran();
        if($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $d = array(
                'kda'=>$baris['kodesaldo'],
                'sdak'=>$baris['saldoakhir'],
            );
        }
        $d['kode_tran']=$this->kodeakun();
        $d['dataakun']=$this->Modelakun->dataakunpend();
        $a['judul'] ='';
        $a['dash']='Tambah Pendapatan';
        $a['menu']  =$this->load->view('beranda/menu','',TRUE);
        $a['content']=$this->load->view('pendapatan/formtambah',$d,TRUE);
        $this->parser->parse('beranda/template',$a);
    }

     public function kodeakun(){
      $this->db->select('RIGHT(kodetransaksi,2) as kodetransaksi', FALSE); 
      $this->db->order_by('kodetransaksi','DESC'); 
      $this->db->limit(1); 
      $query = $this->db->get('pendapatan');  
      if($query->num_rows() <> 0){ 
        $dt = $query->row(); 
        $kode_akun = intval($dt->kodetransaksi) + 1; 
    }else{ 
        $kode_akun = 1; 
    } 
    $kodemax  = str_pad($kode_akun, 3, "0", STR_PAD_LEFT); 
    $kodejadi = "TRP-".$kodemax;  
    return $kodejadi;
}


    function simpan(){
       $querysimpandata = $this->mpendapatan->simpandata();
       if($querysimpandata == FALSE) 
       {
        $this->index();
    } else {
        $pesan = '<div class="alert alert-success alert-dismissible">'
        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
        . 'Data Berhasil di Simpan'
        . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pendapatan');
    }
}

public function edit(){
    $kode = $this->uri->segment(3);
    $queryambildata = $this->mpendapatan->ambildata($kode);
    if($queryambildata->num_rows() > 0) {
        $baris = $queryambildata->row_array();
        $data = array(
            'kdt'=>$baris['kodetransaksi'],
            'tglt'=>$baris['tgltransaksi'],
            'jna'=>$baris['jenisakun'],
            'kds'=>$baris['kodesaldo'],
            'jml'=>$baris['jumlah']
        );
        $data['dataakun']=$this->Modelakun->dataakunpend();

        $beranda = array(
            'menu'=> $this->load->view('beranda/menu','',TRUE),
            'judul'=>'',
            'dash'=>'Edit pendapatan',
            'content'=> $this->load->view('pendapatan/formedit',$data,TRUE)
        );
        $this->parser->parse('beranda/template',$beranda);
    }else{
        exit('Data Tidak Ditemukan');
    }

}

public function update(){
    $kdk = $this->input->post('kdk',TRUE);
    $queryupdatedata = $this->mpendapatan->updatedata();
    $pesan = '<div class="alert alert-success alert-dismissible">'
    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
    . 'Data Berhasil di Update'
    . '</div>';
    $this->session->set_flashdata('pesan', $pesan);
    redirect('pendapatan/index/'.$kdb);
}

function hapus($kode){   
    $kode = $this->uri->segment(3);
    $queryhapus = $this->mpendapatan->hapusdata($kode);
    if($queryhapus){
     $pesan = '<div class="alert alert-success alert-dismissible">'
     . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
     . 'Data Berhasil di Hapus'
     . '</div>';
     $this->session->set_flashdata('pesan', $pesan);
     $this->session->set_flashdata('pesan',$pesan);
     redirect('pendapatan/index');
 }
}  
}
?>