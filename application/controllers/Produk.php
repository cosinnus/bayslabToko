<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
    }

	//listing data produk
    public function index()
    {   
		$site = 			$this->konfigurasi_model->listing();
		$listing_kategori = $this->produk_model->listing_kategori();
		//ambil total data
		$total = 			$this->produk_model->total_produk();
		//untuk start paging
		$this->load->library('pagination');
		$config['base_url'] = base_url().'produk/index/';
		$config['total_rows'] = $total->total;
		$config['use_page_numbers'] =TRUE;
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="disbled"><li class="active>"<a href="#">';
		$config['last_tag_close'] = '<span class="sr-only"></a></li></li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';
		$config['first_url'] = base_url().'/produk/';

		$this->pagination->initialize($config);
		//ambil datanya
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$produk = $this->produk_model->produk($config['per_page'], $page);
		//untuk end paging

		$data = array( 'title' 				=> 'Produk '.$site->namaweb,
					   'site' 				=> $site,
					   'listing_kategori' 	=> $listing_kategori,
					   'produk' 			=> $produk,
					   'paging' 			=> $this->pagination->create_links(),
					   'isi' 				=> 'produk/list'
					);
					$this->load->view('layout/wrapper', $data, FALSE);
    }

	//listing data kategori
    public function kategori($slug_kategori)
    {   
		$kategori 			= $this->kategori_model->read($slug_kategori);
		$id_kategori 		= $kategori->id_kategori;		
		$site 				= $this->konfigurasi_model->listing();
		$listing_kategori 	= $this->produk_model->listing_kategori();
		//ambil total data
		$total 				= $this->produk_model->total_kategori($id_kategori);
		//untuk start paging
		$this->load->library('pagination');
		$config['base_url'] = base_url().'produk/kategori/'.$slug_kategori.'/index/';
		$config['total_rows'] = $total->total;
		$config['use_page_numbers'] =TRUE;
		$config['per_page'] = 3;
		$config['uri_segment'] = 5;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="disbled"><li class="active>"<a href="#">';
		$config['last_tag_close'] = '<span class="sr-only"></a></li></li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';
		$config['first_url'] = base_url().'/produk/kategori/'.$slug_kategori;

		$this->pagination->initialize($config);
		//ambil datanya
		$page = ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$produk = $this->produk_model->kategori($id_kategori, $config['per_page'], $page);
		//untuk end paging

		$data = array( 'title' 				=> $kategori->nama_kategori,
					   'site' 				=> $site,
					   'listing_kategori' 	=> $listing_kategori,
					   'produk' 			=> $produk,
					   'paging' 			=> $this->pagination->create_links(),
					   'isi' 				=> 'produk/list'
					);
					$this->load->view('layout/wrapper', $data, FALSE);
    }

	//detail produk
	public function detail($slug_produk)
	{
		$site 			= $this->konfigurasi_model->listing();
		$produk 		= $this->produk_model->read($slug_produk);
		$id_produk 		= $produk->id_produk;
		$gambar 		= $this->produk_model->gambar($id_produk);
		$produk_related = $this->produk_model->home();

		$data = array( 'title' 				=> $produk->nama_produk,
					   'site' 				=> $site,
					   'produk' 			=> $produk,
					   'produk_related'		=> $produk_related,
					   'gambar'				=> $gambar,
					   'isi' 				=> 'produk/detail'
					);
					$this->load->view('layout/wrapper', $data, FALSE);
	}
}

/* End of file Produk.php and path /application/controllers/Produk.php */
