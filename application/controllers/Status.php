<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_depan');
    }
    
    public function index()
    {
        if (isset($_POST['Cari'])) {
            echo "ok";
            $data['pesanan'] = $this->Crud->edit_data(['id'=>$this->input->post('kode')],'transaksi')->row_array();
            if ($data['pesanan']['status']==0) {
                $data['status_pesanan']='<span class="badge badge-warning">Menunggu Pembayaran</span>';
            }elseif($data['pesanan']['status']==1){
                $data['status_pesanan']='<span class="badge badge-info">Terverifikasi</span>';
            }elseif($data['pesanan']['status']==2){
                $data['status_pesanan']='<span class="badge badge-info">Sedang diproses</span>';
            }elseif($data['pesanan']['status']==3){
                $data['status_pesanan']='<span class="badge badge-success">Dikirim</span>';
            }

            if ($data['pesanan']['status_bayar']==0) {
                $data['status_pembayaran']='<span class="badge badge-warning">Belom Lunas</span>';
            }elseif($data['pesanan']['status_bayar']==1){
                $data['status_pembayaran']='<span class="badge badge-success">Lunas</span>';
            }
            $this->load->view('v_header');
            $this->load->view('v_status',$data);
            $this->load->view('v_footer');
        }else{
            $data['pesanan']=NULL ;
            $this->load->view('v_header');
            $this->load->view('v_status',$data);
            $this->load->view('v_footer');
        }
        
    }
    

}

/* End of file Status.php */
 ?>