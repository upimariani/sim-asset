<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
    public function total()
    {
        $data['monitoring'] = $this->db->query("SELECT COUNT(id_monitoring) as jml_monitoring FROM `monitoring`;")->row();
        $data['pengajuan'] = $this->db->query("SELECT COUNT(id_pengajuan) as jml_pengajuan FROM `pengajuan` WHERE status_pengajuan='2';")->row();
        $data['asset'] = $this->db->query("SELECT COUNT(id_asset) as jml_asset FROM `asset`;")->row();
        $data['user'] = $this->db->query("SELECT COUNT(id_user) as jml_user FROM `user`;")->row();
        return $data;
    }
}

/* End of file mDashboard.php */
