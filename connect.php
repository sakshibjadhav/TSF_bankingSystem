<?php

$servername="localhost";
$username="root";
$password="";
$database="bankingsystem";

$conn=mysqli_connect($servername,$username,$password,$database);

if($conn)
{
    echo "";
}
else
{
    echo "Error";
}

?>
