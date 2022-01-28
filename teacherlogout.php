<?php
session_start();
session_destroy();
echo "<script>window.location.href='teacherlogin.php';</script>";
?>