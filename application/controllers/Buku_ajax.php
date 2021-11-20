<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_ajax extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('buku_ajax_model','kategori_buku_model'));
        
        if(empty($this->session->userdata('id'))) {
        	redirect('user/login');
		}
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {

		//mengirim data ke view
		$output = array(
						'theme_page' => 'buku_ajax_read',
						'judul' => 'Daftar buku',

					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

    //fungsi menampilkan data dalam bentuk json
	public function datatables() {
        //menunda loading (bisa dihapus, hanya untuk menampilkan pesan processing)
        //sleep(2);

        //memanggil fungsi model datatables
        $list = $this->buku_ajax_model->get_datatables();
        $data = array();
        $no = $this->input->post('start');

        //mencetak data json
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field['nama_kategori_buku'];
            $row[] = $field['judul'];
            if ($field['stok_tersedia']==0){
                $field['stok_tersedia'] = 'Tersedia';
                $row[] = $field['stok_tersedia'];
            }else if($field['stok_tersedia']==1){
                $field['stok_tersedia'] = 'Tidak Tersedia';
                $row[] = $field['stok_tersedia'];
            }
            $row[] = number_format($field['jumlah_stok']);
            $row[] = "<img src=\"".base_url('upload_folder/'.$field['cover'])."\" width=\"100px\" height=\"100px\">";




            $data[] = $row;
        }
    
        //mengirim data json
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->buku_ajax_model->count_all(),
            "recordsFiltered" => $this->buku_ajax_model->count_filtered(),
            "data" => $data,
        );

        //output dalam format JSON
        echo json_encode($output);
    }
}