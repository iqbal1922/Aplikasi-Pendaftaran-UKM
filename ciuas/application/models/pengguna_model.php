<?php


defined('BASEPATH') or exit('No direct script access allowed');

class pengguna_model extends CI_Model
{

    public function getUser()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function getUserId($id)
    {
        return $this->db->get_where('user', array('id_user' => $id))->row_array();
    }

    public function update()
    {
        $query = array(
            'username' => $this->input->post('username'),
        );
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $query);
    }

    public function resetpassword()
    {
        $query = array(
            'password' => md5($this->input->post('new_password'))
        );
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $query);
    }

    public function reset($id)
    {
        $this->db->select('*');
        $this->db->where('id_user', $id);
        $result = $this->db->get('user')->result();
        foreach ($result as $row) {
            $password = $row->password;
        }
        return $password;
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function create($id)
    {
        $query = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'id_mahasiswa' => $this->input->post('id_siswa'),
            'role' => '0'
        );
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = user.id_mahasiswa');
        $this->db->where('mahasiswa.id_mahasiswa', $id);
        $this->db->get();
        $this->db->insert('user', $query);
    }
}

/* End of file pengguna_model.php */
