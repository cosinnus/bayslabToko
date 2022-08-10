<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Kategori_model extends CI_Model 
{
    //untuk meload model yang akan digunakan
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //untuk menampilkan list data user
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    //untuk menampilkan detail data user
    public function detail($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->order_by('id_kategori', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    //untuk menampilkan login user
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where(array( 'username' => $username, 'password' => sha1($password)));
        $this->db->order_by('id_kategori', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
    //untuk menampilkan tambah data user
    public function tambah($data)
    {
        $this->db->insert('kategori', $data);

    }

    //untuk edit data user
    public function edit($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('kategori', $data);
    }

    //untuk delete data user
    public function delete($data)
    {
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->delete('kategori', $data);
    }
                        
}


/* End of file Kategori_model_model.php and path \application\models\Kategori_model_model.php */
