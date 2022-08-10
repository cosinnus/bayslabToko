<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    //halaman utama panel dashboard admin 
    public function index()
    {   
        $data = array( 'title' => 'Silakan Belanja di Website Kami',
                        'isi'   => 'home/list' 
                     );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Home.php and path \application\controllers\Home.php */
