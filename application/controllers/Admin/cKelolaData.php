<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKelolaData extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKelolaData');
    }


    //kategori
    public function kategori()
    {
        $data = array(
            'kategori' => $this->mKelolaData->select_kategori()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/kategori/vkategori', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createkategori()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->mKelolaData->insert_kategori($data);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Disimpan!');
        redirect('Admin/cKelolaData/kategori');
    }
    public function updatekategori($id)
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama')
        );
        $this->mKelolaData->updatekategori($id, $data);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Update!');
        redirect('Admin/cKelolaData/kategori');
    }
    public function deletekategori($id)
    {
        $this->mKelolaData->deletekategori($id);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
        redirect('Admin/cKelolaData/kategori');
    }

    //barang
    public function barang()
    {
        $data = array(
            'barang' => $this->mKelolaData->select_barang()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/barang/vbarang', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createbarang()
    {
        $data = array(
            'nama_barang' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->mKelolaData->insert_barang($data);
        $this->session->set_flashdata('success', 'Data Barang Berhasil Ditambahkan!');
        redirect('Admin/cKelolaData/barang');
    }
    public function updatebarang($id)
    {
        $data = array(
            'nama_barang' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->mKelolaData->updatebarang($id, $data);
        $this->session->set_flashdata('success', 'Data Barang Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/barang');
    }
    public function deletebarang($id)
    {
        $this->mKelolaData->deletebarang($id);
        $this->session->set_flashdata('success', 'Data Barang Berhasil Dihapus!');
        redirect('Admin/cKelolaData/barang');
    }

    //lokasi
    public function lokasi()
    {
        $data = array(
            'lokasi' => $this->mKelolaData->select_lokasi()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/lokasi/vlokasi', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createlokasi()
    {
        $data = array(
            'nama_lokasi' => $this->input->post('nama'),
            'alamat_lengkap' => $this->input->post('alamat')
        );
        $this->mKelolaData->insert_lokasi($data);
        $this->session->set_flashdata('success', 'Data Lokasi Berhasil Disimpan!');
        redirect('Admin/cKelolaData/lokasi');
    }
    public function updatelokasi($id)
    {
        $data = array(
            'nama_lokasi' => $this->input->post('nama'),
            'alamat_lengkap' => $this->input->post('alamat')
        );
        $this->mKelolaData->updatelokasi($id, $data);
        $this->session->set_flashdata('success', 'Data Lokasi Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/lokasi');
    }
    public function deletelokasi($id)
    {
        $this->mKelolaData->deletelokasi($id);
        $this->session->set_flashdata('success', 'Data Lokasi Berhasil Dihapus!');
        redirect('Admin/cKelolaData/lokasi');
    }


    //user
    public function user()
    {
        $data = array(
            'user' => $this->mKelolaData->select_user()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/user/vuser', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createuser()
    {
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level'),
        );
        $this->mKelolaData->insert_user($data);
        $this->session->set_flashdata('success', 'Data User Berhasil Disimpan!');
        redirect('Admin/cKelolaData/user');
    }
    public function updateuser($id)
    {
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level'),
        );
        $this->mKelolaData->updateuser($id, $data);
        $this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
        redirect('Admin/cKelolaData/user');
    }
    public function deleteuser($id)
    {
        $this->mKelolaData->delete($id);
        $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
        redirect('Admin/cKelolaData/user');
    }
}

/* End of file cKelolaData.php */
