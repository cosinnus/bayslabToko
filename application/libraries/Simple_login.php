<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
    protected $CI;
    public function __construct()
    {
        $this->CI =& get_instance();
        //untuk meload data model user
        $this->CI->load->model('user_model');
    }

    //membuat fungsi login
    public function login($username, $password)
    {
        $check = $this->CI->user_model->login($username, $password);
        //jika ada data user yang cocok, maka akan di set session
        if($check){
            $id_user = $check->id_user;
            $nama = $check->nama;
            $akses_level = $check->akses_level;
            //membuat session
            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('akses_level', $akses_level);
            //jika berhasil login maka akan di redirect ke halaman admin
            redirect(base_url('admin/dashboard'), 'refresh');
        } else {
            //jika tidak ada data user yang cocok, maka akan dikembalikan ke halaman login
            $this->CI->session->set_flashdata('warning', 'Username atau Password salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    //membuat fungsi cek_login
    public function cek_login()
    {
        //periksa apakah sudah ada session
        if($this->CI->session->userdata('username') == ""){
            $this->CI->session->set_flashdata('warning', 'Login dulu masszeh!!');
            redirect(base_url('login'), 'refresh'); 
        }
    }

    //membuat fungsi logout
    public function logout()
    {
        //mengahapus session
            $this->CI->session->unset_userdata('id_user');
            $this->CI->session->unset_userdata('nama');
            $this->CI->session->unset_userdata('username');
            $this->CI->session->unset_userdata('akses_level');

            $this->CI->session->set_flashdata('sukses', 'Terima kasih masszeh!!');
            redirect(base_url('login'), 'refresh'); 
    }

}
/* End of file Libraries.php and path \application\libraries\Libraries.php */
