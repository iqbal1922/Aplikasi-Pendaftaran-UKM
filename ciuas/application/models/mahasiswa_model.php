<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{

    public function getSiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function delete($id)
    {
        $this->db->where('id_mahasiswa', $id);
        $this->db->delete('mahasiswa');
    }

    public function update()
    {
        $query = array(
            'nim' => $this->input->post('nim'),
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'kelas' => $this->input->post('kelas'),
            'jurusan' => $this->input->post('jurusan'),
            'rombel' => $this->input->post('rombel')
        );
        $this->db->where('id_mahasiswa', $this->input->post('id_mahasiswa'));
        $this->db->update('mahasiswa', $query);
    }

    public function getMahasiswaId($id)
    {
        return $this->db->get_where('mahasiswa', array('id_mahasiswa' => $id))->row_array();
    }
}

/* End of file siswa_model.php */
