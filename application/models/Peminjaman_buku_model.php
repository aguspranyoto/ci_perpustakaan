<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_buku_model extends CI_Model {

	//function read berfungsi mengambil/read data dari table peminjaman_buku di database
	public function read($peminjaman_id='',$buku_id='') {

		//sql read peminjaman
        $this->db->select('peminjaman_buku.*');
        $this->db->select('peminjaman.tanggal_pinjam AS tanggal_pinjam_peminjaman');
        $this->db->select('buku.judul AS judul_peminjaman');

        $this->db->from('peminjaman_buku');
        $this->db->join('peminjaman', 'peminjaman_buku.peminjaman_id = peminjaman.id');
        $this->db->join('buku', 'peminjaman_buku.buku_id = buku.id');




        //filter data sesuai id yang dikirim dari controller
		if($peminjaman_id != '') {
			$this->db->where('peminjaman_buku.peminjaman_id', $peminjaman_id);
		}

		if($buku_id != '') {
			$this->db->where('peminjaman_buku.buku_id', $buku_id);
		}

        $this->db->order_by('peminjaman_buku.peminjaman_id ASC, peminjaman_buku.id ASC');
        $this->db->order_by('peminjaman_buku.buku_id ASC, peminjaman_buku.id ASC');

		$query = $this->db->get();

		//$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table peminjaman_buku di database
	public function read_single($id) {

		//sql read
		$this->db->select('*');
		$this->db->from('peminjaman_buku');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table peminjaman_buku di database
	public function insert($input) {
		//$input = data yang dikirim dari controller
		return $this->db->insert('peminjaman_buku', $input);
	}

	//function update berfungsi merubah data ke table peminjaman_buku di database
	public function update($input, $id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('peminjaman_buku', $input);
	}

	//function delete berfungsi menghapus data dari table peminjaman_buku di database
	public function delete($id) {
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('peminjaman_buku');
	}
}