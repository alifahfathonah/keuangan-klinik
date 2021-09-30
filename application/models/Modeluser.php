<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeluser extends CI_Model{

	function datauser(){
		return $this->db->query("SELECT * from user ");
	}

	function simpandata(){   
		
		$us = $this->input->post('usn', TRUE);
        $nm = $this->input->post('nmleng', TRUE);
        $pss = $this->input->post('pass', TRUE);        
        $mail = $this->input->post('email', TRUE);
        $notelp = $this->input->post('notelp', TRUE);
        $cb = $this->input->post('cbhak', TRUE);
        $gambar = $this->input->post('gambar', TRUE);

        $nama_file = $_FILES['gambar']['name'];
		$source=$_FILES['gambar']['tmp_name'];
		$folder='./uploads/';
		move_uploaded_file($source, $folder.$nama_file);

        
        $a = $this->db->query("insert into user values('$us','$nm',md5('$pss'),'$mail','$notelp','$nama_file','$cb')");
		return $a;
	} 

	function ambildata($kode)
	{
		return $this->db->query("SELECT * from user where username='$kode'");
	}
	
	function updatedata(){
		$us = $this->input->post('usn', TRUE);
        $nm = $this->input->post('nmleng', TRUE);
        $pss = $this->input->post('pass', TRUE);        
        $mail = $this->input->post('email', TRUE);
        $notelp = $this->input->post('notelp', TRUE);
        $cb = $this->input->post('cbhak', TRUE);
        $gambar = $this->input->post('gambar', TRUE);

        $nama_file = $_FILES['gambar']['name'];
		$source=$_FILES['gambar']['tmp_name'];
		$folder='./uploads/';
		move_uploaded_file($source, $folder.$nama_file);

		$this->db->where('username',$us);
		$query = $this->db->get('user');
		$row = $query->row();

		unlink("./uploadsuser/$row->foto");

        $this->db->query("update user set namalengkap='$nm',password=md5('$pss'),foto='$nama_file',email='$mail',notelp='$notelp',hakakses='$cb' where username='$us'");
		 	
	}
	function hapusdata($kode){
		$this->db->where('username',$kode);
		$query = $this->db->get('user');
		$row = $query->row();

		unlink("./uploadsuser/$row->foto");

		$this->db->delete('user', array('username' => $kode));
		$pesan = '<div class="alert alert-succes alert-dismissible">'
        .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
        .'Data Berhasil di Hapus'
        .'</div>';
        $this->session->set_flashdata('pesan',$pesan);
		redirect('user');
	}

}
?>