<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct() {
        parent::__construct();

		if(empty($this->session->userdata('id'))) {
        	redirect('user/login');
		}
        //memanggil model
        $this->load->model(array('peminjaman_model', 'mahasiswa_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada peminjaman model
		//function read berfungsi mengambil/read data dari table peminjaman di database
		$data_peminjaman = $this->peminjaman_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'peminjaman_read',
						'judul' => 'Daftar peminjaman',

						//data peminjaman dikirim ke view
						'data_peminjaman' => $data_peminjaman
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengambil daftar mahasiswa dari table mahasiswa
		$data_mahasiswa = $this->mahasiswa_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'peminjaman_insert',
						'judul' => 'Tambah peminjaman',

						//mengirim daftar mahasiswa ke view
						'data_mahasiswa' => $data_mahasiswa,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$id = $this->input->post('id');
		$nim = $this->input->post('nim');
		$tanggal_pinjam = $this->input->post('tanggal_pinjam');
		$status_pengembalian = $this->input->post('status_pengembalian');

		//mengirim data ke model
		$input = array(
						//format : tanggal_pinjam field/kolom table => data input dari view
						'id' => $id,
						'nim' => $nim,
						'tanggal_pinjam' => $tanggal_pinjam,
						'status_pengembalian' => $status_pengembalian,
					);

		//memanggil function insert pada peminjaman model
		//function insert berfungsi menyimpan/create data ke table peminjaman di database
		$data_peminjaman = $this->peminjaman_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('peminjaman/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table peminjaman sesuai id yg dipilih
		$data_peminjaman_single = $this->peminjaman_model->read_single($id);

		//mengambil daftar mahasiswa dari table mahasiswa
		$data_mahasiswa = $this->mahasiswa_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'peminjaman_update',
						'judul' => 'Ubah peminjaman',

						//mengirim data peminjaman yang dipilih ke view
						'data_peminjaman_single' => $data_peminjaman_single,

						//mengirim daftar mahasiswa ke view
						'data_mahasiswa' => $data_mahasiswa,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$nim = $this->input->post('nim');
		$tanggal_pinjam = $this->input->post('tanggal_pinjam');
		$status_pengembalian = $this->input->post('status_pengembalian');

		//mengirim data ke model
		$input = array(
						//format : tanggal_pinjam field/kolom table => data input dari view
						'id' => $id,
						'nim' => $nim,
						'tanggal_pinjam' => $tanggal_pinjam,
						'status_pengembalian' => $status_pengembalian,
					);

		//memanggil function update pada peminjaman model
		//function update berfungsi merubah data ke table peminjaman di database
		$data_peminjaman = $this->peminjaman_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('peminjaman/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada peminjaman model
		$data_peminjaman = $this->peminjaman_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('peminjaman/read');
	}
}