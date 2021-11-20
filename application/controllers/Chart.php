<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct() {
        parent::__construct();

		if(empty($this->session->userdata('id'))) {
        	redirect('user/login');
		}

        //memanggil model
        $this->load->model(array('buku_model'));
    }

    public function index() {
		$this->pie();
	}

	public function pie() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_buku = $this->buku_model->read();
		
		//mengirim data ke view
		$output = array(
					'theme_page' => 'chart_pie',
					'judul' => 'Pie Chart',
					'data_buku' => $data_buku
				);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function column() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_buku = $this->buku_model->read();

		//mengirim data ke view
		$output = array(
					'theme_page' => 'chart_column',
					'judul' => 'Column Chart',
					'data_buku' => $data_buku
				);

		//memanggil file view
		$this->load->view('theme/index', $output);


	}

    public function line() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_buku = $this->buku_model->read();

		//mengirim data ke view
		$output = array(
					'theme_page' => 'chart_line',
					'judul' => 'line Chart',
					'data_buku' => $data_buku
				);

		//memanggil file view
		$this->load->view('theme/index', $output);


	}

}