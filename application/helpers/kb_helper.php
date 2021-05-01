<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if ( ! function_exists('kb_uraian'))
	{
	    function kb_uraian($kb)
	    {
	        switch ($kb)
	        {
	            case '1':
	                return "TANAH";
	                break;
	            case '2':
	                return "PERALATAN DAN MESIN";
	                break;
	            case '3':
	                return "GEDUNG DAN BANGUNAN";
	                break;
	            case '4':
	                return "JALAN, JARINGAN, DAN IRIGASI";
	                break;
	            case '5':
	                return "ASET TETAP LAINNYA";
	                break;
	            case '6':
	            	return "KONSTRUKSI DALAM PENGERJAAN";
	            	break;
	        }
	    }
	}
?>