<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        date_default_timezone_set('Asia/Jakarta');

        if ($this->session->userdata('role') != '0') {
            redirect('login', 'refresh');
        }
    }

    function register()
    {
        $data = array(
            'ukm' => $this->user_model->getAllukm(),
            'mahasiswa' => $this->user_model->getAlluser($this->session->userdata('id_user')),
            'set_ukm' => $this->user_model->getAllregistrasi($this->session->userdata('id_user')),
        );

        $this->load->view('tamplate/header');
        $this->load->view('tamplate/nav');
        $this->load->view('user/register', $data);
        $this->load->view('tamplate/footer');
    }

    function registered($id_ukm)
    {
        $cek = array(
            'id_mahasiswa' => $this->session->userdata('id_mahasiswa'),
            'id_ukm' => $id_ukm
        );
        $result = $this->db->get('registrasi', $cek)->num_rows();
        if ($result > 1) {
            $this->message = 'Anda tidak bisa mengikuti ekskul yang sama lebih dari satu';
            $this->session->set_flashdata('warning', $this->message);
            redirect('user/register');
        } else {
            $count = array(
                'id_mahasiswa' => $this->session->userdata('id_mahasiswa')
            );

            $total = $this->db->get('registrasi', $count)->num_rows();

            if ($total >= 3) {
                $this->message = 'Anda tidak bisa mengikuti ekskul lebih dari 3';
                $this->session->set_flashdata('warning', $this->message);
                redirect('user/register');
            } else {
                $query = array(
                    'id_ukm' => $id_ukm,
                    'id_mahasiswa' => $this->session->userdata('id_mahasiswa'),
                    'tanggal_daftar' => date('Y-m-d')
                );
                $this->db->insert('registrasi', $query);
                $this->message = 'Anda berhasil mengikuti ekskul :)';
                $this->session->set_flashdata('success', $this->message);
                redirect('user/register');
            }
        }
    }

    function galeri()
    {
        $data = array(
            'ukm' => $this->user_model->getAllukm()
        );
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/nav');
        $this->load->view('user/kelola', $data);
        $this->load->view('tamplate/footer');
    }
}

/* End of file User.php */
