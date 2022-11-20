<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLaporan');
    }


    public function index()
    {
        $data = array(
            'asset' => $this->mLaporan->asset(),
            'pengajuan' => $this->mLaporan->pengajuan()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vLaporan', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
}

/* End of file cLaporan.php */
