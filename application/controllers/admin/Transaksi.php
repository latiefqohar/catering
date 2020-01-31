<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_admin');
    }
    

    public function index()
    {
        $data['transaksi'] = $this->Crud->get_data('transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksi',$data);
        $this->load->view('admin/v_footer');
    }

    public function detail($id){
        $data['transaksi'] = $this->Crud->edit_data(['id'=>$id],'transaksi')->row_array();
        $data['detail'] = $this->Model_admin->data_transaksi($data['transaksi']['id']);
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_detailTransaksi',$data);
        $this->load->view('admin/v_footer');
    }

    public function verifikasiPerorang(){
        $data['transaksi'] = $this->Crud->edit_data(['pembayaran'=>'transfer','foto !='=>"",'status'=>0],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiVerifikasi',$data);
        $this->load->view('admin/v_footer');
    }

    public function verifikasiPerusahaan(){
        $data['transaksi'] = $this->Crud->edit_data(['pembayaran!='=>'transfer','status'=>0],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiVerifikasi',$data);
        $this->load->view('admin/v_footer');
    }

    public function aksi_verifikasi($id){
        $data = $this->Crud->edit_data(['id'=>$id],'transaksi')->row_array();
        if ($data['pembayaran']=="transfer") {
            $this->Crud->update_data(['id'=>$id],['status'=>1,'status_bayar'=>1,'update'=>date('Y-m-d H:i:s')],'transaksi');
            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Info! Data Berhasil diverifikasi.
            </div>');
            redirect('admin/Transaksi/verifikasiPerorang','refresh');
        }else {
            $this->Crud->update_data(['id'=>$id],['status'=>1,'update'=>date('Y-m-d H:i:s')],'transaksi');
            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Info! Data Berhasil diverifikasi.
            </div>');
            redirect('admin/Transaksi/verifikasiPerusahaan','refresh');
        }
    }

    public function proses(){
        $data['transaksi'] = $this->Crud->edit_data(['status'=>1],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiProses',$data);
        $this->load->view('admin/v_footer');
    }

    public function aksi_proses($id){
            $this->Crud->update_data(['id'=>$id],['status'=>2,'update'=>date('Y-m-d H:i:s')],'transaksi');
            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Info! Data Berhasil diproses.
            </div>');
            redirect('admin/Transaksi/proses','refresh');
    }

    public function kirim(){
        $data['transaksi'] = $this->Crud->edit_data(['status'=>2],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiKirim',$data);
        $this->load->view('admin/v_footer');
    }

    public function aksi_kirim($id){
        $this->Crud->update_data(['id'=>$id],['status'=>3,'update'=>date('Y-m-d H:i:s')],'transaksi');
        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fas fa-info"></i> Info! Data Berhasil dikirim.
        </div>');
        redirect('admin/Transaksi/kirim','refresh');
    }

    public function selesai(){
        $data['transaksi'] = $this->Crud->edit_data(['status'=>3],'transaksi')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_transaksiSelesai',$data);
        $this->load->view('admin/v_footer');
    }

}

/* End of file Transaksi.php */
 ?>