<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller{
	
	public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('login_model');
    }

	public function index(){
		$this->load->view("login");
	}

	public function cek_login() {
        $data = array('username' => $this->input->post('username', TRUE),
                        'password' => md5($this->input->post('password', TRUE))
            );
        $this->load->model('login_model'); // load login_model
        $hasil = $this->login_model->cek_user($data);
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['username'] = $sess->username;
                $sess_data['id_hak_akses'] = $sess->id_hak_akses;
                $sess_data['kar_nik'] = $sess->kar_nik;
                $this->session->set_userdata($sess_data);
                //$kar_nik = $this->session->userdata("kar_nik");
                $hasil = $this->login_model->cek_user($kar_nik);
                //$this->login_model->get_profil($kar_nik);
            }
            if ($this->session->userdata('id_hak_akses')=='1') {
                redirect('manajer/dashboard');
            }
            elseif ($this->session->userdata('id_hak_akses')=='2') {
                redirect('gudang/dashboard');
            }       
            elseif ($this->session->userdata('id_hak_akses')=='3') {
                redirect('kasir/dashboard');
            }
        }
        else {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }
    }

}
?>
