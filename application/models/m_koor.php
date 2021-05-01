<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_koor extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//function data($number,$offset){
	//	return $query = $this->db->get('input_data',$number,$offset)->result();		
	//}
	public function simpan_data()
	{
		/*$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']      = '2048000';
		$config['max_width']     = '1024';
		$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('f_nota'));
		$filename = $this->upload->file_name;
		$this->upload->initialize($config);
		$this->upload->do_upload('f_nota');
		$data = $this->upload->data();*/

		//$id = $this->input->post('id');
		$data = array(

			'username'	    => $this->input->post('username'),
			'password'	    => md5($this->input->post('password')),
			'nama_admin'    => $this->input->post('nama_admin'),
			'nip'	        => $this->input->post('nip'),
			'jk'	        => $this->input->post('jk'),
			'no_hp'	        => $this->input->post('no_hp'),
			'alamat'	    => $this->input->post('alamat'),
			'level'	    	=> $this->input->post('level') ?: '2',


		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->insert('login_admin', $data);
		redirect('koor/index');
	}

	public function get_all()
	{
		$data = $this->db->query("SELECT * FROM login_admin where level = '2' ");
		return $data->result();
	}

	public function count_all()
	{
		$data = $this->db->query("SELECT * FROM login_admin where level = '2' ");
		return $data->num_rows();
	}

	public function get_koor($nip)
	{
		
		$data = $this->db->query("SELECT * FROM login_admin WHERE nip = $nip  ");
		return $data->result();
	}

	public function get_wilayah($nip)
	{
		
		$data = $this->db->query("SELECT * FROM login_admin INNER JOIN sambungan ON login_admin.nip = sambungan.nip INNER JOIN kecamatan ON sambungan.status = kecamatan.ID  WHERE login_admin.nip = $nip ");
		return $data->result();
	}

	public function count_wilayah($nip) 
	{
		$data = $this->db->query("SELECT * FROM login_admin INNER JOIN sambungan ON login_admin.nip = sambungan.nip INNER JOIN kecamatan ON sambungan.status = kecamatan.ID where login_admin.nip = $nip ");
		return $data->num_rows();
	}

	public function get_kec()
	{
		$data = $this->db->query("SELECT * FROM kecamatan");
		return $data->result();
	}

	public function simpan_koor($nip, $status)
	{
		$query = "insert into user_cat values($nip,$status)";
		$this->db->query($query);
	}

	/*public function count_kec()
	{
		$data = $this->db->query("SELECT * FROM input_data JOIN sambungan ON input_data.sambung = sambungan.status JOIN login_admin ON sambungan.nip = login_admin.nip ");
		return $data->num_rows();
	}

	public function get_lembaga($kode)
	{
		$kode = $this->session->userdata('kode');
		$data = $this->db->query("SELECT * FROM input_data where kode_lembaga = '$kode'");
		return $data->result();
	}

	public function count_lembaga($kode)
	{
		$kode = $this->session->userdata('kode');
		$data = $this->db->query("SELECT * FROM input_data where kode_lembaga = '$kode'");
		return $data->num_rows();
	}*/



	public function hapus_data($nip)
	{
		$this->db->where('nip', $nip);
		$this->db->delete('login_admin');
		redirect('koor/index');
	}


	public function get_sd()
	{
		$query = $this->db->query("SELECT * FROM sumber_dana");
		return $query;
	}
	public function get_kb()
	{
		$query = $this->db->query("SELECT * FROM kategori_besar");
		return $query;
	}

	public function get_kk($id)
	{
		$query = $this->db->query("SELECT * FROM kategori_kecil WHERE no_kategori_besar='$id'");
		return $query->result();
	}


	
	/*public function get_data()
	{
		$hasil=$this->db->query("SELECT * FROM input_data");
		return $hasil;
	}

	public function get_kode_lembaga($kode)
    {
		$tampil_data=$this->db->query("SELECT * FROM input_data WHERE kode_lembaga='$kode'");
		return $tampil_data->result();

		//$this->db->where('kode_lembaga',$kode);
        //$result = $this->db->get('input_data');
		//return $result;
	}*/
	public function get_detail($nip)
	{
		$this->db->select('*');
		$this->db->from('login_admin');
		//$this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa', 'left');
		$this->db->where('nip', $nip);
		return $this->db->get()->result();
		//$no_kontrak = $this->input->post('no_kontrak');
		//$this->db->where('no_kontrak',$no);
		//$hasil=$this->db->query("SELECT * FROM input_data WHERE no_kontrak='$no_kontrak' LIMIT 1");
		//return $hasil->result();
	}

	public function get_edit($nip)
	{
		$data = $this->db->query("SELECT * FROM login_admin WHERE nip='$nip'");
		return $data->result();
	}

	public function eksekusi_edit()
	{
		$data = $this->upload->data();
		$nip = $this->input->post('nip');
		$data = array(

			'nama_admin'    => $this->input->post('nama_admin'),
			'nip'	        => $this->input->post('nip'),
			'jk'		    => $this->input->post('jk'),
			'no_hp'         => $this->input->post('no_hp'),
			'alamat'        => $this->input->post('alamat'),

		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->where('nip', $nip);
		$this->db->update('login_admin', $data);
		redirect('koor/index');
	}

	public function simpan_wilayah()
	{
		$result = array();
		foreach ($_POST['pilih'] as $key => $val) {
		   $result[] = array(             
			  'nip' 	=> $this->input->post('nip'),
			  'status'	=> $_POST['pilih'][$key]         
		   );      
		}      
		$this->db->insert_batch('sambungan',$result);
		redirect('koor/index');
	}
}
