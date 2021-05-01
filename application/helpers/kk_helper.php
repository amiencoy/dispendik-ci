<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if ( ! function_exists('kk_uraian'))
	{
	    function kk_uraian($kk)
	    {
	        switch ($kk)
	        {
	            case 'A01':
	                return "TANAH";
	                break;
	            case 'B01':
	                return "ALAT BESAR";
	                break;
	            case 'B02':
	                return "ALAT ANGKUTAN";
	                break;
	            case 'B03':
	                return "ALAT BENGKEL DAN ALAT UKUR";
	                break;
	            case 'B04':
	                return "ALAT PERTANIAN";
	                break;
	            case 'B05':
	                return "ALAT KANTOR DAN RUMAH TANGGA";
	                break;
	            case 'B06':
	                return "ALAT STUDIO, KOMUNIKASI DAN PEMANCAR";
	                break;
	            case 'B07':
	                return "ALAT KEDOKTERAN DAN KESEHATAN";
	                break;
	            case 'B08':
	                return "ALAT LABORATORIUM";
	                break;
	            case 'B09':
	                return "PERSENJATAAN";
	                break;
	            case 'B10':
	                return "KOMPUTER";
	                break;
	            case 'B11':
	                return "ALAT EKSPLORASI";
	                break;
	            case 'B12':
	                return "ALAT PENGEBORAN";
	                break;
	            case 'B13':
	                return "ALAT PRODUKSI, PENGOLAH DAN PEMURNIAN";
	                break;
	            case 'B14':
	                return "ALAT BANTU EKSPLORASI";
	                break;
	            case 'B15':
	                return "ALAT KESELAMATAN KERJA";
	                break;
	            case 'B16':
	                return "ALAT PERAGA";
	                break;
	            case 'B17':
	                return "ALAT PERALATAN PROSES/PRODUKSI";
	                break;
	            case 'B18':
	                return "RAMBU-RAMBU";
	                break;
	            case 'B19':
	                return "PERALATAN OLAH RAGA";
	                break;
	            case 'C01':
	                return "BANGUNAN GEDUNG";
	                break;
	            case 'C02':
	                return "MONUMEN";
	                break;
	            case 'C03':
	                return "BANGUNAN MENARA";
	                break;
	            case 'C04':
	                return "TUGU TITIK KONTROL/PASTI";
	                break;
	            case 'D01':
	                return "JALAN DAN JEMBATAN";
	                break;
	            case 'D02':
	                return "BANGUNAN AIR";
	                break;
	            case 'D03':
	                return "INSTALASI";
	                break;
	            case 'D04':
	                return "JARINGAN";
	                break;
	            case 'E01':
	                return "BAHAN PERPUSTAKAAN";
	                break;
	            case 'E02':
	                return "BARANG BERCORAK KESENIAN/KEBUDAYAAN/OLAH RAGA";
	                break;
	        }
	    }
	}
?>