<?php
session_start();

$task=$_POST['action'];

switch($task){
    case 'sendmsg':
        $tid=$_SESSION['teacherid'];
        $cor=$_POST['coursename'];
        $sem=$_POST['semester'];
        $flag=1;
        $date=date('Y-m-d');
        $message=$_POST['message'];
        include_once "partialpage/connection.php";
        $sql="INSERT INTO `sendmessage`(`messagedate`, `messagestatus`, `message`, `coursename`, `teacherid`, `messagesem`)
                VALUES ('$date','$flag','$message','$cor','$tid','$sem')";
        $exe=mysqli_query($conn,$sql);
        if($exe==1){
            echo "<script>alert('Message sent Succsessfully');
                    window.location.href='sendmessage.php';
                    </script>";
        }else{
            echo "<script>alert('Message not sent');
                    window.location.href='sendmessage.php';
                    </script>";
        }
        break;
}
