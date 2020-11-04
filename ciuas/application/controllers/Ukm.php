<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Ukm extends CI_Controller
{

	public  function __construct()
	{
		parent::__construct();
		$this->load->model('ukm_model');
		$this->load->library('form_validation');
	}

	public function create()
	{
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			$this->message = "Komponen Ukm Wajib Diisi !";
			$this->session->set_flashdata('warning', $this->message);
			redirect('admin/ukm');
		} else {
			$query = array(
				'nama_ukm' => $this->input->post('nama_ukm'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'lokasi' => $this->input->post('lokasi'),
				'hari' => $this->input->post('hari'),
				'jam_mulai' => $this->input->post('jam_mulai'),
				'jam_selesai' => $this->input->post('jam_selesai')
			);
			$this->db->insert('ukm', $query);
			$this->message = "Data Ukm Berhasil Disimpan !";
			$this->session->set_flashdata('success', $this->message);
			redirect('admin/Ukm');
		}
	}

	public function get($id)
	{
		$result = $this->ukm_model->getUkmId($id);
		echo json_encode($result);
	}

	public function update()
	{
		$this->ukm_model->updateUkm();
		$this->message = "Data Ukm Berhasil Diubah !";
		$this->session->set_flashdata('success', $this->message);
		redirect('admin/ukm');
	}

	public function destroy($id)
	{
		$this->ukm_model->delete($id);
		$this->message = "Data Ukm Berhasil Dihapus !";
		$this->session->set_flashdata('success', $this->message);
		redirect('admin/ukm');
	}

	public function data_pendaftar($id_ukm)
	{
		$data['set'] = $this->ukm_model->getData($id_ukm);
		$this->load->view('tamplate/header');
		$this->load->view('tamplate/nav');
		$this->load->view('admin/kelola_pendaftar', $data);
		$this->load->view('tamplate/footer');
	}

	public function hapus_pendaftar($id_ukm, $id_mahasiswa)
	{
		$this->ukm_model->delete_pendaftar($id_ukm, $id_mahasiswa);
		$this->message = "Data Pendaftar Berhasil Dihapus !";
		$this->session->set_flashdata('success', $this->message);
		redirect('admin/ukm');
	}

	public function validation()
	{
		$this->form_validation->set_rules('nama_ukm', '', 'required');
		$this->form_validation->set_rules('penanggung_jawab', '', 'required');
		$this->form_validation->set_rules('lokasi', '', 'required');
		$this->form_validation->set_rules('hari', '', 'required');
		$this->form_validation->set_rules('jam_mulai', '', 'required');
		$this->form_validation->set_rules('jam_selesai', '', 'required');
	}
}

/* End of file Ukm.php */
