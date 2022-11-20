<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKeputusan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPengajuan');
    }


    public function index()
    {
        $data = array(
            'pengajuan' => $this->mPengajuan->select(),
            'detail' => $this->mPengajuan->info_keputusan()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vKeputusan', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function keputusan($id)
    {
        $acc = $this->input->post('acc');
        $data = array(
            'status_pengajuan' => $acc
        );
        $this->mPengajuan->keputusan($id, $data);
        $this->session->set_flashdata('success', 'Anda telah berhasil memberikan keputusan!');
        redirect('KepalaDesa/cKeputusan');
    }
    public function asset_keputusan($id)
    {
        $data = array(
            'tgl_kep' => $this->input->post('tgl'),
            'nama_asset_kep' => $this->input->post('asset'),
            'id_pengajuan' => $id
        );
        $this->mPengajuan->asset_kep($data);

        $data_status = array(
            'status_pengajuan' => '2'
        );
        $this->mPengajuan->keputusan($id, $data_status);
        $this->session->set_flashdata('success', 'Anda telah berhasil menambahkan asset keputusan!');
        redirect('KepalaDesa/cKeputusan');
    }
}

/* End of file cKeputusan.php */
