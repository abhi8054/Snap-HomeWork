<?php

$conn=mysqli_connect("localhost","root",null,"snaphomework");
if(!$conn){
    $error=mysqli_connect_error();
    echo"<script>alert(\"connection fail\")</script>";
    echo"<h1 style='text-align: center'>$error</h1>";
}
?>


