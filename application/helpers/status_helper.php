<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if ( ! function_exists('status'))
	{
	    function status_uraian($status_perubahan)
	    {
	        switch ($status_perubahan)
	        {
	            case '1':
	                return "Belum Disetujui";
	                break;
	            case '2':
	                return "Sudah Disetujui";
	                break;
	        }
	    }
	}
?>