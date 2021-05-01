<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Koor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_koor');
	}

	function index()
	{
		if ($this->session->userdata('level') === '1') {
			$x['all'] = $this->m_koor->get_all('lv');
			$x['c_all']  = $this->m_koor->count_all('lv');
			$x['kec'] = $this->m_koor->get_kec();
			$x['data'] = $this->m_koor->get_kb();
			//$x['wil'] = $this->m_koor->get_wilayah();
			//$x['c_wil'] = $this->m_koor->count_wilayah();
			$this->load->view('koor/view', $x);
		} else {
			echo "Access Denied";
		}
	}


	public function simpan_data()
	{
		$this->m_koor->simpan_data();
		$data['all'] = $this->m_koor->get_all();
		$data['c_all']  = $this->m_koor->count_all();
		$this->load->view('koor/view', $data); 
	} 

	public function simpan_wilayah()
	{
		$this->m_koor->simpan_wilayah(); 
	}

	public function tambah_wilayah($nip)
	{
		$x['kec'] = $this->m_koor->get_kec();
		$x['c_wil'] = $this->m_koor->count_wilayah($nip);
		$x['wil'] = $this->m_koor->get_wilayah($nip);
		$x['data'] = $this->m_koor->get_koor($nip);
		$this->load->view('koor/tambah_wilayah',$x); 
	}
	
	public function hapus_wilayah($nip)
	{
		$x['c_wil'] = $this->m_koor->count_wilayah($nip);
		$this->db->where('nip', $nip);
		$this->db->delete('sambungan');
		redirect('koor/index');
	}

	public function hapus_data($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->delete('login_admin');
		redirect('koor/index');
	}

	public function get_detail($nip)
	{
		$data['all'] = $this->m_koor->get_detail($nip);
		$this->load->view('koor/detail', $data);
	}

	public function edit_data($nip)
	{
		if ($this->session->userdata('level') === '1') {
			$data['data']   = $this->m_koor->get_detail($nip);
			$data['all'] = $this->m_koor->get_detail($nip);
			//$data['c_all']  = $this->m_profil->count_all('nip');
			$this->load->view('koor/edit', $data);
		} else {
			echo "Access Denied";
		}
	}

	public function eksekusi_edit()
	{
		$this->m_koor->eksekusi_edit(); 
	}
}
