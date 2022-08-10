<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Produk extends CI_Controller {

    //untuk meload model yang akan digunakan
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //untuk menampilkan data produk
    public function index()
    {   
        $produk = $this->produk_model->listing();
        $data = array( 'title' => 'Data Produk',
                        'produk' => $produk,
                        'isi' => 'admin/produk/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);  
    }

    //untuk menambah data produk
    public function tambah()
    {   
        $kategori = $this->kategori_model->listing();

        //untuk validasi inputan
        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama lengkap','required',
                            array('required' => '%s harus diisi'));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => '%s harus diisi',
                                  'valid_email' => '%s tidak valid'));
        $valid->set_rules('produkname','Produkname','required|min_length[6]|max_length[32]|is_unique[produks.produkname]',
                            array('required' => '%s harus diisi',
                                  'min_length' => '%s minimal 6 karakter',
                                  'max_length' => '%s maksimal 32 karakter',
                                  'is_unique' => '%s sudah ada'));
        $valid->set_rules('password','Password','required',
                            array('required' => '%s harus diisi'));
        
        if($valid->run() === FALSE) {
            //end validasi
            $data = array( 'title' => 'Tambah Produk',
                            'kategori' => $kategori,
                            'isi' => 'admin/produk/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            //kalau validasi berhasil
            $i = $this->input;
            $data = array( 'nama' => $i->post('nama'),
                            'email' => $i->post('email'),
                            'produkname' => $i->post('produkname'),
                            'password' => sha1($i->post('password')),
                            'akses_level' => $i->post('akses_level')
                        );
            $this->produk_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/produk'), 'refresh');
        }
    }

    //untuk edit data produk
    public function edit($id_produk)
    {   
        $produk = $this->produk_model->detail($id_produk);

        //untuk validasi inputan
        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama lengkap','required',
                            array('required' => '%s harus diisi'));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => '%s harus diisi',
                                  'valid_email' => '%s tidak valid'));
        $valid->set_rules('password','Password','required',
                            array('required' => '%s harus diisi'));
        
        if($valid->run() === FALSE) {
            //end validasi
            $data = array( 'title' => 'Edit Produk',
                            'produk' => $produk,
                            'isi' => 'admin/produk/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            //kalau validasi berhasil
            $i = $this->input;
            $data = array(  'id_produk' => $id_produk,
                            'nama' => $i->post('nama'),
                            'email' => $i->post('email'),
                            'produkname' => $i->post('produkname'),
                            'password' => sha1($i->post('password')),
                            'akses_level' => $i->post('akses_level')
                        );
            $this->produk_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/produk'), 'refresh');
        }
    }

    //untuk menghapus data produk
    public function delete($id_produk)
    {   
        $data = array('id_produk' => $id_produk);

        $this->produk_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/produk'), 'refresh');
    }
}

/* End of file Produk.php and path \application\controllers\Produk.php */
