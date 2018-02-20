<?php 

      if ( isset($_POST['Key'] )) {
   // echo $_POST['Key'].'<br>';
}

      if ( isset($_POST['Gen'] )) {
	//echo $_POST['Gen'].'<br>';
}

      if ( isset($_POST['Byte'])) {
	//echo $_POST['Byte'].'<br>';
}
    
      else {
	echo '<br>else' ;
	}
	//print_r ($_POST);

	$data = $_POST;

	foreach ($data as $var => $vars)
	{
		echo "<h3>$var</h3>";
		echo "<ul>";
		foreach ($vars as $key => $value)
		{
			echo "<li>$value</li>";
		}
		echo "</ul>";
  }


/*

	foreach ( $vars as $that => $item )

	echo /*"$that"*/ /*"<br />$item";
	
	foreach ($item as $key => $value)
    {
        echo "$item, $key, $value";
    }
    echo "</ul>";*/
    ?>
