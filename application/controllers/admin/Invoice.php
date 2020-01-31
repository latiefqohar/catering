<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_admin');
        
    }
    

    public function index()
    {
        $data['invoice'] = $this->Model_admin->invoice();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_invoice', $data);
        $this->load->view('admin/v_footer');
    }

    public function add(){
        $data['perusahaan'] = $this->Crud->get_data('perusahaan')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_invoiceAdd',$data);
        $this->load->view('admin/v_footer');
    }

    public function actionAdd(){
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $periode = $bulan."-".$tahun;
        $perusahaan = $this->input->post('perusahaan');
        $cek=$this->db->query("select *  from transaksi where  DATE_FORMAT(waktu,'%m-%Y')='".$periode."' and id_invoice is NULL and id_perusahaan='".$perusahaan."'")->num_rows();
        if ($cek< 1) {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> GAGAL! Invoice sudah dibuat.
            </div>');
            redirect('admin/Invoice/add','refresh');
        }else{
            $invoice = "INV/".date('ymdHi')."/".date('Y');
            $dataInv = array(
                'no_invoice' => $invoice,
                'id_perusahaan' => $perusahaan,
                'periode' => $bulan."-".$tahun,
                'tanggal_invoice' => date('Y-m-d H:i:s')
            );
            $this->Crud->insert_data($dataInv,'invoice');
            $invoice_terakhir = $this->Model_admin->invoice_terakhir($perusahaan);
            $id_invoice = $invoice_terakhir['id'];
            $this->Model_admin->update_invoice($id_invoice,$periode,$perusahaan);
            $datajumlah=$this->Model_admin->jumlah_invoice($id_invoice);
            $total_invoice=$datajumlah['jumlah'];
            $tes=$this->Crud->update_data(['id'=>$id_invoice],['jumlah'=>$total_invoice],'invoice');
            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-info"></i> Info! Invoice berhasil dibuat.
            </div>');
            redirect('admin/Invoice','refresh');
        }
       
    }

    public function detail($id){
        $data['invoice'] = $this->Model_admin->detail_invoice($id);
        $data['transaksi'] = $this->Crud->edit_data(['id_invoice'=>$id],'transaksi')->result();
        $this->load->view('admin/v_detailInvoice',$data);
    }
    
    public function print($id){
        $data['invoice'] = $this->Model_admin->detail_invoice($id);
        $data['transaksi'] = $this->Crud->edit_data(['id_invoice'=>$id],'transaksi')->result();
        $this->load->view('admin/v_printInvoice',$data);
    }

}

/* End of file Invoice.php */
 ?>