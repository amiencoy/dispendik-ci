<?php

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo', 'kk', 'kb', 'sumber_dana', 'perubahan');
        $this->load->model('m_detail');
    }

    /*public function print1($no_kontrak)
    {
        $data['all'] = $this->m_detail->get_detail($no_kontrak);
        $this->load->view('print_excel', $data);
    }*/

    public function print($no_kontrak)
    {
        $data = $this->m_detail->get_detail($no_kontrak);

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Kode Lembaga')
            ->setCellValue('B1', 'No. Kontrak')
            ->setCellValue('C1', 'Sumber Dana')
            ->setCellValue('D1', 'Kategori')
            ->setCellValue('E1', 'Jenis Barang')
            ->setCellValue('F1', 'Nama Barang')
            ->setCellValue('G1', 'Merk Barang')
            ->setCellValue('H1', 'Ukuran/CC')
            ->setCellValue('I1', 'Bahan')
            ->setCellValue('J1', 'Nama Toko')
            ->setCellValue('K1', 'Tanggal Beli')
            ->setCellValue('L1', 'Harga Satuan')
            ->setCellValue('M1', 'Banyak Barang')
            ->setCellValue('N1', 'Total')
            ->setCellValue('O1', 'TB/Cawulan')
            ->setCellValue('P1', 'Ruang')
            ->setCellValue('Q1', 'Keterangan');
        //$sheet->setCellValue('A18', 'Foto Barang');
        //$data['kode_lembaga'] = $this->input->post('kode_lembaga');
        //$data['get'] = $this->m_detail->get_detail($no_kontrak);
        //$no_kontrak = $this->input->post('no_kontrak');
        //$data = $this->m_detail->count_detail($no_kontrak);
        //return $data;

        $kolom = 2;
        $nomer = 1;

        //$no = 1;
        foreach ($data as $row) {
            //$sheet->setCellValue('D1', $no++);
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $row->kode_lembaga)
                ->setCellValue('B' . $kolom, $row->no_kontrak)
                ->setCellValue('C' . $kolom, sumber_dana($row->sumber_dana))
                ->setCellValue('D' . $kolom, kb_uraian($row->kb))
                ->setCellValue('E' . $kolom, kk_uraian($row->kk))
                ->setCellValue('F' . $kolom, $row->jenis_nama)
                ->setCellValue('G' . $kolom, $row->merk)
                ->setCellValue('H' . $kolom, $row->ukuran)
                ->setCellValue('I' . $kolom, $row->bahan)
                ->setCellValue('J' . $kolom, $row->nama_toko)
                ->setCellValue('K' . $kolom, mediumdate_indo($row->tgl_terima))
                ->setCellValue('L' . $kolom, $row->harga_satuan)
                ->setCellValue('M' . $kolom, $row->jumlah)
                ->setCellValue('N' . $kolom, $row->harga_total)
                ->setCellValue('O' . $kolom, $row->tb_cawl)
                ->setCellValue('P' . $kolom, $row->ruang)
                ->setCellValue('Q' . $kolom, $row->keterangan);
            //$sheet->setCellValue($x.'18', base_url('uploads/'.$row->f_nota));
            //$sheet->setCellValue($x.'19', $row->alamat);
            $kolom++;
            $nomer++;
        }
        //$spreadsheet = new Spreadsheet();
        //ob_end_clean();
        //setlocale(LC_ALL, 'en_US');
        $writer = new Xlsx($spreadsheet);
        //$filename = 'detail-barang';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="detail_barang.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function print_semua()
    {
        if ($this->session->userdata('level') === '1') {
			$data = $this->m_crud->get_all();
		}elseif($this->session->userdata('level') === '2'){
			$data = $this->m_crud->get_kec();
		}elseif($this->session->userdata('level') === '3'){
			$data = $this->m_crud->get_lembaga('kode');
		}else{
			echo "Access Denied";
		}
        
        

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Kode Lembaga')
            ->setCellValue('B1', 'No. Kontrak')
            ->setCellValue('C1', 'Sumber Dana')
            ->setCellValue('D1', 'Kategori')
            ->setCellValue('E1', 'Jenis Barang')
            ->setCellValue('F1', 'Nama Barang')
            ->setCellValue('G1', 'Merk Barang')
            ->setCellValue('H1', 'Ukuran/CC')
            ->setCellValue('I1', 'Bahan')
            ->setCellValue('J1', 'Nama Toko')
            ->setCellValue('K1', 'Tanggal Beli')
            ->setCellValue('L1', 'Harga Satuan')
            ->setCellValue('M1', 'Banyak Barang')
            ->setCellValue('N1', 'Total')
            ->setCellValue('O1', 'TB/Cawulan')
            ->setCellValue('P1', 'Ruang')
            ->setCellValue('Q1', 'Keterangan');
        //$sheet->setCellValue('A18', 'Foto Barang');
        //$data['kode_lembaga'] = $this->input->post('kode_lembaga');
        //$data['get'] = $this->m_detail->get_detail($no_kontrak);
        //$no_kontrak = $this->input->post('no_kontrak');
        //$data = $this->m_detail->count_detail($no_kontrak);
        //return $data;

        $kolom = 2;
        $nomer = 1;

        //$no = 1;
        foreach ($data as $row) {
            //$sheet->setCellValue('D1', $no++);
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $row->kode_lembaga)
                ->setCellValue('B' . $kolom, $row->no_kontrak)
                ->setCellValue('C' . $kolom, sumber_dana($row->sumber_dana))
                ->setCellValue('D' . $kolom, kb_uraian($row->kb))
                ->setCellValue('E' . $kolom, kk_uraian($row->kk))
                ->setCellValue('F' . $kolom, $row->jenis_nama)
                ->setCellValue('G' . $kolom, $row->merk)
                ->setCellValue('H' . $kolom, $row->ukuran)
                ->setCellValue('I' . $kolom, $row->bahan)
                ->setCellValue('J' . $kolom, $row->nama_toko)
                ->setCellValue('K' . $kolom, mediumdate_indo($row->tgl_terima))
                ->setCellValue('L' . $kolom, $row->harga_satuan)
                ->setCellValue('M' . $kolom, $row->jumlah)
                ->setCellValue('N' . $kolom, $row->harga_total)
                ->setCellValue('O' . $kolom, $row->tb_cawl)
                ->setCellValue('P' . $kolom, $row->ruang)
                ->setCellValue('Q' . $kolom, $row->keterangan);
            //$sheet->setCellValue($x.'18', base_url('uploads/'.$row->f_nota));
            //$sheet->setCellValue($x.'19', $row->alamat);
            $kolom++;
            $nomer++;
        }
        //$spreadsheet = new Spreadsheet();
        //ob_end_clean();
        //setlocale(LC_ALL, 'en_US');
        $writer = new Xlsx($spreadsheet);
        //$filename = 'detail-barang';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="detail_barang.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
