<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class User_model extends CI_Model 
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
        $this->db->from('users');
        $this->db->order_by('id_user', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    //untuk menampilkan detail data user
    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id_user', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    //untuk menampilkan login user
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array( 'username' => $username, 'password' => sha1($password)));
        $this->db->order_by('id_user', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
    //untuk menampilkan tambah data user
    public function tambah($data)
    {
        $this->db->insert('users', $data);

    }

    //untuk edit data user
    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('users', $data);
    }

    //untuk delete data user
    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('users', $data);
    }
                        
}


/* End of file User_model_model.php and path \application\models\User_model_model.php */
