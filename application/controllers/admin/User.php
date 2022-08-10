<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

    //untuk meload model yang akan digunakan
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        //proteksi halaman
        $this->simple_login->cek_login();
    }

    //untuk menampilkan data user
    public function index()
    {   
        $user = $this->user_model->listing();
        $data = array( 'title' => 'Data User',
                        'user' => $user,
                        'isi' => 'admin/user/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);  
    }

    //untuk menambah data user
    public function tambah()
    {   
        //untuk validasi inputan
        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama lengkap','required',
                            array('required' => '%s harus diisi'));
        $valid->set_rules('email','Email','required|valid_email',
                            array('required' => '%s harus diisi',
                                  'valid_email' => '%s tidak valid'));
        $valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[users.username]',
                            array('required' => '%s harus diisi',
                                  'min_length' => '%s minimal 6 karakter',
                                  'max_length' => '%s maksimal 32 karakter',
                                  'is_unique' => '%s sudah ada'));
        $valid->set_rules('password','Password','required',
                            array('required' => '%s harus diisi'));
        
        if($valid->run() === FALSE) {
            //end validasi
            $data = array( 'title' => 'Tambah User',
                            'isi' => 'admin/user/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            //kalau validasi berhasil
            $i = $this->input;
            $data = array( 'nama' => $i->post('nama'),
                            'email' => $i->post('email'),
                            'username' => $i->post('username'),
                            'password' => sha1($i->post('password')),
                            'akses_level' => $i->post('akses_level')
                        );
            $this->user_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/user'), 'refresh');
        }
    }

    //untuk edit data user
    public function edit($id_user)
    {   
        $user = $this->user_model->detail($id_user);

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
            $data = array( 'title' => 'Edit User',
                            'user' => $user,
                            'isi' => 'admin/user/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            //kalau validasi berhasil
            $i = $this->input;
            $data = array(  'id_user' => $id_user,
                            'nama' => $i->post('nama'),
                            'email' => $i->post('email'),
                            'username' => $i->post('username'),
                            'password' => sha1($i->post('password')),
                            'akses_level' => $i->post('akses_level')
                        );
            $this->user_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/user'), 'refresh');
        }
    }

    //untuk menghapus data user
    public function delete($id_user)
    {   
        $data = array('id_user' => $id_user);

        $this->user_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/user'), 'refresh');
    }
}

/* End of file User.php and path \application\controllers\User.php */
