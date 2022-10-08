<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKelolaData extends CI_Model
{
    //kategori
    public function select_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get()->result();
    }
    public function insert_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function updatekategori($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }
    public function deletekategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    //barang
    public function select_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->get()->result();
    }
    public function insert_barang($data)
    {
        $this->db->insert('barang', $data);
    }
    public function updatebarang($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('barang', $data);
    }
    public function deletebarang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }

    //lokasi
    public function select_lokasi()
    {
        $this->db->select('*');
        $this->db->from('lokasi_asset');
        return $this->db->get()->result();
    }
    public function insert_lokasi($data)
    {
        $this->db->insert('lokasi_asset', $data);
    }
    public function updatelokasi($id, $data)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi_asset', $data);
    }
    public function deletelokasi($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('lokasi_asset');
    }

    //user
    public function select_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }
    public function insert_user($data)
    {
        $this->db->insert('user', $data);
    }
    public function updateuser($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}

/* End of file mKelolaData.php */
