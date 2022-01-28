<?php
session_start();
session_destroy();
echo "<script>
alert(\"Are you sure you want to logout ?\");
window.location.href='adminlogin.php';</script>";
?>