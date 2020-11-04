<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ukm_model extends CI_Model
{

    public function getUkm()
    {
        $query = $this->db->get('ukm');
        return $query->result_array();
    }

    public function delete($id)
    {
        $this->db->where('id_ukm', $id);
        $this->db->delete('ukm');
    }

    public function updateUkm()
    {
        $query = array(
            'nama_ukm' => $this->input->post('nama_ukm'),
            'penanggung_jawab' => $this->input->post('penanggung_jawab'),
            'lokasi' => $this->input->post('lokasi'),
            'hari' => $this->input->post('hari'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
        );
        $this->db->where('id_ukm', $this->input->post('id_ukm'));
        $this->db->update('ukm', $query);
    }

    public function getUkmId($id)
    {
        return $this->db->get_where('ukm', array('id_ukm' => $id))->row_array();
    }

    public function getData($id_ukm)
    {
        $this->db->select('mahasiswa.id_mahasiswa as id_mahasiswa');
        $this->db->select('mahasiswa.nim as nim');
        $this->db->select('mahasiswa.nama_mahasiswa as nama_mahasiswa');
        $this->db->select('mahasiswa.kelas as kelas');
        $this->db->select('mahasiswa.jurusan as jurusan');
        $this->db->select('mahasiswa.rombel as rombel');
        $this->db->select('registrasi.tanggal_daftar as tanggal_daftar');
        $this->db->select('ukm.id_ukm as id_ukm');
        $this->db->from('mahasiswa');
        $this->db->join('registrasi', 'registrasi.id_mahasiswa = mahasiswa.id_mahasiswa');
        $this->db->join('ukm', 'ukm.id_ukm = registrasi.id_ukm');
        $this->db->where('registrasi.id_ukm', $id_ukm);
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_pendaftar($id_ukm, $id_mahasiswa)
    {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->where('id_ukm', $id_ukm);
        $this->db->delete('registrasi');
    }
}


/* End of file ukm_model.php */
