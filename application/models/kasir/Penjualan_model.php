<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Penjualan_model extends CI_Model
{
	
	function simpan_penjualan($nofak,$total,$jml_uang,$kembalian){
		$username=$this->session->userdata("username");
		$this->db->query("INSERT INTO jual (jual_nofak,jual_total,jual_jml_uang,jual_kembalian,username) VALUES ('$nofak','$total','$jml_uang','$kembalian','$username')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'barang_kode'			=>	$item['id'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_diskon'			=>	$item['disc'],
				'd_jual_total'			=>	$item['subtotal']
			);
			$this->db->insert('detail_jual',$data);
		}
		return true;
	}

	function get_nofak(){
		$q = $this->db->query("SELECT MAX(RIGHT(jual_nofak,6)) AS kd_max FROM jual WHERE DATE(jual_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return date('dmy').$kd;
	}

	function cetak_faktur(){
		$nofak=$this->session->userdata('nofak');
		$this->db->select("jual_nofak,DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal,jual_total,jual_jml_uang,jual_kembalian,barang_nama,barang_ukuran,barang_harga,d_jual_nofak,d_jual_qty,d_jual_diskon,d_jual_total");
        $this->db->from('detail_jual');
        $this->db->join('barang','detail_jual.barang_kode = barang.barang_kode','LEFT');      
        $this->db->join('jual','detail_jual.d_jual_nofak = jual.jual_nofak','LEFT');
        $this->db->WHERE("jual_nofak='$nofak'");
        $hsl = $this->db->get();
        return $hsl;
	}
}
?>