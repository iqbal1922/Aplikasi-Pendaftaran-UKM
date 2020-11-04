<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
        $this->load->library('form_validation');
    }

    public function create()
    {
        $this->validation();
        if ($this->form_validation->run() == FALSE) {
            $this->message = "Komponen Mahasiswa Wajib Diisi !";
            $this->session->set_flashdata('warning', $this->message);
            redirect('admin/mahasiswa');
        } else {
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
            $this->db->insert('mahasiswa', $query);
            $this->message = "Data Mahasiswa Berhasil Disimpan !";
            $this->session->set_flashdata('success', $this->message);
            redirect('admin/mahasiswa');
        }
    }

    public function get($id)
    {
        $result = $this->mahasiswa_model->getMahasiswaId($id);
        echo json_encode($result);
    }

    public function update()
    {
        $this->mahasiswa_model->update();
        $this->message = "Data Mahasiswa Berhasil Diubah !";
        $this->session->set_flashdata('success', $this->message);
        redirect('admin/Mahasiswa');
    }

    public function destroy($id)
    {
        $this->mahasiswa_model->delete($id);
        $this->message = "Data Mahasiswa Berhasil Dihapus !";
        $this->session->set_flashdata('success', $this->message);
        redirect('admin/mahasiswa');
    }

    public  function validation()
    {
        $this->form_validation->set_rules('nim', '', 'required');
        $this->form_validation->set_rules('nama_mahasiswa', '', 'required');
        $this->form_validation->set_rules('tempat_lahir', '', 'required');
        $this->form_validation->set_rules('tanggal_lahir', '', 'required');
        $this->form_validation->set_rules('alamat', '', 'required');
        $this->form_validation->set_rules('kelas', '', 'required');
        $this->form_validation->set_rules('jurusan', '', 'required');
        $this->form_validation->set_rules('rombel', '', 'required');
    }
}

/* End of file Mahasiswa.php */
