<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Karyawan extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('manajer/karyawan_model');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data = array('profil'=>$this->login_model->get_profil(),
                        'data' => $this->karyawan_model->tampil_karyawan(),
                        'jabatan' => $this->karyawan_model->get_jabatan()
            );
        $this->load->view('manajer/v_karyawan', $data);
    }

/*
    public function form_tambah()
    {
        $data = array('profil'=>$this->login_model->get_profil(),
                        'data' => $this->karyawan_model->tampil_karyawan(),
                        'jabatan' => $this->karyawan_model->get_jabatan()
            );

        $this->load->view('manajer/v_karyawan_tambah',$data);
    }
  
      public function tambah(){    
        $data = array();        

        if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form      
          // lakukan upload file dengan memanggil function upload yang ada di Karyawan_model.php      
          $upload = $this->karyawan_model->upload();            
          
          if($upload['result'] == "success"){ // Jika proses upload sukses         
            // Panggil function save yang ada di Karyawan_model.php untuk menyimpan data ke database        
            $this->karyawan_model->save($upload);                

            redirect('manajer/karyawan'); // Redirect kembali ke halaman awal / halaman view data      
          }else{ // Jika proses upload gagal        
            $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan      
          }    
        }        

        $this->load->view('manajer/v_karyawan_tambah', $data);  
      }
  */

    public function tambah(){    
        $data = array('profil'=>$this->login_model->get_profil(),
                        'data' => $this->karyawan_model->tampil_karyawan(),
                        'jabatan' => $this->karyawan_model->get_jabatan()
                      );        

        if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form      
          $this->karyawan_model->save();                

            redirect('manajer/karyawan'); // Redirect kembali ke halaman awal / halaman view data
        }        

        $this->load->view('manajer/v_karyawan_tambah', $data);  
      }

    public function edit($id = null)
    {
        
        $karyawan = $this->karyawan_model;
        $profil = $this->login_model;

        if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form      
          $karyawan->update();                

            redirect('manajer/karyawan'); // Redirect kembali ke halaman awal / halaman view data
        }

        $data["karyawan"] = $karyawan->getById($id);
        $data["jabatan"] = $karyawan->get_jabatan();
        $data["profil"] = $profil->get_profil();

        $this->load->view("manajer/v_karyawan_edit", $data);
    
    }

    public function delete($id=null)
    {   
        if ($this->karyawan_model->delete($id)) {
            redirect(site_url('manajer/karyawan'));
        }
    }

}
?>