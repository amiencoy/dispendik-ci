<?php 
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{ 
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
		$this->load->helper('tgl_indo', 'kk', 'kb', 'sumber_dana','perubahan');
		//if($this->session->userdata('logged_in') !== TRUE){
		//	redirect('login');
		//}
	} 

	function index()
	{
		$this->load->database();
		//$jumlah_data = $this->m_crud->count_all()||$this->m_crud->count_kec()||$this->m_crud->count_lembaga();
		//$this->load->library('pagination');
		//$config['base_url'] = base_url().'index.php/dashboard/index/';
		//$config['total_rows'] = $jumlah_data;
		//$config['per_page'] = 10;
		//$from = $this->uri->segment(3);
		//$this->pagination->initialize($config);		
		//$data['all'] = $this->m_crud->data($config['per_page'],$from);
		//$x['data']=$this->m_crud->get_data();
		//$this->load->view('v_dashboard',$x);

		if ($this->session->userdata('level') === '1') {
			$x['all'] = $this->m_crud->get_all();
			$x['c_all']  = $this->m_crud->count_all();
			$x['data'] = $this->m_crud->get_kb();
			$x['sumber_dana'] = $this->m_crud->get_sd();
			$x['ruang'] = $this->m_crud->get_ruang();
			$x['kcmt']=$this->m_crud->get_kode_kec();
			$this->load->view('dashboard/view', $x);
		} elseif ($this->session->userdata('level') === '2') {
			$x['all'] = $this->m_crud->get_kec();
			$x['c_all']  = $this->m_crud->count_kec();
			$x['data'] = $this->m_crud->get_kb();
			$x['sumber_dana'] = $this->m_crud->get_sd();
			$x['ruang'] = $this->m_crud->get_ruang();
			$x['kcmt']=$this->m_crud->get_kode_kec_koor();
			$this->load->view('dashboard/view', $x);
		} elseif ($this->session->userdata('level') === '3') {
			$x['data'] = $this->m_crud->get_kb();
			$x['all'] = $this->m_crud->get_lembaga('kode');
			$x['c_all']  = $this->m_crud->count_lembaga('kode');
			$x['sumber_dana'] = $this->m_crud->get_sd();
			$x['ruang'] = $this->m_crud->get_ruang();
			$this->load->view('dashboard/view', $x);
		} else {
			echo "Access Denied";
		}
	}

	function get_lembaga(){
		$id=$this->input->post('id');
		$data=$this->m_crud->get_kode_lembaga($id);
		echo json_encode($data);
	}

	public function get_kk()
	{
		$id = $this->input->post('id');
		$data = $this->m_crud->get_kk($id);
		echo json_encode($data);
	}

	public function simpan_data()
	{
		$this->m_crud->simpan_data();
	}

	public function simpan_data_admin()
	{
		$this->m_crud->simpan_data_admin();
	}

	//public function detail($no_kontrak)
	//{
	//	$data['all'] = $this->m_crud->detail('no_kontrak');
	//	return $data;
	//}

	public function hapus($no_kontrak)
	{
		$this->db->where('no_kontrak', $no_kontrak);
		$this->db->delete('input_data');
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('msg', 'Sukses Hapus Data');
			}
			else{
				$this->session->set_flashdata('msg', 'Gagal');
			}
			redirect('dashboard/index');
	}

	public function get_detail($no_kontrak)
	{
		$data['all'] = $this->m_crud->get_detail($no_kontrak);
        $this->load->view('dashboard/detail', $data);
	}
	
	public function print ($no_kontrak)
	{
		$data['all'] = $this->m_crud->get_detail($no_kontrak);
        $this->load->view('print_aset', $data);
	}

	public function print_semua ()
	{
		if ($this->session->userdata('level') === '1') {
			$data['all'] = $this->m_crud->get_all();
		}elseif($this->session->userdata('level') === '2'){
			$data['all'] = $this->m_crud->get_kec();
		}elseif($this->session->userdata('level') === '3'){
			$data['all'] = $this->m_crud->get_lembaga('kode');
		}else{
			echo "Access Denied";
		}
        $this->load->view('print_aset', $data);
	}

	




}
