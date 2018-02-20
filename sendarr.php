<?php

     require_once'Config.php';
error_reporting(E_ALL);
        ini_set( 'display_errors', 1);
        ini_set( 'display_startup_errors', 1);	    
       $This = (
new SendRequest( $url ) )
	->  headers  ( $headers )
	->  post     ( [ 

      "var_A" => array("A1", "A2", "A3"), 
      "var_B" => array("B1", "B2", "B3"), 
      "var_C" => array("C1", "C2", "C3"), 
      "var_D" => array("D1", "D2", "D3"), 
      "var_E" => array("E1", "E2", "E3"),
      "var_F" => array("F1", "F2", "F3"), 
      "var_G" => array("G1", "G2", "G3"),
	  
    ] );
		print_r ($This) .
			'<br> ' ;
		?>
