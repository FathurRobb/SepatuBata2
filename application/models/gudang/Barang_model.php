<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_model extends CI_Model
{
	public function tampil_barang()
	{
		$hasil=$this->db->query("SELECT*FROM barang");
		return $hasil;
	}

	public function simpan_barang($barang_kode,$barang_nama,$barang_warna,$barang_ukuran,$barang_jenis,$barang_stok,$barang_harga)
	{
		$hasil=$this->db->query("INSERT INTO barang (barang_kode,barang_nama,barang_warna,barang_ukuran,barang_jenis,barang_stok,barang_harga) VALUES ('$barang_kode','$barang_nama','$barang_warna','$barang_ukuran','$barang_jenis','$barang_stok','$barang_harga')");
		return $hasil;
	}

	public function edit_barang($barang_kode,$barang_stok,$barang_harga)
	{
		$hasil=$this->db->query("UPDATE barang SET barang_stok='$barang_stok',barang_harga='$barang_harga' WHERE barang_kode='$barang_kode'");
		return $hasil;
	}

	public function hapus_barang($barang_kode){
		$hasil=$this->db->query("DELETE FROM barang WHERE barang_kode='$barang_kode'");
		return $hasil;
	}

    public function get_kobar(){
        $q = $this->db->query("SELECT MAX(RIGHT(barang_kode,6)) AS kd_max FROM barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
    }	

    public function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM barang where barang_kode='$kobar'");
		return $hsl;
	}

}
?>