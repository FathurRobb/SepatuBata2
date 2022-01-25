<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
	function get_data_barang(){
		$hsl=$this->db->query("SELECT barang_kode,barang_nama,barang_warna,barang_ukuran,barang_jenis,barang_stok,barang_harga FROM barang ORDER BY barang_jenis");
		return $hsl;
	}
	function get_data_penjualan(){
		$this->db->select("jual_nofak,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,jual_total,barang.barang_kode,barang_nama,barang_warna,barang_ukuran,barang_harga,d_jual_qty,d_jual_diskon,d_jual_total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE('jual_nofak=d_jual_nofak');
        $this->db->ORDER_BY('jual_nofak','DESC');
        $hsl = $this->db->get();
        return $hsl;
	}
	function get_total_penjualan(){
		$this->db->select("jual_nofak,DATE_FORMAT(jual_tanggal,'%d %m %Y') AS jual_tanggal,jual_total,barang.barang_kode,barang_nama,barang_warna,barang_ukuran,barang_harga,d_jual_qty,d_jual_diskon,sum(d_jual_total)AS total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE('jual_nofak=d_jual_nofak');
        $this->db->ORDER_BY('jual_nofak','DESC');
        $hsl = $this->db->get();
        return $hsl;
	}
	
	function get_jual_pertanggal($tanggal){
		$this->db->select("jual_nofak,DATE_FORMAT(jual_tanggal,'%d/%m/%Y') AS jual_tanggal,barang.barang_kode,barang_nama,barang_warna,barang_ukuran,barang_harga,d_jual_qty,d_jual_diskon,d_jual_total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE("DATE(jual_tanggal)='$tanggal'");
        $this->db->ORDER_BY('jual_nofak','DESC');
        $hsl = $this->db->get();
        return $hsl;
	}
	function get_total_jual_pertanggal($tanggal){
		$this->db->select("jual_nofak,DATE_FORMAT(jual_tanggal,'%d/%m/%Y') AS jual_tanggal,barang.barang_kode,barang_nama,barang_warna,barang_ukuran,barang_harga,d_jual_qty,d_jual_diskon,SUM(d_jual_total) AS total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE("DATE(jual_tanggal)='$tanggal'");
        $this->db->ORDER_BY('jual_nofak','DESC');
        $hsl = $this->db->get();
        return $hsl;
	}
	function get_bulan_jual(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan FROM jual");
		return $hsl;
	}
	function get_tahun_jual(){
		$hsl=$this->db->query("SELECT DISTINCT YEAR(jual_tanggal) AS tahun FROM jual");
		return $hsl;
	}
	function get_jual_perbulan($bulan){
		$this->db->select("jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,barang.barang_kode,barang_nama,barang_warna,barang_ukuran,barang_harga,d_jual_qty,d_jual_diskon,d_jual_total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE("DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'");
        $this->db->ORDER_BY('jual_nofak','DESC');
        $hsl = $this->db->get();
        return $hsl;
	}
	function get_total_jual_perbulan($bulan){
		$this->db->select("jual_nofak,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,barang.barang_kode,barang_nama,barang_warna,barang_ukuran,barang_harga,d_jual_qty,d_jual_diskon,SUM(d_jual_total)AS total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE("DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan'");
        $this->db->ORDER_BY('jual_nofak','DESC');
        $hsl = $this->db->get();
        return $hsl;
	}
	function get_jual_pertahun($tahun){
		$this->db->select("jual_nofak,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal, '%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,barang.barang_kode,barang_nama,barang_warna,barang_ukuran,barang_harga,d_jual_qty,d_jual_diskon,d_jual_total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE("YEAR(jual_tanggal)='$tahun'");
        $this->db->ORDER_BY('jual_nofak','DESC');
        $hsl = $this->db->get();
        return $hsl;
	}
	function get_total_jual_pertahun($tahun){
		$this->db->select("jual_nofak,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal, '%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS jual_tanggal,barang.barang_kode,barang_nama,barang_warna,barang_ukuran,barang_harga,d_jual_qty,d_jual_diskon,SUM(d_jual_total)AS total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE("YEAR(jual_tanggal)='$tahun'");
        $this->db->ORDER_BY('jual_nofak','DESC');
        $hsl = $this->db->get();
        return $hsl;
	}
        function get_total_gaji_karyawan()
        {       
                $this->db->select("kar_nik,kar_nama,jabatan_nama,SUM(jabatan_gaji)AS total_gaji");
                $this->db->from('karyawan');
                $this->db->join('jabatan','karyawan.jabatan_id = jabatan.jabatan_id','LEFT');
                $hsl=$this->db->get();
                return $hsl;
        }
}
?>