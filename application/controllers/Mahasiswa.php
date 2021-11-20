<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct() {
        parent::__construct();

		if(empty($this->session->userdata('id'))) {
        	redirect('user/login');
		}
        //memanggil model
        $this->load->model(array('mahasiswa_model', 'fakultas_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada mahasiswa model
		//function read berfungsi mengambil/read data dari table mahasiswa di database
		$data_mahasiswa = $this->mahasiswa_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'mahasiswa_read',
						'judul' => 'Daftar mahasiswa',

						//data mahasiswa dikirim ke view
						'data_mahasiswa' => $data_mahasiswa
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengambil daftar fakultas dari table fakultas
		$data_fakultas = $this->fakultas_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'mahasiswa_insert',
						'judul' => 'Tambah mahasiswa',

						//mengirim daftar fakultas ke view
						'data_fakultas' => $data_fakultas,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$nim = $this->input->post('nim');
		$fakultas_id = $this->input->post('fakultas_id');
		$nama = $this->input->post('nama');
		$gender = $this->input->post('gender');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nim' => $nim,
						'fakultas_id' => $fakultas_id,
						'nama' => $nama,
						'gender' => $gender,
					);

		//memanggil function insert pada mahasiswa model
		//function insert berfungsi menyimpan/create data ke table mahasiswa di database
		$data_mahasiswa = $this->mahasiswa_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('mahasiswa/read');
	}

	public function update() {
		//menangkap nim data yg dipilih dari view (parameter get)
		$nim = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table mahasiswa sesuai nim yg dipilih
		$data_mahasiswa_single = $this->mahasiswa_model->read_single($nim);

		//mengambil daftar fakultas dari table fakultas
		$data_fakultas = $this->fakultas_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'mahasiswa_update',
						'judul' => 'Ubah Mahasiswa',

						//mengirim data mahasiswa yang dipilih ke view
						'data_mahasiswa_single' => $data_mahasiswa_single,

						//mengirim daftar fakultas ke view
						'data_fakultas' => $data_fakultas,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap nim data yg dipilih dari view
		$nim = $this->uri->segment(3);

		//menangkap data input dari view
		$fakultas_id = $this->input->post('fakultas_id');
		$nama = $this->input->post('nama');
		$gender = $this->input->post('gender');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nim' => $nim,
						'fakultas_id' => $fakultas_id,
						'nama' => $nama,
						'gender' => $gender,
					);

		//memanggil function update pada mahasiswa model
		//function update berfungsi merubah data ke table mahasiswa di database
		$data_mahasiswa = $this->mahasiswa_model->update($input, $nim);

		//mengembalikan halaman ke function read
		redirect('mahasiswa/read');
	}

	public function delete() {
		//menangkap nim data yg dipilih dari view
		$nim = $this->uri->segment(3);

		//memanggil function delete pada mahasiswa model
		$data_mahasiswa = $this->mahasiswa_model->delete($nim);

		//mengembalikan halaman ke function read
		redirect('mahasiswa/read');
	}
}