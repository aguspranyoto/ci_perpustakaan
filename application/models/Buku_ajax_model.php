<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_ajax_model extends CI_Model {
 
 	//nama tabel dari database
    var $table = 'buku'; 

    //field yang ditampilkan
    var $column_order = array(null,'kategori_buku_id', 'judul', 'stok_tersedia', 'jumlah_stok','cover');

    //field yang diizin untuk pencarian 
    var $column_search = array('kategori_buku_id', 'judul', 'stok_tersedia', 'jumlah_stok', 'cover' ); 

    //field pertama yang diurutkan
    var $order = array('kategori_buku_id' => 'asc'); 
 
    public function __construct() {
        parent::__construct();
    }
 


    private function _get_datatables_query() {
         
        //$this->db->select('*');
        //$this->db->from($this->table);
    
        $this->db->select('buku.*');
        $this->db->select('kategori_buku.nama AS nama_kategori_buku');
        $this->db->from('buku');
        $this->db->join('kategori_buku', 'buku.kategori_buku_id = kategori_buku.id');

        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
        	$search = $this->input->post('search');
            if($search['value']) 

            // jika datatable mengirimkan pencarian dengan metode POST
            {
                // looping awal 
                if($i===0) {
                    $this->db->group_start(); 
                    $this->db->like($item, $search['value']);
                } else {
                    $this->db->or_like($item, $search['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if($this->input->post('order')) {
        	$order = $this->input->post('order');
            $this->db->order_by($this->column_order[$order['0']['column']], $order['0']['dir']);

        } else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables() {
        $this->_get_datatables_query();
        if($this->input->post('length') != -1)
        	$this->db->limit($this->input->post('length'), $this->input->post('start'));

        $query = $this->db->get();
        return $query->result_array();
    }
 
 	//menghitung tota data sesuai filter/pagination
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
 	//menghitung total data di table
    public function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 


}