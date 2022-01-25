<?php
class Karyawan_model extends CI_Model{

    private $_table = "karyawan";

    public $kar_nik;
    public $kar_nama;
    public $kar_tgl_lahir;
    public $kar_jenkel;
    public $kar_alamat;
    public $kar_agama;
    public $kar_status_kawin;
    public $kar_foto = "default.jpg";
    public $kar_no_hp;
    public $kar_norek;
    public $kar_tgl_masuk;
    public $jabatan_id;

    public function tampil_karyawan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan','karyawan.jabatan_id = jabatan.jabatan_id','LEFT');
        $hasil = $this->db->get();
        return $hasil;
    }

    public function get_jabatan()
    {
        $query=$this->db->query("SELECT*FROM jabatan");
        return $query->result();
    }
 
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kar_nik" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kar_nik = $post["kar_nik"];
        $this->kar_nama = $post["kar_nama"];
        $this->kar_tgl_lahir = $post["kar_tgl_lahir"];
        $this->kar_jenkel = $post["kar_jenkel"];
        $this->kar_alamat = $post["kar_alamat"];
        $this->kar_agama = $post["kar_agama"];
        $this->kar_status_kawin = $post["kar_status_kawin"];
        $this->kar_foto = $this->_uploadImage();
        $this->kar_no_hp = $post["kar_no_hp"];
        $this->kar_norek = $post["kar_norek"];
        $this->kar_tgl_masuk = $post["kar_tgl_masuk"];
        $this->jabatan_id = $post["jabatan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kar_nik = $post["kar_nik"];
        $this->kar_nama = $post["kar_nama"];
        $this->kar_tgl_lahir = $post["kar_tgl_lahir"];
        $this->kar_jenkel = $post["kar_jenkel"];
        $this->kar_alamat = $post["kar_alamat"];
        $this->kar_agama = $post["kar_agama"];
        $this->kar_status_kawin = $post["kar_status_kawin"];
        $this->kar_foto = $this->_updateImage();
        $this->kar_no_hp = $post["kar_no_hp"];
        $this->kar_norek = $post["kar_norek"];
        $this->kar_tgl_masuk = $post["kar_tgl_masuk"];
        $this->jabatan_id = $post["jabatan"];
        $this->db->update($this->_table, $this, array('kar_nik' => $post['kar_nik']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("kar_nik" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/images/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->kar_nik;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('kar_foto')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _updateImage()
    {
        $config['upload_path']          = './assets/images/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->kar_nik;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('kar_foto')) {
            return $this->upload->data("file_name");
        }
        
        return $this->input->post('old_kar_foto',true);
    }

    private function _deleteImage($id)
    {
        $karyawan = $this->getById($id);
        if ($karyawan->kar_foto != "default.jpg") {
            $filename = explode(".", $karyawan->kar_foto)[0];
            return array_map('unlink', glob(FCPATH."assets/images/upload/$filename.*"));
        }
    }
    /*
    // Fungsi untuk melakukan proses upload file  
    public function upload(){    
        $config['upload_path'] = './assets/images/upload/';    
        $config['allowed_types'] = 'jpg|png|jpeg';    
        $config['max_size']  = '2048';    
        $config['remove_space'] = TRUE;      

        $this->load->library('upload', $config); // Load konfigurasi uploadnya    
        if($this->upload->do_upload('kar_foto')){ // Lakukan upload dan Cek jika proses upload berhasil      
            // Jika berhasil :      
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
            return $return;    
        }else{     
             // Jika gagal :      
             $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      
             return $return;    
        }  
    }    

    // Fungsi untuk menyimpan data ke database  
    public function save($upload){    
        $data = array(      'kar_nik'=>$this->input->post('kar_nik'),
                            'kar_nama'=>$this->input->post('kar_nama'),
                            'kar_tgl_lahir'=>$this->input->post('kar_tgl_lahir'),
                            'kar_jenkel'=>$this->input->post('kar_jenkel'),
                            'kar_alamat'=>$this->input->post('kar_alamat'),
                            'kar_agama'=>$this->input->post('kar_agama'),
                            'kar_status_kawin'=>$this->input->post('kar_status_kawin'),
                            'kar_foto'=>$upload['file']['file_name'],
                            'kar_no_hp'=>$this->input->post('kar_no_hp'),
                            'kar_norek'=>$this->input->post('kar_norek'),
                            'kar_tgl_masuk'=>$this->input->post('kar_tgl_masuk'),
                            'jabatan_id'=>$this->input->post('jabatan')
                    );        
        $this->db->insert('karyawan', $data);  
    }
    */
}