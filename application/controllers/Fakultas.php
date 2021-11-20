<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

	public function __construct() {
        parent::__construct();

		if(empty($this->session->userdata('id'))) {
        	redirect('user/login');
		}
        //memanggil model
        $this->load->model('fakultas_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada fakultas model
		//function read berfungsi mengambil/read data dari table fakultas di database
		$data_fakultas = $this->fakultas_model->read();

		//mengirim data ke view
		$output = array(
						//memanggil view
						'theme_page' => 'fakultas_read',
						'judul' => 'Daftar fakultas',

						//data fakultas dikirim ke view
						'data_fakultas' => $data_fakultas
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengirim data ke view
		$output = array(
						//memanggil view
						'theme_page' => 'fakultas_insert',
						'judul' => 'Tambah fakultas',
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$nama = $this->input->post('nama');


		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama,
						
					);

		//memanggil function insert pada fakultas model
		//function insert berfungsi menyimpan/create data ke table fakultas di database
		$data_fakultas = $this->fakultas_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('fakultas/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table fakultas sesuai id yg dipilih
		$data_fakultas_single = $this->fakultas_model->read_single($id);

		//mengirim data ke view
		$output = array(
						'theme_page' => 'fakultas_update',
						'judul' => 'Ubah fakultas',

						//mengirim data fakultas yang dipilih ke view
						'data_fakultas_single' => $data_fakultas_single,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$nama = $this->input->post('nama');


		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama,

					);

		//memanggil function insert pada fakultas model
		//function insert berfungsi menyimpan/create data ke table fakultas di database
		$data_fakultas = $this->fakultas_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('fakultas/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada fakultas model
		$data_fakultas = $this->fakultas_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('fakultas/read');
	}
}