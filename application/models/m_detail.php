<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_detail extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
    public function get_detail($no_kontrak)
	{
		$this->db->select('*');
		$this->db->from('input_data');
		//$this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa', 'left');
		$this->db->where('no_kontrak', $no_kontrak);
		return $this->db->get()->result();
		//$no_kontrak = $this->input->post('no_kontrak');
		//$this->db->where('no_kontrak',$no);
		//$hasil=$this->db->query("SELECT * FROM input_data WHERE no_kontrak='$no_kontrak' LIMIT 1");
		//return $hasil->result();
    }

    public function count_detail($no_kontrak)
	{
		$hasil=$this->db->query("SELECT * FROM input_data WHERE no_kontrak='$no_kontrak'");
		return $hasil->num_rows();
	}

}

?>