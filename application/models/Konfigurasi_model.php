<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Konfigurasi_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //untuk listing
    public function listing()
    {
        $query = $this->db->get('konfigurasi');
        return $query->row();
    }
    //untuk edit
    public function edit($data)
    {
        $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
        $this->db->update('konfigurasi', $data);
    }
    //untuk load kategori produk
    public function nav_produk()
    {
        $this->db->select('produk.*,
                           kategori.nama_kategori,
                           kategori.slug_kategori,');
        $this->db->from('produk');
        //awal join

            $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');

        //akhir join
        $this->db->group_by('produk.id_kategori');
        $this->db->order_by('kategori.urutan', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
                        
}


/* End of file Konfigurasi_model.php and path \application\models\Konfigurasi_model.php */
