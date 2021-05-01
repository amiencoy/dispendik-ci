<?php

class M_profil extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$username = $this->session->userdata('username');
		$data = $this->db->query("SELECT * FROM login_admin where username='$username'");
		return $data->result();
	}

	public function count_all()
	{
		$username = $this->session->userdata('username');
		$data = $this->db->query("SELECT * FROM login_admin where username='$username'");
		return $data->num_rows();
	}

	public function get_kec()
	{
		$username = $this->session->userdata('username');
		$data = $this->db->query("SELECT * FROM login_admin where username='$username'");
		return $data->result();
	}

	public function count_kec()
	{
		$username = $this->session->userdata('username');
		$data = $this->db->query("SELECT * FROM login_admin where username='$username'");
		return $data->num_rows();
	}

	public function get_wilayah()
	{
		$nip = $this->session->userdata('nip');
		$data = $this->db->query("SELECT * FROM login_admin INNER JOIN sambungan ON login_admin.nip = sambungan.nip INNER JOIN kecamatan ON sambungan.status = kecamatan.ID  WHERE login_admin.nip = $nip ");
		return $data->result();
	}

	public function count_wilayah()
	{
		$nip = $this->session->userdata('nip');
		$data = $this->db->query("SELECT * FROM login_admin INNER JOIN sambungan ON login_admin.nip = sambungan.nip INNER JOIN kecamatan ON sambungan.status = kecamatan.ID where login_admin.nip = $nip ");
		return $data->num_rows();
	}

	public function get_lembaga($kode)
	{
		$kode = $this->session->userdata('kode');
		$data = $this->db->query("SELECT * FROM profil where kode_lembaga='$kode'");
		return $data->result();
	}

	public function count_lembaga($kode)
	{
		$kode = $this->session->userdata('kode');
		$data = $this->db->query("SELECT * FROM profil where kode_lembaga='$kode' ");
		return $data->num_rows();
	}

	public function profil_lembaga($kode)
	{
		$kode = $this->session->userdata('kode');
		$data = $this->db->query("SELECT * FROM lembaga where kode_lembaga='$kode' ");
		return $data->result();
	}

	public function get_edit_admin($nip)
	{
		$data = $this->db->query("SELECT * FROM login_admin WHERE nip='$nip'");
		return $data->result();
	}

	public function eksekusi_edit_admin()
	{
		$nip = $this->session->userdata('nip');
		$data = array(

			//'kode_lembaga'  => $this->session->userdata('kode'),
			'nama_admin'  => $this->input->post('nama_admin'),
			'nip'	    => $this->input->post('nip'),
			'jk'	    => $this->input->post('jk'),
			'alamat' 	=> $this->input->post('alamat'),
			'no_hp'	    => $this->input->post('no_hp')
		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->where('nip', $nip);
		$this->db->update('login_admin', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Edit Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('profil/index');
	}

	public function eksekusi_edit_admin_password()
	{
		$nip = $this->session->userdata('nip');
		$data = array(

			//'kode_lembaga'  => $this->session->userdata('kode'),
			'username'  => $this->input->post('username'),
			'password'	    => md5($this->input->post('password'))

		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->where('nip', $nip);
		$this->db->update('login_admin', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Edit Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('profil/index');
	}

	public function get_edit_koor($nip)
	{
		$data = $this->db->query("SELECT * FROM login_admin WHERE nip='$nip'");
		return $data->result();
	}

	public function eksekusi_edit_koor()
	{
		$nip = $this->session->userdata('nip');
		$data = array(

			//'kode_lembaga'  => $this->session->userdata('kode'),
			'nama_admin'  => $this->input->post('nama_admin'),
			'nip'	    => $this->input->post('nip'),
			'jk'	    => $this->input->post('jk'),
			'alamat' 	=> $this->input->post('alamat'),
			'no_hp'	    => $this->input->post('no_hp')
		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->where('nip', $nip);
		$this->db->update('login_admin', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Edit Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('profil/index');
	}

	public function eksekusi_edit_koor_password()
	{
		$nip = $this->session->userdata('nip');
		$data = array(

			//'kode_lembaga'  => $this->session->userdata('kode'),
			'username'  => $this->input->post('username'),
			'password'	    => md5($this->input->post('password'))

		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->where('nip', $nip);
		$this->db->update('login_admin', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Edit Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('profil/index');
	}


	public function get_edit_profil($nip)
	{
		$data = $this->db->query("SELECT * FROM profil WHERE nip='$nip'");
		return $data->result();
	}

	public function get_edit_lembaga($kode_lembaga)
	{
		$data = $this->db->query("SELECT * FROM lembaga WHERE kode_lembaga='$kode_lembaga'");
		return $data->result();
	}

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

			'kode_lembaga'  => $this->session->userdata('kode'),
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
		redirect('profil/index');
	}

	public function eksekusi_edit()
	{
		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']      = '6048000';
		$config['max_width']     = '1024';
		$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('photo'));
		$filename = $this->upload->file_name;
		$this->upload->initialize($config);
		$this->upload->do_upload('foto');
		$data = $this->upload->data();

		$nip = $this->input->post('nip');
		$data = array(
 
			'kode_lembaga'  => $this->session->userdata('kode'),
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
		$this->db->where('nip', $nip);
		$this->db->update('profil', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Input Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('profil/index');
	}

	public function eksekusi_edit_lembaga()
	{
		$kode = $this->session->userdata('kode');
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
		redirect('profil/index');
	}

	public function eksekusi_edit_lembaga_password()
	{
		$kode = $this->session->userdata('kode');
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
		redirect('profil/index');
	}
}
