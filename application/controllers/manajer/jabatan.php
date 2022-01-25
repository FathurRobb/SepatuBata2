<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Jabatan extends CI_Controller{
	/*
	public function __construct()
    {
        parent::__construct();
        $this->load->model('manajer/jabatan_model');
        $this->load->helper('text');
    }

	public function index(){
        $x['data'] = $this->jabatan_model->show_jabatan();
		$this->load->view('manajer/jabatan', $x);
	}

    public function simpan_jabatan()
    {
        $jabatan_id=$this->input->post('jabatan_id');
        $jabatan_nama=$this->input->post('jabatan_nama');
        $jabatan_gaji=$this->input->post('jabatan_gaji');
        $this->jabatan_model->simpan_jabatan($jabatan_id,$jabatan_nama,$jabatan_gaji);
        redirect('manajer/jabatan');
    }

    public function edit_jabatan()
    {
        $jabatan_id=$this->input->post('jabatan_id');
        $jabatan_nama=$this->input->post('jabatan_nama');
        $jabatan_gaji=$this->input->post('jabatan_gaji');
        $this->jabatan_model->edit_jabatan($jabatan_id,$jabatan_nama,$jabatan_gaji);
        redirect('manajer/jabatan');
    }

    public function hapus_jabatan(){
        $jabatan_id=$this->input->post('jabatan_id');
        $this->jabatan_model->hapus_jabatan($jabatan_id);
        redirect('manajer/jabatan');
    }
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('manajer/jabatan_model');
    }

    public function index()
    {
        $data['profil']=$this->login_model->get_profil();
        $data['data'] = $this->jabatan_model->tampil_jabatan();
        $this->load->view('manajer/v_jabatan', $data);
    }

    public function simpan_jabatan()
    {
        $jabatan_nama=$this->input->post('jabatan_nama');
        $jabatan_gaji=str_replace(',', '', $this->input->post('jabatan_gaji'));
        $this->jabatan_model->simpan_jabatan($jabatan_nama,$jabatan_gaji);
        redirect('manajer/jabatan');
    }

    public function edit_jabatan()
    {
        $jabatan_id=$this->input->post('jabatan_id');
        $jabatan_nama=$this->input->post('jabatan_nama');
        $jabatan_gaji=str_replace(',', '', $this->input->post('jabatan_gaji'));
        $this->jabatan_model->edit_jabatan($jabatan_id,$jabatan_nama,$jabatan_gaji);
        redirect('manajer/jabatan');
    }

    function hapus_jabatan()
    {
        $jabatan_id=$this->input->post('jabatan_id');
        $this->jabatan_model->hapus_jabatan($jabatan_id);
        redirect('manajer/jabatan');
    }
}
?>