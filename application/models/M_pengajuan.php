<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_pengajuan extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_kode_kec()
	{
		$hasil = $this->db->query("SELECT * FROM kecamatan");
		return $hasil;
	}

	public function get_kode_lembaga($id)
	{
		$tampil_lembaga = $this->db->query("SELECT * FROM lembaga WHERE ID_kec='$id'");
		return $tampil_lembaga->result();
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

	public function get_kk1()
	{
		$query = $this->db->query("SELECT * FROM kategori_kecil");
		return $query;
	}

	public function get_ruang()
	{
		$query = $this->db->query("SELECT * FROM ruang");
		return $query;
	}

	public function get_all()
	{
		$data = $this->db->query("SELECT * FROM input_data INNER JOIN perubahan ON input_data.no_kontrak = perubahan.no_kontrak");
		return $data->result();
	}

	public function count_all()
	{
		$data = $this->db->query("SELECT * FROM input_data INNER JOIN perubahan ON input_data.no_kontrak = perubahan.no_kontrak");
		return $data->num_rows();
	}

	public function get_kec()
	{
		$nip = $this->session->userdata('nip');
		$data = $this->db->query("SELECT * FROM input_data INNER JOIN perubahan ON input_data.no_kontrak = perubahan.no_kontrak INNER JOIN sambungan ON input_data.sambung = sambungan.status WHERE sambungan.nip = $nip ");
		return $data->result();
	}

	public function count_kec()
	{
		$nip = $this->session->userdata('nip');
		$data = $this->db->query("SELECT * FROM input_data INNER JOIN perubahan ON input_data.no_kontrak = perubahan.no_kontrak INNER JOIN sambungan ON input_data.sambung = sambungan.status WHERE sambungan.nip = $nip ");
		return $data->num_rows();
	}

	public function get_lembaga($kode)
	{
		$kode = $this->session->userdata('kode');
		$data = $this->db->query("SELECT * FROM input_data INNER JOIN perubahan ON input_data.no_kontrak = perubahan.no_kontrak where kode_lembaga = '$kode'");
		return $data->result();
	}

	public function count_lembaga($kode)
	{
		$kode = $this->session->userdata('kode');
		$data = $this->db->query("SELECT * FROM input_data INNER JOIN perubahan ON input_data.no_kontrak = perubahan.no_kontrak where kode_lembaga = '$kode'");
		return $data->num_rows();
	}


	public function aksi_pengajuan($no_kontrak)
	{
		$data = $this->db->query("SELECT * FROM input_data INNER JOIN perubahan ON input_data.no_kontrak = perubahan.no_kontrak where input_data.no_kontrak = '$no_kontrak'");
		return $data->result();
	}

	public function aksi_pengajuan_detail($no_kontrak)
	{
		$data = $this->db->query("SELECT * FROM input_data INNER JOIN perubahan ON input_data.no_kontrak = perubahan.no_kontrak where input_data.no_kontrak = '$no_kontrak'");
		return $data->result();
	}

	public function get_detail($no_kontrak)
	{
		$this->db->select('*');
		$this->db->from('input_data');
		//$this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa', 'left');
		$this->db->where('no_kontrak', $no_kontrak);
		return $this->db->get()->result();
		
    }

	public function edit_1()
	{
		$no_kontrak = $this->input->post('no_kontrak');
		$data = array(

			'keterangan'		=> $this->input->post('keterangan')

		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->where('no_kontrak', $no_kontrak);
		$this->db->update('input_data', $data);

		$no_kontrak = $this->input->post('no_kontrak');
		$data = array(

			'status_perubahan' 	=> $this->input->post('status_perubahan') ?: '2',

		);


		$this->db->where('no_kontrak', $no_kontrak);
		$this->db->update('perubahan', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('pengajuan/index');
	}

	public function edit_2()
	{
		$no_kontrak = $this->input->post('no_kontrak');

		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']      = '6048000';
		$config['max_width']     = '1024'; 
		$config['max_height']    = '768';
		$config['file_name']     = url_title($this->input->post('f_nota'));
		$filename = $this->upload->file_name;
		$this->upload->initialize($config);
		$this->upload->do_upload('f_nota');

		$data = $this->upload->data();

		$data = array(

			'kode_lembaga'  => $this->input->post('kode_lembaga'),
			'no_kontrak'    => $this->input->post('kode_lembaga') . "." . $this->input->post('kk') . "." . $this->input->post('sumber_dana') . $this->input->post('tgl_terima') . "." . $this->input->post('jumlah'),
			'sumber_dana'   => $this->input->post('sumber_dana'),
			'kb'	        => $this->input->post('kb'),
			'kk'    		=> $this->input->post('kk'),
			'jenis_nama'    => $this->input->post('jenis_nama'),
			'merk'          => $this->input->post('merk'),
			'ukuran'        => $this->input->post('ukuran'),
			'bahan'         => $this->input->post('bahan'),
			'nama_toko'     => $this->input->post('nama_toko'),
			'tgl_terima'    => $this->input->post('tgl_terima'),
			'harga_satuan'  => $this->input->post('harga'),
			'jumlah'	    => $this->input->post('jumlah'),
			'harga_total'   => $this->input->post('harga') * $this->input->post('jumlah'),
			'tb_cawl'       => $this->input->post('tb_cawl'),
			'ruang'         => $this->input->post('ruang'),
			'keterangan'    => $this->input->post('keterangan'),
			'f_nota'        => $data['file_name'],
			//'f_barang'      => $data['file_name'],
			//'sambung'		=> $this->input->post('kecamatan'),
		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->where('no_kontrak', $no_kontrak);
		$this->db->update('input_data', $data);

		$no_kontrak = $this->input->post('no_kontrak');
		$data = array(

			'status_perubahan' 	=> $this->input->post('status_perubahan') ?: '2',

		);


		$this->db->where('no_kontrak', $no_kontrak);
		$this->db->update('perubahan', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Update Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}
		redirect('pengajuan/index');
	}

	public function simpan_perubahan()
	{

		$data = array(


			'no_kontrak'    		=> $this->input->post('no_kontrak'),
			'keterangan_perubahan'  => $this->input->post('keterangan'),
			'uraian'	        	=> $this->input->post('uraian'),
			'status_perubahan'    	=> $this->input->post('status_perubahan') ?: '1',
		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->insert('perubahan', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', 'Sukses Input Data');
		} else {
			$this->session->set_flashdata('msg', 'Gagal');
		}

		$no_kontrak = $this->input->post('no_kontrak');
		$data = array(

			'stat_perubahan' 	=> $this->input->post('status_perubahan') ?: '2',

		);


		$this->db->where('no_kontrak', $no_kontrak);
		$this->db->update('input_data', $data);

		redirect('pengajuan/index');
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
}
