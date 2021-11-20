<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Reset_password extends CI_Controller {
 
	public function index()
	{
 
		$this->load->view('reset');
	}
 
	public function reset()
	{
		if ($_POST) {
			
			$this->input->post('email');
			$passnew = random_string('alnum', 50);
			$this->session->set_flashdata('sukses', 'Silahkan masukkan password baru anda dibawah ini <br>'. $passnew);
			redirect('reset_password/index');
		}
		
		
	}
 
}