<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    function tampil_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('hak_akses','user.id_hak_akses = hak_akses.id_hak_akses','LEFT');      
        $this->db->join('karyawan','user.kar_nik = karyawan.kar_nik','LEFT');
        $hasil = $this->db->get();
        return $hasil;
    }

    function get_hak()
    {
        $query=$this->db->query("SELECT*FROM hak_akses");
        return $query->result();
    }

    function get_karyawan()
    {
        //SELECT * FROM karyawan WHERE NOT EXISTS (SELECT * FROM user WHERE karyawan.kar_nik = user.kar_nik)
        //SELECT * FROM karyawan WHERE kar_nik NOT IN (SELECT kar_nik FROM user)
        $query=$this->db->query("SELECT*FROM karyawan");
        return $query->result();
    }

    function simpan_user($username,$password,$hak_akses,$karyawan)
    {
        $hasil=$this->db->query("INSERT INTO user (username,password,id_hak_akses,kar_nik) VALUES ('$username','$password','$hak_akses','$karyawan')");
        return $hasil;
    }

    function edit_user($username,$hak_akses)
    {
        $hasil=$this->db->query("UPDATE user SET id_hak_akses='$hak_akses' WHERE username='$username'");
        return $hasil;
    }

    function hapus_user($username){
        $hasil=$this->db->query("DELETE FROM user WHERE username='$username'");
        return $hasil;
    }

}
?>