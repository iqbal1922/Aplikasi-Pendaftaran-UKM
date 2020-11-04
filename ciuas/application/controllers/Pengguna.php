<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna_model');
        $this->load->library('form_validation');
    }

    public function create()
    {
        $this->validation();
        if ($this->form_validation->run() == FALSE) {
            $this->message = "Komponen Pengguna Wajib Diisi !";
            $this->session->set_flashdata('warning', $this->message);
            redirect('admin/pengguna');
        } else {
            $this->pengguna_model->create($this->input->post("id_siswa"));
            $this->message = "Pengguna Baru Berhasil Disimpan :)";
            $this->session->set_flashdata('success', $this->message);
            redirect('admin/pengguna');
        }
    }

    public function get($id)
    {
        $result = $this->pengguna_model->getUserId($id);
        echo json_encode($result);
    }

    public function update()
    {
        $this->validation();
        if ($this->form_validation->run() == FALSE) {
            $this->message = "Komponen Pengguna Wajib Diisi !";
            $this->session->set_flashdata('warning', $this->message);
            redirect('admin/pengguna');
        } else {
            $this->pengguna_model->update();
            $this->message = "Pengguna Berhasil Diubah :)";
            $this->session->set_flashdata('success', $this->message);
            redirect('admin/pengguna');
        }
    }

    public function destroy($id)
    {
        $this->message = "Pengguna berhasil dihapus :)";
        $this->pengguna_model->delete($id);
        $this->session->set_flashdata('success', $this->message);
        redirect('admin/pengguna');
    }

    public function reset_password()
    {
        $old_password = $this->pengguna_model->reset($this->input->post('id_user'));
        if ($old_password == md5($this->input->post('password'))) {
            $this->pengguna_model->resetpassword();
            $this->message = 'Password berhasil diubah';
            $this->session->set_flashdata('success', $this->message);
            redirect('admin/pengguna');
        } else {
            $this->message = 'Password baru tidak sesuai!';
            $this->session->set_flashdata('danger', $this->message);
            redirect('admin/pengguna');
        }
    }

    public function validation()
    {
        $this->form_validation->set_rules('username', '', 'required');
        $this->form_validation->set_rules('password', '', 'required');
        $this->form_validation->set_rules('id_siswa', '', 'required');
    }
}

/* End of file Pengguna.php */
