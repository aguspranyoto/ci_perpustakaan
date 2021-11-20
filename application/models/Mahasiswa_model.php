<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table mahasiswa di database
	public function read($fakultas_id='') {

		//sql read
        $this->db->select('mahasiswa.*');
        $this->db->select('fakultas.nama AS nama_fakultas');
        $this->db->from('mahasiswa');
        $this->db->join('fakultas', 'mahasiswa.fakultas_id = fakultas.id');

        //filter data sesuai nim yang dikirim dari controller
		if($fakultas_id != '') {
			$this->db->where('mahasiswa.fakultas_id', $fakultas_id);
		}

        $this->db->order_by('mahasiswa.fakultas_id ASC, mahasiswa.nama ASC');

		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table mahasiswa di database
	public function read_single($nim) {

		//sql read
		$this->db->select('*');
		$this->db->from('mahasiswa');

		//$nim = nim data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai nim yang dikirim dari controller
		$this->db->where('nim', $nim);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table mahasiswa di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('mahasiswa', $input);
	}

	//function update berfungsi merubah data ke table mahasiswa di database
	public function update($input, $nim) {
		//$nim = nim data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai nim yang dikirim dari controller
		$this->db->where('nim', $nim);

		//$input = data yang dikirim dari controller
		return $this->db->update('mahasiswa', $input);
	}

	//function delete berfungsi menghapus data dari table mahasiswa di database
	public function delete($nim) {
		//$nim = nim data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('nim', $nim);
		return $this->db->delete('mahasiswa');
	}
}