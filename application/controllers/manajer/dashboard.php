<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends CI_Controller{
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('manajer/laporan_model');
        $this->load->model('manajer/grafik_model');
    }

	public function index(){
        $data['profil']=$this->login_model->get_profil();
        $data['username'] = $this->session->userdata('username');
        $data['jual_bln']=$this->laporan_model->get_bulan_jual();
        $data['jual_thn']=$this->laporan_model->get_tahun_jual();
		$this->load->view('manajer/dashboard', $data);
	}

	public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_hak_akses');
        session_destroy();
        redirect('login');
    }

    function lap_data_barang(){
        $x['profil']=$this->login_model->get_profil();
        $x['data']=$this->laporan_model->get_data_barang();
        $this->load->view('manajer/laporan/v_lap_barang',$x);
    }
    function lap_data_penjualan(){
        $x['profil']=$this->login_model->get_profil();
        $x['data']=$this->laporan_model->get_data_penjualan();
        $x['jml']=$this->laporan_model->get_total_penjualan();
        $this->load->view('manajer/laporan/v_lap_penjualan',$x);
    }
    function lap_penjualan_pertanggal(){
        $x['profil']=$this->login_model->get_profil();
        $tanggal=$this->input->post('tgl');
        $x['jml']=$this->laporan_model->get_total_jual_pertanggal($tanggal);
        $x['data']=$this->laporan_model->get_jual_pertanggal($tanggal);
        $this->load->view('manajer/laporan/v_lap_jual_pertanggal',$x);
    }
    function lap_penjualan_perbulan(){
        $x['profil']=$this->login_model->get_profil();
        $bulan=$this->input->post('bln');
        $x['jml']=$this->laporan_model->get_total_jual_perbulan($bulan);
        $x['data']=$this->laporan_model->get_jual_perbulan($bulan);
        $this->load->view('manajer/laporan/v_lap_jual_perbulan',$x);
    }
    function lap_penjualan_pertahun(){
        $x['profil']=$this->login_model->get_profil();
        $tahun=$this->input->post('thn');
        $x['jml']=$this->laporan_model->get_total_jual_pertahun($tahun);
        $x['data']=$this->laporan_model->get_jual_pertahun($tahun);
        $this->load->view('manajer/laporan/v_lap_jual_pertahun',$x);
    }
    function lap_arus_kas(){
        $x['profil']=$this->login_model->get_profil();
        $bulan=$this->input->post('bln');
        $x['jml']=$this->laporan_model->get_total_jual_perbulan($bulan);
        $x['gaji']=$this->laporan_model->get_total_gaji_karyawan();
        $this->load->view('manajer/laporan/v_lap_arus_kas',$x);
    }

    function graf_penjualan_perbulan(){
        $bulan=$this->input->post('bln');
        $x['report']=$this->grafik_model->graf_penjualan_perbulan($bulan);
        $x['bln']=$bulan;
        $this->load->view('manajer/grafik/v_graf_penjualan_perbulan',$x);
    }
    function graf_penjualan_pertahun(){
        $tahun=$this->input->post('thn');
        $x['report']=$this->grafik_model->graf_penjualan_pertahun($tahun);
        $x['thn']=$tahun;
        $this->load->view('manajer/grafik/v_graf_penjualan_pertahun',$x);
    }

}
?>