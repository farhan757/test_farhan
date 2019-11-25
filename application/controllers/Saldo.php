<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/Utama.php');

class Saldo extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function edit($id)
	{
		$this->db->where('id',$id);
		$data['data'] = $this->db->get('tb_saldo_cuti')->result();
		$this->load->view('Saldo/edit',$data);
	}
	
	public function aksi_edit(){
		$id = $this->input->post('id');
		$npk = $this->input->post('npk');
		$saldo = $this->input->post('saldo');
		$tahun = $this->input->post('tahun');
		
		$data = array(
			'saldo' => $saldo,
			'tahun' => $tahun
		);
		
		$this->db->where('id',$id);
		$this->db->update('tb_saldo_cuti',$data);
		
		redirect('Utama');
	}
	
	public function hapus($id){
		$this->db->where('id',$id);
		$this->db->delete('tb_saldo_cuti');
		redirect('Utama');		
	}
	
	public function tambah(){
		$this->load->view('Saldo/tambah');
	}
	
	public function aksi_tambah(){
		
		$npk = $this->input->post('npk');
		$saldo = $this->input->post('saldo');
		$tahun = $this->input->post('tahun');
		
		$data = array(
			'saldo' => $saldo,
			'tahun' => $tahun,
			'npk'=>$npk
		);
		
		
		$this->db->insert('tb_saldo_cuti',$data);
		
		redirect('Utama');
	}	
}
