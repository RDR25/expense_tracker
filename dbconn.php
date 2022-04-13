<?php

$servername="localhost";
$username="root";
$password="rdr@25";
$database="et_data";

$conn=mysqli_connect($servername,$username,$password,$database);


if(!($conn))
{
   echo "success";
}
else
{
   die("Error".mysqli_connect_error());
}
mysqli_close($conn)
?>