<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

    public function data_transaksi($id){
        return $this->db->select('a.*,b.*')->from('keranjang a')->join('menu b','a.id_menu=b.id')->where('a.id_transaksi',$id)->get()->result();
    }

}

/* End of file Model_admin.php */
 ?>