<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Pelanggan_model extends CI_Model 
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
        $this->db->from('pelanggan');
        $this->db->order_by('id_pelanggan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    //untuk menampilkan detail data pelanggan
    public function detail($id_pelanggan)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->order_by('id_pelanggan', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

	//pelanggan sudah login
	public function sudah_login($email, $nama_pelanggan)
	{
		$this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('email', $email);
		$this->db->where('nama_pelanggan', $nama_pelanggan);
        $this->db->order_by('id_pelanggan', 'DESC');
        $query = $this->db->get();
        return $query->row();
	}

    //untuk menampilkan login user
    public function login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where(array( 'email' => $email,
							    'password' => sha1($password)));
        $this->db->order_by('id_pelanggan', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
    //untuk menampilkan tambah data user
    public function tambah($data)
    {
        $this->db->insert('pelanggan', $data);

    }

    //untuk edit data user
    public function edit($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('pelanggan', $data);
    }

    //untuk delete data user
    public function delete($data)
    {
        $this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->delete('pelanggan', $data);
    }
                        
}


/* End of file Pelanggan_model_model.php and path \application\models\Pelanggan_model_model.php */
