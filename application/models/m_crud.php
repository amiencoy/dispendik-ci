<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_crud extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//function data($number,$offset)
	//{
	//	return $query = $this->db->get('input_data',$number,$offset)->result();		
	//} 

	public function get_kode_kec() 
	{
		$hasil = $this->db->query("SELECT * FROM kecamatan");
		return $hasil;
	}

	public function get_kode_kec_koor() 
	{
		$nip = $this->session->userdata('nip');
		$hasil = $this->db->query("SELECT * FROM kecamatan JOIN sambungan ON kecamatan.ID = sambungan.status JOIN login_admin ON sambungan.nip = login_admin.nip where login_admin.nip = $nip");
		return $hasil;
	}

	public function get_kode_lembaga($id)
	{
		$tampil_lembaga = $this->db->query("SELECT * FROM lembaga WHERE ID_kec='$id'");
		return $tampil_lembaga->result();
	}

	public function get_all()
	{
		$data = $this->db->query("SELECT * FROM input_data");
		return $data->result();
	}

	public function count_all()
	{
		$data = $this->db->query("SELECT * FROM input_data");
		return $data->num_rows();
	}

	public function get_kec()
	{
		$nip = $this->session->userdata('nip');
		$data = $this->db->query("SELECT * FROM input_data JOIN sambungan ON input_data.sambung = sambungan.status JOIN login_admin ON sambungan.nip = login_admin.nip WHERE login_admin.nip = $nip");
		return $data->result();
	}

	public function count_kec()
	{
		$nip = $this->session->userdata('nip');
		$data = $this->db->query("SELECT * FROM input_data JOIN sambungan ON input_data.sambung = sambungan.status JOIN login_admin ON sambungan.nip = login_admin.nip WHERE login_admin.nip = $nip");
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
	}

	public function simpan_data()
	{
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

			'kode_lembaga'  => $this->session->userdata('kode'),
			'no_kontrak'    => $this->session->userdata('kode').".".$this->input->post('kk').".".$this->input->post('sumber_dana').$this->input->post ('tgl_terima').".".$this->input->post('jumlah'),
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
			'keterangan'    => $this->input->post('keterangan') ?: 'baik',
			'f_nota'        => $data['file_name'], 
			//'f_barang'      => $data['file_name'],
			'sambung'		=> $this->session->userdata('ID_kec'),
			'stat_perubahan'    => $this->input->post('stat') ?: '1'
		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->insert('input_data', $data);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('msg', 'Sukses Input Data');
			}
			else{
				$this->session->set_flashdata('msg', 'Gagal');
			}
		redirect('dashboard/index');
	}

	public function simpan_data_admin()
	{
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
			'no_kontrak'    => $this->input->post('kode_lembaga').".".$this->input->post('kk').".".$this->input->post('sumber_dana').$this->input->post ('tgl_terima').".".$this->input->post('jumlah'),
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
			'keterangan'    => $this->input->post('keterangan') ?: 'baik',
			'f_nota'        => $data['file_name'], 
			//'f_barang'      => $data['file_name'],
			'sambung'		=> $this->input->post('kecamatan'),
		);

		//$this->db->where('no_kontrak',$no_kontrak); 
		$this->db->insert('input_data', $data);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('msg', 'Sukses Input Data');
			}
			else{
				$this->session->set_flashdata('msg', 'Gagal');
			}
		redirect('dashboard/index');
	}

	public function hapus_data($no_kontrak)
	{
		//$this->db->where('no_kontrak', $no_kontrak);
		//$this->db->delete('input_data');
		$this->db->query("DELETE FROM input_data where no_kontrak = '$no_kontrak'");
		$this->db->query("DELETE FROM perubahan where no_kontrak = '$no_kontrak'");
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

	public function get_ruang()
	{
		$query = $this->db->query("SELECT * FROM ruang");
		return $query;	
	}
	
	public function get_detail($no_kontrak)
	{
		$this->db->select('*');
		$this->db->from('input_data');
		//$this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa', 'left');
		$this->db->where('no_kontrak', $no_kontrak);
		return $this->db->get()->result();
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
