<?php

class Profil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_profil');
	}
	function index()
	{
		if ($this->session->userdata('level') === '1') {
			$data['all'] = $this->m_profil->get_all('username');
			$data['c_all']  = $this->m_profil->count_all('username');
			$this->load->view('profil/view', $data);
		} elseif ($this->session->userdata('level') === '2') {
			$data['all'] = $this->m_profil->get_kec('username');
			$data['c_all']  = $this->m_profil->count_kec('username');
			$data['c_wil'] = $this->m_profil->count_wilayah('nip');
			$data['wil'] = $this->m_profil->get_wilayah('nip');
			$this->load->view('profil/view', $data);
		} elseif ($this->session->userdata('level') === '3') {
			$data['all'] = $this->m_profil->get_lembaga('kode');
			$data['c_all']  = $this->m_profil->count_lembaga('kode');
			$data['l'] = $this->m_profil->profil_lembaga('kode');
			$this->load->view('profil/view', $data);
		} else {
			echo "Access Denied";
		}
	}

	/*public function tambah_pengurus()
	{
		$this->load->view('v_tambah_pengurus');
	}*/

	public function simpan_data()
	{
		$this->m_profil->simpan_data();
	}

	public function edit_data($nip)
	{
		if ($this->session->userdata('level') === '1') {
			$data['data']   = $this->m_profil->get_edit_admin($nip);
			$data['all'] = $this->m_profil->get_all('nip');
			$data['c_all']  = $this->m_profil->count_all('nip');
			$this->load->view('profil/edit_profil', $data);
		} elseif ($this->session->userdata('level') === '2') {
			$data['data']   = $this->m_profil->get_edit_koor($nip);
			$data['all'] = $this->m_profil->get_kec('nip');
			$data['c_all']  = $this->m_profil->count_kec('nip');
			$this->load->view('profil/edit_profil', $data);
		} elseif ($this->session->userdata('level') === '3') {
			$data['data']   = $this->m_profil->get_edit_profil($nip);
			$data['all'] = $this->m_profil->get_lembaga('nip');
			$data['c_all']  = $this->m_profil->count_lembaga('nip');
			$data['l'] = $this->m_profil->profil_lembaga('nip');
			$this->load->view('profil/edit_profil', $data);
		} else {
			echo "Access Denied";
		}
	}

	public function eksekusi_edit_admin()
	{
		$this->m_profil->eksekusi_edit_admin();
	}

	public function eksekusi_edit_admin_password()
	{
		$this->m_profil->eksekusi_edit_admin_password();
	}

	public function eksekusi_edit_koor()
	{
		$this->m_profil->eksekusi_edit_koor();
	}

	public function eksekusi_edit_koor_password()
	{
		$this->m_profil->eksekusi_edit_koor_password();
	}

	public function eksekusi_edit()
	{
		$this->m_profil->eksekusi_edit();
	}

	public function edit_lembaga($kode_lembaga)
	{
		/*if ($this->session->userdata('level') === '1') {
			$data['data']   = $this->m_profil->get_edit_admin($nip); 
			$data['all'] = $this->m_profil->get_all('nip');
			$data['c_all']  = $this->m_profil->count_all('nip');
			$this->load->view('v_profil', $data);
		} elseif ($this->session->userdata('level') === '2') {
			$data['data']   = $this->m_profil->get_edit_koor($nip); 
			$data['all'] = $this->m_profil->get_kec('nip');
			$data['c_all']  = $this->m_profil->count_kec('nip');
			$this->load->view('v_profil', $data);
		} elseif ($this->session->userdata('level') === '3') {
			$data['data']   = $this->m_profil->get_edit_lembaga($nip); 
			$data['all'] = $this->m_profil->get_lembaga('nip');
			$data['c_all']  = $this->m_profil->count_lembaga('nip');
			$data['l'] = $this->m_profil->profil_lembaga('nip');
			$this->load->view('partial_tambah' , $data);
		} else {
			echo "Access Denied";
		}*/
		$data['data']   = $this->m_profil->get_edit_lembaga($kode_lembaga);
		$data['all'] = $this->m_profil->get_lembaga('kode');
		$data['c_all']  = $this->m_profil->count_lembaga('kode');
		$data['l'] = $this->m_profil->profil_lembaga('kode');
		$this->load->view('profil/edit_lembaga', $data);
	}

	public function eksekusi_edit_lembaga()
	{
		$this->m_profil->eksekusi_edit_lembaga();
	}

	public function eksekusi_edit_lembaga_password()
	{
		$this->m_profil->eksekusi_edit_lembaga_password();
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
			redirect('profil/index');
	}

}
