<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table peminjaman di database
	public function read($mahasiswa_id='') {

		//sql read
        $this->db->select('peminjaman.*');
        $this->db->select('mahasiswa.nama AS nama_mahasiswa');
        $this->db->from('peminjaman');
        $this->db->join('mahasiswa', 'peminjaman.nim = mahasiswa.nim');

        //filter data sesuai id yang dikirim dari controller
		if($mahasiswa_id != '') {
			$this->db->where('peminjaman.nim', $mahasiswa_id);
		}

        $this->db->order_by('peminjaman.nim ASC, peminjaman.nim ASC');

		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table peminjaman di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('peminjaman');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table peminjaman di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('peminjaman', $input);
	}

	//function update berfungsi merubah data ke table peminjaman di database
	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('peminjaman', $input);
	}

	//function delete berfungsi menghapus data dari table peminjaman di database
	public function delete($id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('peminjaman');
	}
}