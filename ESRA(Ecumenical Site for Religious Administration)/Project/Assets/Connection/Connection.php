<!--
  Author Name: Jaiden
  Page Purpose:TO connect the databasae to the connector
  Date:23/07/22
  
  -->

<?php
$servername="localhost";
$user="root";
$password="";
$database="db_aathmeeyam";

$conn=mysqli_connect($servername,$user,$password,$database);
if(!$conn)
{
	echo "Connection Failed";
}
?>
