<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grafik_model extends CI_Model
{
    function graf_penjualan_perbulan($bulan){
        $query = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%d') AS tanggal,SUM(jual_total) total FROM jual WHERE DATE_FORMAT(jual_tanggal,'%M %Y')='$bulan' GROUP BY DAY(jual_tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function graf_penjualan_pertahun($tahun){
        $query = $this->db->query("SELECT DATE_FORMAT(jual_tanggal,'%M') AS bulan,SUM(jual_total) total FROM jual WHERE YEAR(jual_tanggal)='$tahun' GROUP BY MONTH(jual_tanggal)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
?>