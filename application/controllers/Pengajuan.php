<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengajuan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengajuan');
		$this->load->helper('tgl_indo', 'kk', 'kb', 'sumber_dana', 'perubahan','status');
	}

	function index()
	{
		if ($this->session->userdata('level') === '1') {
			$data['all'] = $this->m_pengajuan->get_all();
			$data['c_all']  = $this->m_pengajuan->count_all();
			$this->load->view('pengajuan/view', $data);
		} elseif ($this->session->userdata('level') === '2') {
			$data['all'] = $this->m_pengajuan->get_kec();
			$data['c_all']  = $this->m_pengajuan->count_kec();
			$this->load->view('pengajuan/view', $data);
		} elseif ($this->session->userdata('level') === '3') {
			$data['all'] = $this->m_pengajuan->get_lembaga('kode');
			$data['c_all']  = $this->m_pengajuan->count_lembaga('kode');
			$this->load->view('pengajuan/view', $data);
		} else {
			echo "Access Denied";
		}
	}

	public function perubahan ($no_kontrak)
	{
		$data['all'] = $this->m_pengajuan->get_detail($no_kontrak);
		$data['x'] = $this->m_pengajuan->aksi_pengajuan_detail($no_kontrak);
        $this->load->view('pengajuan/perubahan', $data);
	}
	
	function get_lembaga()
	{
		$id = $this->input->post('id');
		$data = $this->m_pengajuan->get_kode_lembaga($id);
		echo json_encode($data);
	}

	public function get_kk()
	{
		$id = $this->input->post('id');
		$data = $this->m_pengajuan->get_kk($id);
		echo json_encode($data);
	}

	public function aksi($no_kontrak)
	{
		$data['kb'] = $this->m_pengajuan->get_kb();
		$data['kk'] = $this->m_pengajuan->get_kk1();
		$data['sumber_dana'] = $this->m_pengajuan->get_sd();
		$data['ruang'] = $this->m_pengajuan->get_ruang();
		$data['kcmt'] = $this->m_pengajuan->get_kode_kec();
		$data['all']   = $this->m_pengajuan->aksi_pengajuan($no_kontrak);
		$this->load->view('pengajuan/persetujuan', $data); 
	}

	public function batal($no_kontrak)
	{
		$data = array(

			'stat_perubahan' 	=> $this->input->post('status_perubahan') ?: '1',

		);
		$this->db->where('no_kontrak', $no_kontrak);
		$this->db->update('input_data', $data);


		$this->db->where('no_kontrak', $no_kontrak);
		$this->db->delete('perubahan');
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('msg', 'Sukses Hapus Data');
			}
			else{
				$this->session->set_flashdata('msg', 'Gagal');
			}
			redirect('pengajuan/index');

			
	}
	

	public function edit_1()
	{
		$this->m_pengajuan->edit_1();
	}

	public function edit_2()
	{
		$this->m_pengajuan->edit_2();
	}

	public function simpan_perubahan()
	{
		$this->m_pengajuan->simpan_perubahan(); 
		
	}
}
