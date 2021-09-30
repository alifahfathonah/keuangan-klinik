<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('Modellaporan','lap');
    }
    public function lppen(){
     if(($this->session->userdata('masuk')==TRUE) && ($this->session->userdata('akses')==1) || ($this->session->userdata('akses')==2) || ($this->session->userdata('akses')==3)){
        $a['menu']= $this->load->view('beranda/menu','',TRUE);
        $a['judul']='';
        $a['dash']='Cetak Laporan Pendapatan';
        $a['content']=$this->load->view('laporan/inputtglpen','',TRUE);
        $this->parser->parse('beranda/template',$a);

    }else{
        echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
        redirect(log)";
    }
}

public function lap_pend(){
    $tgl1 = $this->input->post('blnawal');
    $tgl2 = $this->input->post('blnakhir');
    $data['awal'] = $tgl1;
    $data['akhir'] = $tgl2;
    $data['tampil'] = $this->lap->lap_pendapatan($tgl1,$tgl2);
    $this->load->view('laporan/lappend',$data);

}
public function lap_pend1(){
    $tgl1 = $this->input->post('thnawal');
    $tgl2 = $this->input->post('thnakhir');
    $data['awal'] = $tgl1;
    $data['akhir'] = $tgl2;
    $data['tampil'] = $this->lap->lap_pendapatan1($tgl1,$tgl2);
    $this->load->view('laporan/lappend1',$data);

}

public function lppeng(){
 if(($this->session->userdata('masuk')==TRUE) && ($this->session->userdata('akses')==1) || ($this->session->userdata('akses')==2) || ($this->session->userdata('akses')==3)){
    $a['menu']= $this->load->view('beranda/menu','',TRUE);
    $a['judul']='';
    $a['dash']='Cetak Laporan Pengeluaran';
    $a['content']=$this->load->view('laporan/inputtglpeng','',TRUE);
    $this->parser->parse('beranda/template',$a);
    
}else{
    echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
    redirect(log)";
}
}

public function lap_peng(){
    $tgl1 = $this->input->post('blnawal');
    $tgl2 = $this->input->post('blnakhir');
    $data['awal'] = $tgl1;
    $data['akhir'] = $tgl2;
    $data['tampil'] = $this->lap->lap_pengeluaran($tgl1,$tgl2);
    $this->load->view('laporan/lappeng',$data);
}
public function lap_peng1(){
    $tgl1 = $this->input->post('thnawal');
    $tgl2 = $this->input->post('thnakhir');
    $data['awal'] = $tgl1;
    $data['akhir'] = $tgl2;
    $data['tampil'] = $this->lap->lap_pengeluaran1($tgl1,$tgl2);
    $this->load->view('laporan/lappeng1',$data);

}

public function lpsaldo(){
 if(($this->session->userdata('masuk')==TRUE) && ($this->session->userdata('akses')==1) || ($this->session->userdata('akses')==2) || ($this->session->userdata('akses')==3)){
    $a['menu']= $this->load->view('beranda/menu','',TRUE);
    $a['judul']='Cetak Laporan Saldo';
    $a['dash']='Cetak Laporan Saldo';
    $a['content']=$this->load->view('laporan/inputsaldo','',TRUE);
    $this->parser->parse('beranda/template',$a);
    
}else{
    echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
    redirect(log)";
}
}
public function lapsaldo(){
    $tgl1 = $this->input->post('tglawal');
    $tgl2 = $this->input->post('tglakhir');
    $data['awal'] = $tgl1;
    $data['akhir'] = $tgl2;
    $data['tampil'] = $this->lap->lap_saldo($tgl1,$tgl2);
    $this->load->view('laporan/lapsaldo',$data);
}


public function lplabarugi(){
 if(($this->session->userdata('masuk')==TRUE) && ($this->session->userdata('akses')==1) || ($this->session->userdata('akses')==2) || ($this->session->userdata('akses')==3)){
    $a['menu']= $this->load->view('beranda/menu','',TRUE);
    $a['judul']='Cetak Laporan Laba & Rugi';
    $a['dash']='Cetak Laporan Laba & Rugi';
    $a['content']=$this->load->view('laporan/inputtgllaba','',TRUE);
    $this->parser->parse('beranda/template',$a);
    
}else{
    echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
    redirect(log)";
}
}

public function lap_laba(){
    $tgl1 = $this->input->post('blnawal');
    $tgl2 = $this->input->post('blnakhir');
    $data['awal'] = $tgl1;
    $data['akhir'] = $tgl2;
    $data['tampil'] = $this->lap->lap_labarugi($tgl1,$tgl2);
    
    $this->load->view('laporan/laplaba',$data);
}
public function lap_laba1(){
    $tgl1 = $this->input->post('thnawal');
    $tgl2 = $this->input->post('thnakhir');
    $data['awal'] = $tgl1;
    $data['akhir'] = $tgl2;
    $data['tampil'] = $this->lap->lap_labarugi1($tgl1,$tgl2);
    $this->load->view('laporan/laplaba1',$data);
}

public function lprekap(){
 if(($this->session->userdata('masuk')==TRUE) && ($this->session->userdata('akses')==1) || ($this->session->userdata('akses')==2) || ($this->session->userdata('akses')==3)){
    $a['menu']= $this->load->view('beranda/menu','',TRUE);
    $a['judul']='Cetak Laporan Laba & Rugi';
    $a['dash']='Cetak Laporan Laba & Rugi';
    $a['content']=$this->load->view('laporan/inputtglrekap','',TRUE);
    $this->parser->parse('beranda/template',$a);
    
}else{
    echo "<script>alert('Anda Belum Login !');history.go(-1);</script>
    redirect(log)";
}
}

public function lap_rekap(){
    $kode = $this->input->post('ctg',TRUE);
    if($kode=='M'){
        $tgl1 = $this->input->post('tglawal');
        $tgl2 = $this->input->post('tglakhir');
        $data['awal'] = $tgl1;
        $data['akhir'] = $tgl2;
        $data['tampil'] = $this->lap->lap_pendapatanrek($tgl1,$tgl2);
        $this->load->view('laporan/laprekappend',$data);
    } else {
        $tgl1 = $this->input->post('tglawal');
        $tgl2 = $this->input->post('tglakhir');
        $data['awal'] = $tgl1;
        $data['akhir'] = $tgl2;
        $data['tampil'] = $this->lap->lap_pengeluaranrek($tgl1,$tgl2);
        $this->load->view('laporan/laprekappeng',$data);
    }

}

public function lpuser(){
    $data['tampil'] = $this->lap->lap_user();
    $this->load->view('laporan/lapuser',$data);

}
public function lpakun(){
    $data['tampil'] = $this->lap->lap_akun();
    $this->load->view('laporan/lapakun',$data);

}




}
?>