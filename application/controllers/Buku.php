<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('buku_model', 'kategori_buku_model', 'user_model'));
		
		if(empty($this->session->userdata('id'))) {
        	redirect('user/login');
}

	}

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_buku = $this->buku_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'buku_read',
						'judul' => 'Daftar buku',

						//data buku dikirim ke view
						'data_buku' => $data_buku
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {
		//mengambil daftar kategori_buku dari table kategori_buku
		$data_kategori_buku = $this->kategori_buku_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'buku_insert',
						'judul' => 'Tambah buku',

						//mengirim daftar kategori_buku ke view
						'data_kategori_buku' => $data_kategori_buku,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$kategori_buku_id = $this->input->post('kategori_buku_id');
		$judul = $this->input->post('judul');
		$stok_tersedia = $this->input->post('stok_tersedia');
		$jumlah_stok = $this->input->post('jumlah_stok');

		//mengirim data ke model
		$input = array(
						'kategori_buku_id' => $kategori_buku_id,
						'judul' => $judul,
						'stok_tersedia' => $stok_tersedia,
						'jumlah_stok' => $jumlah_stok,
					);

		//memanggil function insert pada buku model
		//function insert berfungsi menyimpan/create data ke table buku di database
		$data_buku = $this->buku_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('buku/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		
		//function read berfungsi mengambil 1 data dari table buku sesuai id yg dipilih
		$data_buku_single = $this->buku_model->read_single($id);

		//mengambil daftar kategori_buku dari table kategori_buku
		$data_kategori_buku = $this->kategori_buku_model->read();

		//mengirim data ke view
		$output = array(
						'theme_page' => 'buku_update',
						'judul' => 'Ubah buku',

						//mengirim data buku yang dipilih ke view
						'data_buku_single' => $data_buku_single,

						//mengirim daftar kategori_buku ke view
						'data_kategori_buku' => $data_kategori_buku,
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$kategori_buku_id = $this->input->post('kategori_buku_id');
		$judul = $this->input->post('judul');
		$stok_tersedia = $this->input->post('stok_tersedia');
		$jumlah_stok = $this->input->post('jumlah_stok');

		//mengirim data ke model
		$input = array(
						'kategori_buku_id' => $kategori_buku_id,
						'judul' => $judul,
						'stok_tersedia' => $stok_tersedia,
						'jumlah_stok' => $jumlah_stok,
					);

		//memanggil function update pada buku model
		//function update berfungsi merubah data ke table buku di database
		$data_buku = $this->buku_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('buku/read');
	}

	public function upload() {
    	$id = $this->uri->segment(3);
		
		$data_buku_single = $this->buku_model->read_single($id);

		$data_kategori_buku = $this->kategori_buku_model->read();

		$output = array(
						'theme_page' => 'buku_upload',
						'judul' => 'Upload buku',

						'data_buku_single' => $data_buku_single,

						'data_kategori_buku' => $data_kategori_buku,
					);

		$this->load->view('theme/index', $output);
	}

	public function upload_submit() {

		$config['upload_path']          = './upload_folder/';
		$config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 10000;
	    $config['encrypt_name']         = TRUE;
	    $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('cover')) {

			$id = $this->uri->segment(3);

			$data_buku_single = $this->buku_model->read_single($id);

			$response = $this->upload->display_errors();

			$output = array(
							'judul' => 'Upload File',
							'response' => $response,

							'data_buku_single' => $data_buku_single,

						);
			$this->load->view('buku_upload', $output);

		} else {
			

			$id = $this->uri->segment(3);

			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$input = array(
							'cover' => $file_name,
						);
			$data_buku = $this->buku_model->update($input, $id);
			
			redirect('buku/read');	        }
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada buku model
		$data_buku = $this->buku_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('buku/read');
	}

	public function read_export() {
		$data_buku = $this->buku_model->read();
	
		$output = array(
						'judul' => 'Daftar buku',

						'data_buku' => $data_buku
					);

		$this->load->view('buku_read_export', $output);
	}

	public function data_export() {
		$data_buku = $this->buku_model->read();
	
		$output = array(
						'judul' => 'Daftar buku',

						'data_buku' => $data_buku
					);

		$this->load->view('buku_data_export', $output);
	}
}