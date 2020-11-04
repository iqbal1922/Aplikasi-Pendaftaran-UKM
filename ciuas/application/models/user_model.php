<?php


defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

    public function getAlluser($id)
    {
        return $this->db->from('user')
            ->where('id_user', $id)
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa = user.id_mahasiswa')
            ->get()
            ->result_array();
    }

    public function getAllukm()
    {
        $query = $this->db->get('ukm');
        return $query->result_array();
    }

    public function getAllregistrasi()
    {
        return $this->db->from('registrasi')
            ->join('ukm', 'ukm.id_ukm = registrasi.id_ukm')
            ->get()
            ->result_array();
    }

    public function getGaleri()
    {
        return $this->db->from('dokumentasi')
            ->join('ukm', 'ukm.id_ukm = dokumentasi.id_ukm')
            ->get()
            ->result_array();
    }
}

/* End of file user_model.php */
