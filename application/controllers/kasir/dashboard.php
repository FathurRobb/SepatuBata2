<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends CI_Controller{
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('gudang/barang_model');
        $this->load->model('kasir/penjualan_model');
    }
	
	public function index(){
        $data['profil']=$this->login_model->get_profil();
        $data['data'] = $this->barang_model->tampil_barang();
		$this->load->view('kasir/dashboard', $data);
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    function get_barang(){
        $kobar=$this->input->post('kode_brg');
        $x['brg']=$this->barang_model->get_barang($kobar);
        $this->load->view('kasir/v_detail_penjualan',$x);
    }
    
    function add_to_cart(){
        $kobar=$this->input->post('kode_brg');
        $produk=$this->barang_model->get_barang($kobar);
        $i=$produk->row_array();
        $data = array(
               'id'       => $i['barang_kode'],
               'name'     => $i['barang_nama'],
               'color'    => $i['barang_warna'],
               'size'     => $i['barang_ukuran'],
               'jenis'    => $i['barang_jenis'],
               'harga'    => $i['barang_harga'],
               'price'    => str_replace(",", "", $this->input->post('harjul'))-$this->input->post('diskon'),
               'disc'     => $this->input->post('diskon'),
               'qty'      => $this->input->post('qty'),
               'amount'   => str_replace(",", "", $this->input->post('harjul'))
            );
    if(!empty($this->cart->total_items())){
        foreach ($this->cart->contents() as $items){
            $id=$items['id'];
            $qtylama=$items['qty'];
            $rowid=$items['rowid'];
            $kobar=$this->input->post('kode_brg');
            $qty=$this->input->post('qty');
            if($id==$kobar){
                $up=array(
                    'rowid'=> $rowid,
                    'qty'=>$qtylama+$qty
                    );
                $this->cart->update($up);
            }else{
                $this->cart->insert($data);
            }
        }
    }else{
        $this->cart->insert($data);
    }
        redirect('kasir/dashboard');
    
    }
    function remove(){
        $row_id=$this->uri->segment(4);
        $this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
        redirect('kasir/dashboard');
    }
    function simpan_penjualan(){
        $total=$this->input->post('total');
        $jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
        $kembalian=$jml_uang-$total;
        if(!empty($total) && !empty($jml_uang)){
            if($jml_uang < $total){
                echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
                redirect('kasir/dashboard');
            }else{
                $data['profil']=$this->login_model->get_profil();
                $nofak=$this->penjualan_model->get_nofak();
                $this->session->set_userdata('nofak',$nofak);
                $order_proses=$this->penjualan_model->simpan_penjualan($nofak,$total,$jml_uang,$kembalian);
                if($order_proses){
                    $this->cart->destroy();
                    
                    $this->session->unset_userdata('tglfak');
                    $this->load->view('kasir/alert_sukses',$data);  
                }else{
                    redirect('kasir/dashboard');
                }
            }
            
        }else{
            echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
            redirect('kasir/dashboard');
        }

    }

    function cetak_faktur(){
        $x['data']=$this->penjualan_model->cetak_faktur();
        $this->load->view('kasir/v_faktur',$x);
        //$this->session->unset_userdata('nofak');
    }
}
?>