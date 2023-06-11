<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{
    public function asset()
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('lokasi_asset', 'lokasi_asset.id_lokasi = asset.id_lokasi', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = asset.id_kategori', 'left');
        return $this->db->get()->result();
    }

    public function asset_kategori($id)
    {
        $this->db->select('*');
        $this->db->from('asset');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('lokasi_asset', 'lokasi_asset.id_lokasi = asset.id_lokasi', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = asset.id_kategori', 'left');
        $this->db->where('asset.id_kategori', $id);
        return $this->db->get()->result();
    }

    public function pengajuan()
    {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('monitoring', 'monitoring.id_monitoring = pengajuan.id_monitoring', 'left');
        $this->db->join('asset_kep', 'asset_kep.id_pengajuan = pengajuan.id_pengajuan', 'left');

        $this->db->join('asset', 'asset.id_asset = monitoring.id_asset', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mLaporan.php */
