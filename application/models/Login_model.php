<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function cek_user($data) {
		$query = $this->db->get_where('user', $data);
		return $query;
	}

	public function get_profil()
	{
		$kar_nik = $this->session->userdata("kar_nik");
		$query=$this->db->query("SELECT*FROM karyawan WHERE kar_nik='$kar_nik'");
        return $query;
	}
	/*
	public function cek_user($u,$p)
	{
		$this->db->select('user.*,karyawan.kar_nama, karyawan.kar_foto');
		$this->db->from('user');
		$this->db->join('karyawan','user.kar_nik = karyawan.kar_nik','LEFT');
		$this->db->where('username',$u)
		$this->db->where('password',$p)
		$query = $this->db->get();
		return $query;
	}*/
}
?>