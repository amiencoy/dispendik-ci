<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	if ( ! function_exists('sumber_dana'))
	{
	    function sumber_dana($sd)
	    {
	        switch ($sd)
	        {
	            case 'D':
	                return "BOSDA";
	                break;
	            case 'R':
	                return "BOSREG";
	                break;
	            case 'H':
	                return "HIBAH";
	                break;
	            case 'M':
	                return "MUTASI";
                break;
	        }
	    }
	}
?>