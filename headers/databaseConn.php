<?php 

	//to make the database connection here!
	// $connection=mysql_connect("localhost","lookup_certi","chandra@2811");
	// if(!$connection) {
	//     die("Error Establishing connection");
	// }
	// $db = mysql_select_db("new_certificates",$connection);
	// if(!$db) {
	//     die("Cannot select the database");
	// }

	// for the local connection
	$connection=mysql_connect("localhost","root","root");
	if(!$connection) {
	    die("Error Establishing connection");
	}
	$db = mysql_select_db("mrcertificates",$connection);
	if(!$db) {
	    die("Cannot select the database");
	}

?>