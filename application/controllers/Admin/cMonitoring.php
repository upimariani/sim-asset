<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cMonitoring extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mMonitoring');
        $this->load->model('mAsset');
    }
    public function index()
    {
        $data = array(
            'monitoring' => $this->mMonitoring->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/monitoring/vmonitoring', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('asset', 'Asset', 'required');
        $this->form_validation->set_rules('date', 'Tanggal Monitoring', 'required');
        $this->form_validation->set_rules('hasil', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('faktor', 'Faktor Penyebab', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'asset' => $this->mAsset->select()
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/monitoring/vcreatemonitoring', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $config['upload_path']          = './asset/asset-monitoring';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'asset' => $this->mAsset->select()
                );
                $this->load->view('Admin/Layout/head');
                $this->load->view('Admin/Layout/aside');
                $this->load->view('Admin/monitoring/vcreatemonitoring', $data);
                $this->load->view('Admin/Layout/footer');
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'id_asset' => $this->input->post('asset'),
                    'tgl_monitoring' => $this->input->post('date'),
                    'hasil_monitoring' => $this->input->post('hasil'),
                    'gambar_asset_monitoring' => $upload_data['file_name'],
                    'faktor_penyebab' => $this->input->post('faktor'),
                );
                $this->mMonitoring->insert($data);
                $this->session->set_flashdata('success', 'Data Monitoring Berhasil Ditambahkan!');
                redirect('Admin/cMonitoring');
            }
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('asset', 'Asset', 'required');
        $this->form_validation->set_rules('date', 'Tanggal Monitoring', 'required');
        $this->form_validation->set_rules('hasil', 'Hasil Monitoring', 'required');
        $this->form_validation->set_rules('faktor', 'Faktor Penyebab', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'asset' => $this->mAsset->select(),
                'monitoring' => $this->mMonitoring->edit($id)
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/monitoring/vupdatemonitoring', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $config['upload_path']          = './asset/asset-monitoring';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'asset' => $this->mAsset->select(),
                    'monitoring' => $this->mMonitoring->edit($id)
                );
                $this->load->view('Admin/Layout/head');
                $this->load->view('Admin/Layout/aside');
                $this->load->view('Admin/monitoring/vupdatemonitoring', $data);
                $this->load->view('Admin/Layout/footer');
            } else {

                $monitoring = $this->mMonitoring->edit($id);
                $as = './asset/asset-monitoring/' . $monitoring->gambar_asset_monitoring;
                unlink($as);


                $upload_data = $this->upload->data();
                $data = array(
                    'id_asset' => $this->input->post('asset'),
                    'tgl_monitoring' => $this->input->post('date'),
                    'hasil_monitoring' => $this->input->post('hasil'),
                    'gambar_asset_monitoring' => $upload_data['file_name'],
                    'faktor_penyebab' => $this->input->post('faktor'),
                );
                $this->mMonitoring->update($id, $data);
                $this->session->set_flashdata('success', 'Data Monitoring Berhasil Diperbaharui!');
                redirect('Admin/cMonitoring');
            }
            $data = array(
                'id_asset' => $this->input->post('asset'),
                'tgl_monitoring' => $this->input->post('date'),
                'hasil_monitoring' => $this->input->post('hasil'),
                'faktor_penyebab' => $this->input->post('faktor'),
            );
            $this->mMonitoring->update($id, $data);
            $this->session->set_flashdata('success', 'Data Monitoring Berhasil Diperbaharui!');
            redirect('Admin/cMonitoring');
        }
    }
    public function delete($id)
    {
        $this->mMonitoring->delete($id);
        $this->session->set_flashdata('success', 'Data Monitoring Berhasil Dihapus!');
        redirect('Admin/cMonitoring');
    }
}

/* End of file cMonitoring.php */
