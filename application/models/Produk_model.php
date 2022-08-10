<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Produk_model extends CI_Model 
{
    //untuk meload model yang akan digunakan
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //untuk menampilkan list data produk
    public function listing()
    {
        $this->db->select('produk.*,
                           users.nama,
                           kategori.nama_kategori,
                           kategori.slug_kategori,
                        ');
        $this->db->from('produk');
        //awal join

            $this->db->join('users', 'users.id_user = produk.id_user', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');

        //akhir join
        $this->db->order_by('id_produk', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    //untuk menampilkan detail data produk
    public function detail($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    //untuk menampilkan login produk
    public function login($produkname, $password)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where(array( 'produkname' => $produkname, 'password' => sha1($password)));
        $this->db->order_by('id_produk', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
    //untuk menampilkan tambah data produk
    public function tambah($data)
    {
        $this->db->insert('produk', $data);

    }

    //untuk edit data produk
    public function edit($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data);
    }

    //untuk delete data produk
    public function delete($data)
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk', $data);
    }
                        
}


/* End of file Produk_model_model.php and path \application\models\Produk_model_model.php */
