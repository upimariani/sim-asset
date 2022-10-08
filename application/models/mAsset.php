<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAsset extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('asset', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('lokasi_asset', 'lokasi_asset.id_lokasi = asset.id_lokasi', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = asset.id_kategori', 'left');
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('lokasi_asset', 'lokasi_asset.id_lokasi = asset.id_lokasi', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = asset.id_kategori', 'left');
        $this->db->where('id_asset', $id);
        return $this->db->get()->row();
    }
    public function update($id, $data)
    {
        $this->db->where('id_asset', $id);
        $this->db->update('asset', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_asset', $id);
        $this->db->delete('asset');
    }
}

/* End of file mAsset.php */
