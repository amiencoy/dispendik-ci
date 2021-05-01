<?php 
 
class M_dashboard extends CI_Model{
	function __construct()
	{
		parent::__construct();
		//$this->load->database();
    }
    

    function eksekusi_edit()
    {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = '2048000';
        $config['max_width']     = '1024';
        $config['max_height']    = '768';
        $config['file_name']     = url_title($this->input->post('photo'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('photo');
        $data = $this->upload->data();
        
        $id = $this->input->post('id');
        $data = array(
            'no'            => $this->input->post('no'),
            'kode_lembaga'  => $this->input->post('kode_lembaga'),
            'no_kontrak'    => $this->input->post('no_kontrak'),
            'plafon_ang'    => $this->input->post('plafon_ang'),
            'jenis_nama'    => $this->input->post('jenis_nama'),
            'merk'          => $this->input->post('merk'),
            'ukuran'        => $this->input->post('ukuran'),
            'bahan'         => $this->input->post('bahan'),
            'harga_satuan'  => $this->input->post('harga_satuan'),
            'tgl_terima'    => $this->input->post('tgl_terima'),
            'nama_toko'     => $this->input->post('nama_toko'),
            'kategori'      => $this->input->post('kategori'),
            'tb_cawl'       => $this->input->post('tb_cawl'),
            'sumber_dana'   => $this->input->post('sumber_dana'),
            'harga_total'   => $this->input->post('harga_total'),
            'ruang'         => $this->input->post('ruang'),
            'keterangan'    => $this->input->post('keterangan'),
            'photo'         => $data['kwitansi']
            'photo'         => $data['foto barang']
        );
        
        $this->db->where('kode',$kode); 
        $this->db->update('tbl_mahasiswa',$data); 
        redirect('mahasiswa/index');
    }
}