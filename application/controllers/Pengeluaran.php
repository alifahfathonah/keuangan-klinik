<?php
defined('BASEPATH') OR exit ('no directnscript access allowed');

class Pengeluaran extends CI_Controller{

    function __construct(){
        parent:: __Construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modelpengeluaran','mpengeluaran');
        $this->load->model('Modelakun');
        $this->load->model('Modelsaldo');
    }

    public function index(){
        if(($this->session->userdata('masuk')==TRUE)){
            // $querydatabarang = $this->mpengeluaran->datapengeluaran();
            // $data = array('tampil' => $querydatabarang);
            // $beranda = array(
            //     'menu'=> $this->load->view('beranda/menu','',TRUE),
            //     'judul'=>'',
            //     'dash'=>'Data pengeluaran',
            //     'content'=> $this->load->view('pengeluaran/vdatapengeluaran',$data,TRUE),
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
        $d['tampil']=$this->mpengeluaran->datapengeluaran();
        $a['judul'] ='';
        $a['dash']='Data pengeluaran';
        $a['menu']  =$this->load->view('beranda/menu','',TRUE);
        $a['content']=$this->load->view('pengeluaran/vdatapengeluaran',$d,TRUE);
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
        $d['dataakun']=$this->Modelakun->dataakunpeng();
        $a['judul'] ='';
        $a['dash']='Tambah pengeluaran';
        $a['menu']  =$this->load->view('beranda/menu','',TRUE);
        $a['content']=$this->load->view('pengeluaran/formtambah',$d,TRUE);
        $this->parser->parse('beranda/template',$a);
    }

     public function kodeakun(){
      $this->db->select('RIGHT(kodetransaksikeluar,2) as kodetransaksikeluar', FALSE); 
      $this->db->order_by('kodetransaksikeluar','DESC'); 
      $this->db->limit(1); 
      $query = $this->db->get('pengeluaran');  
      if($query->num_rows() <> 0){ 
        $dt = $query->row(); 
        $kode_akun = intval($dt->kodetransaksikeluar) + 1; 
    }else{ 
        $kode_akun = 1; 
    } 
    $kodemax  = str_pad($kode_akun, 3, "0", STR_PAD_LEFT); 
    $kodejadi = "TRP-".$kodemax;  
    return $kodejadi;
}


    function simpan(){
       $querysimpandata = $this->mpengeluaran->simpandata();
       if($querysimpandata == FALSE) 
       {
        $this->index();
    } else {
        $pesan = '<div class="alert alert-success alert-dismissible">'
        . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
        . 'Data Berhasil di Simpan'
        . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('pengeluaran');
    }
}

public function edit(){
    $kode = $this->uri->segment(3);
    $queryambildata = $this->mpengeluaran->ambildata($kode);
    if($queryambildata->num_rows() > 0) {
        $baris = $queryambildata->row_array();
        $data = array(
            'kdt'=>$baris['kodetransaksikeluar'],
            'tglt'=>$baris['tgltransaksi'],
            'jna'=>$baris['jenisakun'],
            'kds'=>$baris['kodesaldo'],
            'jml'=>$baris['jumlah']
        );
        $data['dataakun']=$this->Modelakun->dataakunpend();

        $beranda = array(
            'menu'=> $this->load->view('beranda/menu','',TRUE),
            'judul'=>'',
            'dash'=>'Edit pengeluaran',
            'content'=> $this->load->view('pengeluaran/formedit',$data,TRUE)
        );
        $this->parser->parse('beranda/template',$beranda);
    }else{
        exit('Data Tidak Ditemukan');
    }

}

public function update(){
    $kdk = $this->input->post('kdk',TRUE);
    $queryupdatedata = $this->mpengeluaran->updatedata();
    $pesan = '<div class="alert alert-success alert-dismissible">'
    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
    . 'Data Berhasil di Update'
    . '</div>';
    $this->session->set_flashdata('pesan', $pesan);
    redirect('pengeluaran/index/'.$kdb);
}

function hapus($kode){   
    $kode = $this->uri->segment(3);
    $queryhapus = $this->mpengeluaran->hapusdata($kode);
    if($queryhapus){
     $pesan = '<div class="alert alert-success alert-dismissible">'
     . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
     . 'Data Berhasil di Hapus'
     . '</div>';
     $this->session->set_flashdata('pesan', $pesan);
     $this->session->set_flashdata('pesan',$pesan);
     redirect('pengeluaran/index');
 }
}  
}
?>