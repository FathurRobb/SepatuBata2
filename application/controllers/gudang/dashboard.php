<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends CI_Controller{
	
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('gudang/barang_model');
    }

    public function index()
    {
        $data['profil']=$this->login_model->get_profil();
        $data['data'] = $this->barang_model->tampil_barang();
        $this->load->view('gudang/dashboard', $data);
    }

    public function simpan_barang()
    {
        $barang_kode=$this->barang_model->get_kobar();
        $barang_nama=$this->input->post('barang_nama');
        $barang_warna=$this->input->post('barang_warna');
        $barang_ukuran=$this->input->post('barang_ukuran');
        $barang_jenis=$this->input->post('barang_jenis');
        $barang_stok=$this->input->post('barang_stok');
        $barang_harga=str_replace(',', '', $this->input->post('barang_harga'));
        $this->barang_model->simpan_barang($barang_kode,$barang_nama,$barang_warna,$barang_ukuran,$barang_jenis,$barang_stok,$barang_harga);
        redirect('gudang/dashboard');
    }

    public function edit_barang()
    {
        $barang_kode=$this->input->post('barang_kode');
        $barang_stok=$this->input->post('barang_stok');
        $barang_harga=str_replace(',', '', $this->input->post('barang_harga'));
        $this->barang_model->edit_barang($barang_kode,$barang_stok,$barang_harga);
        redirect('gudang/dashboard');
    }

    public function hapus_barang()
    {
        $barang_kode=$this->input->post('barang_kode');
        $this->barang_model->hapus_barang($barang_kode);
        redirect('gudang/dashboard');
    }

}
?>