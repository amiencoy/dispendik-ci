<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lembaga extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$data = $this->db->query("SELECT * FROM lembaga");
		return $data->result();
	}

	public function count_all()
	{
		$data = $this->db->query("SELECT * FROM lembaga");
		return $data->num_rows();
	}

	public function get_kec()
	{
		$nip = $this->session->userdata('nip');
		$data = $this->db->query("SELECT * FROM lembaga JOIN sambungan ON lembaga.ID_kec = sambungan.status JOIN login_admin ON sambungan.nip = login_admin.nip WHERE sambungan.nip = $nip");
		return $data->result();
	}

	public function count_kec()
	{
		$nip = $this->session->userdata('nip');
		$data = $this->db->query("SELECT * FROM lembaga JOIN sambungan ON lembaga.ID_kec = sambungan.status JOIN login_admin ON sambungan.nip = login_admin.nip WHERE sambungan.nip = $nip");
		return $data->num_rows();
	}

	public function get_edit_profil($nip)
	{
		$data = $this->db->query("SELECT * FROM profil WHERE nip='$nip'");
		return $data->result();
	}

	public function get_lembaga($kode_lembaga)
	{
		$data = $this->db->query("SELECT * FROM lembaga where kode_lembaga = '$kode_lembaga'");
		return $data->result();
	}

	public function get_detail($kode_lembaga)
	{
		$query = $this->db->query("SELECT * FROM lembaga INNER JOIN profil on lembaga.kode_lembaga = profil.kode_lembaga WHERE lembaga.kode_lembaga = '$kode_lembaga'  ");
		return $query->result();

	}

	public function count_detail($kode_lembaga)
	{
		$query = $this->db->query("SELECT * FROM lembaga INNER JOIN profil on lembaga.kode_lembaga = profil.kode_lembaga WHERE lembaga.kode_lembaga = '$kode_lembaga'  ");
		return $query->num_rows();

	}

	/*public function count_lembaga($kode)
	{
		$kode = $this->session->userdata('kode');
	    $data = $this->db->query("SELECT * FROM lembaga where kode_lembaga = '$kode'");
		return $data->num_rows();
	}*/

	public function simpan_data()
	{
		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size']      = '6048000';
		$config['max_width']     = '1024';
		$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('foto'));
		$filename = $this->upload->file_name;
		$this->upload->initialize($config);
		$this->upload->do_upload('foto');
		$data = $this->upload->data();

		$data = array(

			'kode_lembaga'  => $this->input->post('kode_lembaga'),
			'nama_lengkap'  => $this->input->post('nama_lengkap'),
			'nip'	        => $this->input->post('nip'),
			'jabatan' 		=> $this->input->post('jabatan'),
			'jk'		    => $this->input->post('jk'),
			'no_hp'         => $this->input->post('no_hp'),
			'alamat'        => $this->input->post('alamat'),
			'tahun_menjabat' => $this->input->post('tahun_menjabat'),
			'foto'    		=> $data['file_name']
		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->insert('profil', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Input Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('lembaga/index');
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

	public function eksekusi_edit_lembaga()
	{
		$kode = $this->input->post('kode_lembaga');
		$data = array(

			//'kode_lembaga'  => $this->session->userdata('kode'),
			'nama_lembaga'  => $this->input->post('lembaga'),
			'nama_kec'	    => $this->input->post('kecamatan'),
			'alamat_kec' 	=> $this->input->post('alamat')
		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->where('kode_lembaga', $kode);
		$this->db->update('lembaga', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Edit Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('lembaga/index');
	}

	public function eksekusi_edit_lembaga_password()
	{
		$kode = $this->input->post('kode_lembaga');
		$data = array(

			//'kode_lembaga'  => $this->session->userdata('kode'),
			'nama_lembaga'  => $this->input->post('lembaga'),
			'password'	    => md5($this->input->post('password'))
		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->where('kode_lembaga', $kode);
		$this->db->update('lembaga', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Edit Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('lembaga/index');
	}
}
 