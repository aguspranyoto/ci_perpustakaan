<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_buku extends CI_Controller {

	public function __construct() {
        parent::__construct();

		if(empty($this->session->userdata('id'))) {
        	redirect('user/login');
		}
        //memanggil model
        $this->load->model(array('peminjaman_buku_model', 'peminjaman_model', 'buku_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada peminjaman_buku model
		//function read berfungsi mengambil/read data dari table peminjaman_buku di database
		$data_peminjaman_buku = $this->peminjaman_buku_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'peminjaman_buku_read',
						'judul' => 'Daftar Peminjaman Buku',

						//data peminjaman_buku dikirim ke view
						'data_peminjaman_buku' => $data_peminjaman_buku
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengambil daftar peminjaman dari table peminjaman
		$data_peminjaman = $this->peminjaman_model->read();
		$data_buku = $this->buku_model->read();


		//mengirim data ke view
		$output = array(
						'theme_page' => 'peminjaman_buku_insert',
						'judul' => 'Tambah Peminjaman Buku',

						//mengirim daftar peminjaman ke view
						'data_peminjaman' => $data_peminjaman,
						//mengirim daftar peminjaman ke view
						'data_buku' => $data_buku,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$id = $this->input->post('id');
		$peminjaman_id = $this->input->post('peminjaman_id');
		$buku_id = $this->input->post('buku_id');

		//mengirim data ke model
		$input = array(
						//format : buku_id field/kolom table => data input dari view
						'id' => $id,
						'peminjaman_id' => $peminjaman_id,
						'buku_id' => $buku_id,
					);

		//memanggil function insert pada peminjaman_buku model
		//function insert berfungsi menyimpan/create data ke table peminjaman_buku di database
		$data_peminjaman_buku = $this->peminjaman_buku_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('peminjaman_buku/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table peminjaman_buku sesuai id yg dipilih
		$data_peminjaman_buku_single = $this->peminjaman_buku_model->read_single($id);

		//mengambil daftar peminjaman dari table peminjaman
		$data_peminjaman = $this->peminjaman_model->read();
		$data_buku = $this->buku_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'peminjaman_buku_update',
						'judul' => 'Ubah peminjaman_buku',

						//mengirim data peminjaman_buku yang dipilih ke view
						'data_peminjaman_buku_single' => $data_peminjaman_buku_single,

						//mengirim daftar peminjaman ke view
						'data_peminjaman' => $data_peminjaman,
						//mengirim daftar buku ke view
						'data_buku' => $data_buku,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$peminjaman_id = $this->input->post('peminjaman_id');
		$buku_id = $this->input->post('buku_id');

		//mengirim data ke model
		$input = array(
						//format : buku_id field/kolom table => data input dari view
						'id' => $id,
						'peminjaman_id' => $peminjaman_id,
						'buku_id' => $buku_id,
					);

		//memanggil function update pada peminjaman_buku model
		//function update berfungsi merubah data ke table peminjaman_buku di database
		$data_peminjaman_buku = $this->peminjaman_buku_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('peminjaman_buku/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada peminjaman_buku model
		$data_peminjaman_buku = $this->peminjaman_buku_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('peminjaman_buku/read');
	}


	public function read_export() {
		//memanggil function read pada peminjaman_buku model
		//function read berfungsi mengambil/read data dari table peminjaman_buku di database
		$data_peminjaman_buku = $this->peminjaman_buku_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar peminjaman_buku',

						//data peminjaman_buku dikirim ke view
						'data_peminjaman_buku' => $data_peminjaman_buku
					);

		//memanggil file view
		$this->load->view('peminjaman_buku_read', $output);
	}

	public function data_export() {
		//memanggil function read pada peminjaman_buku model
		//function read berfungsi mengambil/read data dari table peminjaman_buku di database
		$data_peminjaman_buku = $this->peminjaman_buku_model->read();
	
		//mengirim data ke view
		$output = array(
						//memanggil view
						'judul' => 'Daftar peminjaman_buku',

						//data peminjaman_buku dikirim ke view
						'data_peminjaman_buku' => $data_peminjaman_buku
					);

		//memanggil file view
		$this->load->view('peminjaman_buku_data_export', $output);
	}

}