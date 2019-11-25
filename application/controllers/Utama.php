<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

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
	 
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}		
	 
	public function index()
	{
		$data['data'] = $this->db->get('tb_karyawan')->result();
		$this->load->view('Utama/index',$data);
	}
	
	public function aksi_tambah(){
		$this->form_validation->set_rules('npk','npk','required');
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('jk','jk','required');
		
		if($this->form_validation->run() != false){
			$cek = $this->ceknpk($this->input->post('npk'));
			if($cek){		
			
				$npk = $this->input->post('npk');
				$nama = $this->input->post('nama');
				$tgl = $this->input->post('tgl');
				$jk = $this->input->post('jk');
				
				$data = array(
					'npk' => $npk,
					'nama' => $nama,
					'jenis_kelamin' => $jk,
					'tanggal_lahir' => $tgl,
					'gambar' => 'defaulf.jpg'
				);
				
				$this->db->insert('tb_karyawan',$data);
				
				redirect('Utama');		
			}else{
				$info['info'] = "NPK sudah ada..";
				$this->load->view('Utama/tambah',$info);
			}
		}
		$this->load->view('Utama/tambah');
	}
	
	public function tambah(){
		$this->load->view('Utama/tambah');
	}
	
	public function edit($id){
		$this->db->where('npk',$id);
		$data['data'] = $this->db->get('tb_karyawan')->result();
		$this->load->view('Utama/edit',$data);
	}
	
	public function aksi_edit(){
		$nama = $this->input->post('nama');
		$tgl = $this->input->post('tgl');
		$jk = $this->input->post('jk');
		$npk = $this->input->post('npk');
		
		$data = array(
			'nama' => $nama,
			'tanggal_lahir' => $tgl,
			'jenis_kelamin' => $jk
		);
		
		$this->db->where('npk',$npk);
		$this->db->update('tb_karyawan',$data);
		redirect('Utama');
	}
	
	public function detail($npk){
		$this->db->select('tb_saldo_cuti.id, tb_saldo_cuti.tahun, tb_saldo_cuti.saldo')
		->from('tb_karyawan')
		->join('tb_saldo_cuti','tb_saldo_cuti.npk=tb_karyawan.npk','left')
		->where('tb_karyawan.npk',$npk)
		->order_by('tb_saldo_cuti.id','asc');
		$detail['detail'] = $this->db->get()->result();
		
		$this->db->where('npk',$npk);
		$detail['data'] = $this->db->get('tb_karyawan')->result();
		
		$this->load->view('Utama/detail',$detail);
	}
	
	public function hapus($npk){
		$this->db->where('npk',$npk);
		$this->db->delete('tb_karyawan');
		redirect('Utama');
	}
	
    function ceknpk($npk){
        $where = array(
            'npk'=>$npk
        );
        
        $this->db->where($where);
        $query = $this->db->get('tb_karyawan');

		if($query->num_rows() > 0){
			return false;
		}else{
			return true;
		}
	}
}
