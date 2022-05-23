<?php
	// Connect to database server
	mysql_connect("localhost", "root", "root") or die (mysql_error ());

	// Select database
	mysql_select_db("omnessante") or die(mysql_error());

?>