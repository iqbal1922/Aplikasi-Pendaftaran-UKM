<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');

        if ($this->session->userdata('role') != "1") {
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/nav');
        $this->load->view('admin/dashboard');
        $this->load->view('tamplate/footer');
    }

    public function mahasiswa()
    {
        $url = "http://localhost:8000/api/mahasiswa";
        $get_url = file_get_contents($url);
        $data = json_decode($get_url);
        // $data['mahasiswa'] = $this->admin_model->getAllmahasiswa();
        $data_array = array(
            'data' => $data
        );
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/nav');
        $this->load->view('admin/kelola_mahasiswa', $data_array);
        $this->load->view('tamplate/footer');
    }

    public function ukm()
    {
        $data['ukm'] = $this->admin_model->getAllukm();
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/nav');
        $this->load->view('admin/kelola_ukm', $data);
        $this->load->view('tamplate/footer');
    }

    public function galeri()
    {
        $data['dokumentasi'] = $this->admin_model->getAllukm();
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/nav');
        $this->load->view('admin/kelola_galeri', $data);
        $this->load->view('tamplate/footer');
    }

    public function pengguna()
    {
        $data['pengguna'] = $this->admin_model->getAllPengguna();
        $data['mahasiswa'] = $this->admin_model->getMahasiswa();
        $this->load->view('tamplate/header');
        $this->load->view('tamplate/nav');
        $this->load->view('admin/kelola_pengguna', $data);
        $this->load->view('tamplate/footer');
    }
}

/* End of file Admin.php */
