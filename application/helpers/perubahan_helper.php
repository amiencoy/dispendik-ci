<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if ( ! function_exists('perubahan'))
	{
	    function perubahan($p)
	    {
	        switch ($p)
	        {
	            case '1':
	                return "Barang Rusak/Hilang";
	                break;
	            case '2':
	                return "Rubah Data";
	                break;
	            
	        }
	    }
	}
?>