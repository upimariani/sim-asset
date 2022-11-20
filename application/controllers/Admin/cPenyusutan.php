<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPenyusutan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAsset');
        $this->load->model('mPenyusutan');
    }


    public function index()
    {
        $data = array(
            'asset' => $this->mAsset->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Penyusutan/vpenyusutan', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function detail($id)
    {
        $data = array(
            'detail' => $this->mPenyusutan->select($id)
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Penyusutan/vDetailpenyusutan', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function create($id)
    {
        $chekbox = $this->input->post('hapus');
        if (!$chekbox == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
        $data = array(
            'id_asset' => $id,
            'ket_penyusutan' => $this->input->post('keterangan'),
            'min_harga' => $this->input->post('harga'),
            'status_asset' => $status
        );
        $this->mPenyusutan->insert($data);
        $this->session->set_flashdata('success', 'Data Penyusutan Harga Asset Berhasil Disimpan!!');
        redirect('Admin/cPenyusutan/detail/' . $id);
    }
}

/* End of file cPenyusutan.php */
