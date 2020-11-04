<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{

    public function getAllmahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function getAllukm()
    {
        $query = $this->db->get('ukm');
        return $query->result_array();
    }

    public function getAllgaleri()
    {
        return $this->db->from('dokumentasi')
            ->join('ukm', 'ukm.id_ukm = dokumentasi.id_ukm')
            ->get()
            ->result_array();
    }

    public function getAllpengguna()
    {
        return $this->db->from('user')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa = user.id_mahasiswa')
            ->get()
            ->result_array();
    }

    public function getMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
    }
}



/* End of file admin_model.php */
