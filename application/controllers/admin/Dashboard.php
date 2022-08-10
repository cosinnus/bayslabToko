<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //untuk proteksi halaman
        $this->simple_login->cek_login();
    }
    //halaman beranda dashboard
    public function index()
    {
        $data = array( 'title' => 'Halaman Dashboard',
                        'isi'   => 'admin/dashboard/list' );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php and path \application\controllers\admin\Dashboard.php */
