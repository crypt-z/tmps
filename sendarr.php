<?php



       error_reporting(E_ALL);
       ini_set('display_errors', 1);
       ini_set('display_startup_errors', 1);	   
       require_once 'SendRequest.php';
     
       $test = (
		  new SendRequest ( $url ))
		   -> headers ( $headers )
		   -> post ([ 
       
       "Key"  => array("iPhone5", "iPhone5s", "iPhone6") ,
     
       "Gen"  => array("iPhone5", "iPhone5s", "iPhone6") ,
       
       "Byte" => array("iPhone5", "iPhone5s", "iPhone6") ,
     
       "apple"=> array("iPhone5", "iPhone5s", "iPhone6") ,
     
       "samsumg"=> array("Samsung Galaxy III", "Samsung Galaxy ACE II"),
   
       "nokia" => array("Nokia N9", "Nokia Lumia 930"),
     
       "sony" => array("Sony XPeria Z3", "Xperia Z3 Dual", "Xperia T2 Ultra"),
     
	  ]) ;
    
		 print_r ($test).'<br>' ;
 

?>
