<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
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

	//untuk checkout
	public function checkout()
	{
		//untuk cek user login atau tidak
		if($this->session->userdata('email')){
			$email = $this->session->userdata('email');
			$nama_pelanggan = $this->session->userdata('nama_pelanggan');
			$pelanggan = $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

			$keranjang = $this->cart->contents();

			$data = array( 	'title' 	=> 'Checkout Belanja Anda',
							'keranjang' => $keranjang,
							'pelanggan' => $pelanggan,
							'isi' 		=> 'belanja/checkout'
						);
						$this->load->view('layout/wrapper', $data, FALSE);
		} else {
			//jika belum login makan ada notif seperti ini
			$this->session->set_flashdata('sukses', 'Silakan login atau register dulu !!');
			redirect(base_url('registrasi'),'refresh');
		}
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

	//untuk update cart
	public function update_cart($rowid)
	{
		//jika ada data
		if($rowid){
			$data = array( 'rowid' => $rowid,
						   'qty' => $this->input->post('qty')	
						);
						$this->cart->update($data);
						$this->session->set_flashdata('sukses', 'Data has been updated');
						redirect(base_url('belanja'), 'refresh');
		} else {
			//jika tidak ada rowid

			redirect(base_url('belanja'), 'refresh');
		}
	}

	//untuk hapus semua data belanja di keranjang
	public function hapus($rowid='')
	{	
		if($rowid){
			//kode hapus per item
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Data keranjang belanja sudah dihapus');
			redirect(base_url('belanja'), 'refresh');
		} else {
			//kode untuk hapus semua
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Seluruh data keranjang belanja sudah dihapus');
			redirect(base_url('belanja'), 'refresh');
		}
		
	}
}

/* End of file Belanja.php and path \application\controllers\Belanja.php */
