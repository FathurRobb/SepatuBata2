<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('manajer/user_model');
    }

    function index()
    {
        $data = array('profil'=>$this->login_model->get_profil(),
                        'data' => $this->user_model->tampil_user(),
                        'hak_akses' => $this->user_model->get_hak(),
                        'karyawan' => $this->user_model->get_karyawan()
            );
        $this->load->view('manajer/v_user', $data);
    }

    function simpan_user()
    {
        $username=$this->input->post('username');
        $password=md5($this->input->post('password'));
        $hak_akses=$this->input->post('hak_akses');
        $karyawan=$this->input->post('karyawan');
        $this->user_model->simpan_user($username,$password,$hak_akses,$karyawan);
        redirect('manajer/user');
    }

    function edit_user()
    {
        $username=$this->input->post('username');
        $hak_akses=$this->input->post('hak_akses');
        $this->user_model->edit_user($username,$hak_akses);
        redirect('manajer/user');
    }

    function hapus_user()
    {
        $username=$this->input->post('username');
        $this->user_model->hapus_user($username);
        redirect('manajer/user');
    }
}
?>