<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_kec() 
	{
		$hasil = $this->db->query("SELECT * FROM kecamatan");
		return $hasil;
	} 
 
	public function get_lembaga($id)
	{
		$tampil_lembaga = $this->db->query("SELECT * FROM lembaga WHERE ID_kec='$id'");
		return $tampil_lembaga->result();
	}

	//public function get_selected_by_id_lembaga($kode_kec)
	//{
	//	$this->db->where('kode_kec','$kode_kec');
	//	$this->db->join('kecamatan', 'lembaga.kode_kec = kecamatan.kode_kec');
	//	return $this->db->get('lembaga')->row();
	//}

	function validate($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('login_admin', 1);
		return $result;

	}function validate_koor($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('login_koor', 1);
		return $result;
	}

	function validate_lembaga($lembaga, $password)
	{
		//	$this->db->where('nama_kec',$nama_kec);
		$this->db->where('nama_lembaga', $lembaga);
		$this->db->where('password', $password);
		$result = $this->db->get('lembaga', 1);
		return $result;
	}
}
