<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_depan');
    }
    

    public function index()
    {   
        $data['subtotal'] = $this->Model_depan->subtotal();
        $data['keranjang'] = $this->Crud->edit_data(['status_bayar'=>0],'keranjang')->row_array(); 
        $data['perusahaan'] = $this->Crud->get_data('perusahaan')->result();
        $data['total'] =  $data['subtotal']['jumlah']+$data['keranjang']['ongkir']-$data['keranjang']['diskon'];
        $this->load->view('v_header');
        $this->load->view('v_checkout',$data);
        $this->load->view('v_footer');
    }

    public function ambil_perusahaan(){
        $id = $this->input->post('id');
        $data = $this->Crud->edit_data(['id'=>$id],'perusahaan')->row_array(); 
        echo json_encode($data);
    }

    public function order(){
        $jenis = $this->input->post('jenis');
        $id_perusahaan = $this->input->post('nama_perusahaan');
        $nama = $this->input->post('nama_depan');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $kode_pos = $this->input->post('kode_pos');
        $telpon = $this->input->post('telpon');
        $email = $this->input->post('email');
        $subtotal = $this->input->post('subtotal');
        $ongkir = $this->input->post('ongkir');
        $diskon = $this->input->post('diskon');
        $total = $this->input->post('total');
        $pembayaran = $this->input->post('pembayaran');
        $data = array(
            'jenis'=>$jenis,
            'id_perusahaan'=>$id_perusahaan,
            'nama'=>$nama,
            'alamat'=>$alamat,
            'kota'=>$kota,
            'kode_pos'=>$kode_pos,
            'telpon'=>$telpon,
            'email'=>$email,
            'subtotal'=>$subtotal,
            'ongkir'=>$ongkir,
            'diskon'=>$diskon,
            'total'=>$total,
            'pembayaran'=>$pembayaran,
            'waktu'=>date('Y-m-d H:i:s')

        );
        $this->Crud->insert_data($data,'transaksi');
        $cari_data = $this->Model_depan->transaksi_terakhir($telpon);
        $this->Crud->update_data(['status_bayar'=>0],['status_bayar'=>1,'id_transaksi'=>$cari_data['id']],'keranjang');
        
        redirect('Checkout/detail/'.$cari_data['id'],'refresh');
        
    }

    public function detail($id){
        $data['transaksi'] = $this->Crud->edit_data(['id'=>$id],'transaksi')->row_array();
        $data['detail'] = $this->Model_depan->detail_pesanan($id);
        // var_dump($data['detail']);die();
        $this->load->view('v_header');
        $this->load->view('v_detail', $data);
        $this->load->view('v_footer');
        
        
    }

}

/* End of file Checkout.php */
 ?>