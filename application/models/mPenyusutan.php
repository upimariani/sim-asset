<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPenyusutan extends CI_Model
{
    public function select($id)
    {
        $data['asset'] = $this->db->query("SELECT * FROM `asset` JOIN barang ON asset.id_barang=barang.id_barang WHERE id_asset='" . $id . "'")->row();
        $data['penyusutan'] = $this->db->query("SELECT * FROM `penyusutan` JOIN asset ON penyusutan.id_asset=asset.id_asset WHERE penyusutan.id_asset='" . $id . "'")->result();
        return $data;
    }
    public function insert($data)
    {
        $this->db->insert('penyusutan', $data);
    }
    public function cek_status_hapus($id)
    {
        return $this->db->query("SELECT * FROM `penyusutan` WHERE status_asset='1' AND id_asset='" . $id . "'")->row();
    }
}


/* End of file mPenyusutan.php */
