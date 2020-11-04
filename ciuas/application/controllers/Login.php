<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->load->view('tamplate/header');
        $this->load->view('login/index');
        $this->load->view('tamplate/footer');
    }

    public function signin()
    {
        $username = htmlspecialchars($this->input->post('uname1'));
        $password = md5(htmlspecialchars($this->input->post('pwd1')));

        $ceklogin = $this->login_model->login($username, $password);
        if ($ceklogin) {
            foreach ($ceklogin as $row);

            $session_data = array(
                'username' => $row->username,
                'role' => $row->role,
                'id_user' => $row->id_user,
                'id_mahasiswa' => $row->id_mahasiswa
            );

            $this->session->set_userdata($session_data);

            if ($this->session->userdata('role') === '1') {
                redirect('admin/index');
            } else if ($this->session->userdata('role') === '0') {
                redirect('user/register');
            } else {
                $this->session->set_flashdata('notify', '<font color="red">Username atau Password Salah</font>');
                redirect('login');
            }
        }
    }

    function signout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('role');
        redirect('login/index');
    }
}

/* End of file Login.php */
