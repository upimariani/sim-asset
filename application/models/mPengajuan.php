<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPengajuan extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('pengajuan', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('monitoring', 'pengajuan.id_monitoring = monitoring.id_monitoring', 'left');
        $this->db->join('asset', 'asset.id_asset = monitoring.id_asset', 'left');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('user', 'user.id_user = pengajuan.id_user', 'left');
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('monitoring', 'pengajuan.id_monitoring = monitoring.id_monitoring', 'left');
        $this->db->join('asset', 'asset.id_asset = monitoring.id_asset', 'left');
        $this->db->join('barang', 'barang.id_barang = asset.id_barang', 'left');
        $this->db->join('user', 'user.id_user = pengajuan.id_user', 'left');
        $this->db->where('id_pengajuan', $id);
        return $this->db->get()->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_pengajuan', $id);
        $this->db->update('pengajuan', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_pengajuan', $id);
        $this->db->delete('pengajuan');
    }

    //keputusan kepala desa
    public function keputusan($id, $data)
    {
        $this->db->where('id_pengajuan', $id);
        $this->db->update('pengajuan', $data);
    }
    public function asset_kep($data)
    {
        $this->db->insert('asset_kep', $data);
    }
    public function info_keputusan()
    {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('asset_kep', 'pengajuan.id_pengajuan = asset_kep.id_pengajuan', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mPengajuan.php */