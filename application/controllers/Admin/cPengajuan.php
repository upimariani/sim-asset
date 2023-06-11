<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengajuan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPengajuan');
        $this->load->model('mMonitoring');
    }

    public function index()
    {
        $data = array(
            'pengajuan' => $this->mPengajuan->select(),
            'detail' => $this->mPengajuan->info_keputusan()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/pengajuan/vpengajuan', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('asset', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('date', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('jml', 'Hasil Monitoring', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'monitoring' => $this->mMonitoring->select()
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/pengajuan/vcreatepengajuan', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $data = array(
                'id_monitoring' => $this->input->post('asset'),
                'id_user' => $this->session->userdata('id'),
                'tgl_pengajuan' => $this->input->post('date'),
                'total_pengajuan' => $this->input->post('jml'),
                'status_pengajuan' => '0',
            );
            $this->mPengajuan->insert($data);
            $this->session->set_flashdata('success', 'Data Pengajuan Berhasil Diajukkan! Mohon menunggu konfirmasi dari Kepala Desa');
            redirect('Admin/cPengajuan');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('asset', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('date', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('jml', 'Hasil Monitoring', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'monitoring' => $this->mMonitoring->select(),
                'pengajuan' => $this->mPengajuan->edit($id)
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/pengajuan/vUpdatePengajuan', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $data = array(
                'id_monitoring' => $this->input->post('asset'),
                'id_user' => $this->session->userdata('id'),
                'tgl_pengajuan' => $this->input->post('date'),
                'total_pengajuan' => $this->input->post('jml'),
                'status_pengajuan' => '0',
            );
            $this->mPengajuan->update($id, $data);
            $this->session->set_flashdata('success', 'Data Pengajuan Berhasil Diperbaharui!');
            redirect('Admin/cPengajuan');
        }
    }
    public function delete($id)
    {
        $this->mPengajuan->delete($id);
        $this->session->set_flashdata('success', 'Data Pengajuan Berhasil Dihapus!');
        redirect('Admin/cPengajuan');
    }
}

/* End of file cPengajuan.php */
