<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
	function tampil_jabatan()
	{
		$hasil=$this->db->query("SELECT*FROM jabatan");
		return $hasil;
	}

	function simpan_jabatan($jabatan_nama,$jabatan_gaji)
	{
		$hasil=$this->db->query("INSERT INTO jabatan (jabatan_nama,jabatan_gaji) VALUES ('$jabatan_nama','$jabatan_gaji')");
		return $hasil;
	}

	function edit_jabatan($jabatan_id,$jabatan_nama,$jabatan_gaji)
	{
		$hasil=$this->db->query("UPDATE jabatan SET jabatan_nama='$jabatan_nama',jabatan_gaji='$jabatan_gaji' WHERE jabatan_id='$jabatan_id'");
		return $hasil;
	}

	function hapus_jabatan($jabatan_id){
		$hasil=$this->db->query("DELETE FROM jabatan WHERE jabatan_id='$jabatan_id'");
		return $hasil;
	}

}
?>