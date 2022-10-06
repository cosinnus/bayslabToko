<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('konfigurasi_model');
    }

    //halaman untuk belanja
    public function index()
    {
        $keranjang = $this->cart->contents();

        $data = array( 'title' => 'Cart Belanja Anda',
                       'keranjang' => $keranjang,
                       'isi' => 'belanja/list'
                    );
                    $this->load->view('layout/wrapper', $data, FALSE);
    }

    //tambah ke keranjang belanja
    public function add()
    {   
        //untuk ambil data dari form
        $id             = $this->input->post('id');
        $qty            = $this->input->post('qty');
        $price          = $this->input->post('price');
        $name           = $this->input->post('name');
        $redirect_page  = $this->input->post('redirect_page');
        
        //proses masuk ke keranjang belanja
        $data = array( 'id'  => $id,
                       'qty' => $qty,
                       'price' => $price,
                       'name' => $name,
                       'redirect_page' => $redirect_page
                     );
        $this->cart->insert($data);
        redirect($redirect_page,'refresh');
    }
}

/* End of file Belanja.php and path \application\controllers\Belanja.php */
