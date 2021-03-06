<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('login')!=1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Anda Belom Login
            </div>');
            redirect('Auth','refresh');
        }
        $data['pesanan_baru']=$this->Crud->edit_data(['status'=>0],'transaksi')->num_rows();
        $data['menunggu_proses']=$this->Crud->edit_data(['status'=>1],'transaksi')->num_rows();
        $data['sedang_diproses']=$this->Crud->edit_data(['status'=>2],'transaksi')->num_rows();
        $data['selesai']=$this->Crud->edit_data(['status'=>3],'transaksi')->num_rows();
        $data['invoice_pending']=$this->Crud->edit_data(['status_invoice'=>0],'invoice')->num_rows();
        $data['invoice_selesai']=$this->Crud->edit_data(['status_invoice'=>1],'invoice')->num_rows();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_dashboard', $data);
        $this->load->view('admin/v_footer');
        }

}

/* End of file Dashboard.php */
 ?>