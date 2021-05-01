<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Lembaga extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_lembaga');
	}

	function index()
	{
		if ($this->session->userdata('level') === '1') {
			$x['all'] = $this->m_lembaga->get_all();
			$x['c_all']  = $this->m_lembaga->count_all();
			$x['data'] = $this->m_lembaga->get_kb();
			$this->load->view('lembaga/view', $x);
		} elseif ($this->session->userdata('level') === '2') {
			$x['all'] = $this->m_lembaga->get_kec();
			$x['c_all']  = $this->m_lembaga->count_kec();
			$x['data'] = $this->m_lembaga->get_kb();
			$this->load->view('lembaga/view', $x);
		} //elseif ($this->session->userdata('level') === '3') {
			//$x['all'] = $this->m_lembaga->get_lembaga('kode');
            //$x['c_all']  = $this->m_lembaga->count_lembaga('kode');
            //$x['data'] = $this->m_lembaga->get_kb();
            //$this->load->view('v_lembaga', $x);}
        else {
			echo "Access Denied";
		}
	}

	public function get_kk()
	{
		$id = $this->input->post('id');
		$data = $this->m_crud->get_kk($id);
		echo json_encode($data);
	}

	public function get_detail($kode_lembaga)
	{
		$data['l'] = $this->m_lembaga->get_lembaga($kode_lembaga);
		$data['all'] = $this->m_lembaga->get_detail($kode_lembaga);
		$data['c_all'] = $this->m_lembaga->count_detail($kode_lembaga);
		$this->load->view('lembaga/detail', $data);
		
	}

	public function edit_lembaga($kode_lembaga)
	{
		$data['data'] = $this->m_lembaga->get_lembaga($kode_lembaga);
		$this->load->view('lembaga/edit_lembaga',$data);
	}

	public function edit_pengurus($nip)
	{
		$data['data']   = $this->m_lembaga->get_edit_profil($nip);
		$this->load->view('lembaga/edit_pengurus',$data);
	}

	public function hapus_pengurus($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->delete('profil');
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('msg', 'Sukses Hapus Data');
			}
			else{
				$this->session->set_flashdata('msg', 'Gagal');
			}
			redirect('lembaga/index');
	}

	public function simpan_data()
	{
		$this->m_lembaga->simpan_data();
	}

	public function eksekusi_edit_lembaga()
	{
		$this->m_lembaga->eksekusi_edit_lembaga();
	}

	public function eksekusi_edit_lembaga_password()
	{
		$this->m_lembaga->eksekusi_edit_lembaga_password();
	}
}
