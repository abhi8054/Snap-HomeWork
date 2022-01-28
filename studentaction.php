<?php
session_start();

$task = $_POST['action'];
switch ($task) {
    case 'addstudent':
        $name = $_POST['name'];
        $fathername = $_POST['fathername'];
        $roll =$_POST['rollno'];
        $course = $_POST['coursename'];
        $sem = $_POST['semester'];
        $mobile = $_POST['mobile'];
        $guidancemobile = $_POST['guidancemobile'];
        $pass = $_POST['password'];

        $email = $_POST['email'];
        include_once "partialpage/connection.php";
        $s="SELECT studentemail FROM student";
        $e=mysqli_query($conn,$s);
        while($r=mysqli_fetch_array($e)){
            if($r[0] == $email){
                echo "<script>
                        alert(\"Email already Exist\");
                        window.location.href='studentadd.php';
                    </script>";
            }
        }

        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $address = $_POST['address'];
        $status= 1;

        $path_temp = $_FILES['photo']['tmp_name'];
        $path_org = $_FILES['photo']['name'];
        $extension = strtolower(pathinfo($path_org, PATHINFO_EXTENSION));
        $size = round($_FILES['photo']['size'] / 1024, 2);

        if ($extension != 'png' && $extension != 'jpg') {
            echo "<script>alert('Suppoted only png or jpg file');
                   </script>";
        } else {
            move_uploaded_file($path_temp, "photouploads/$path_org");
            include_once "partialpage/connection.php";
//            php mail
            require 'PHPMailer/class.phpmailer.php';
            require 'PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            $mail->Username = 'abhishek.kp6239@gmail.com';//Your Email Address
            $mail->Password = 'Poddar123@abhipoddar';//Your Email Password
            $mail->setFrom('abhishek.kp6239@gmail.com', 'Snap Homework');

            $mail->addAddress($email);//Receiver Email
//$mail->addReplyTo('subhratocoder@gmail.com');

            $mail->isHTML(true);

            $mail->Subject = '';
            $mail->Body = '<h1>Welcomr To Our Comunity</h1>.<br><h3 style="color:red;">Your Login user :</h3> '.$email.'<br><h3 style="color:red;">Your Login password :</h3>'.$pass;


            if (!$mail->send()) {
                echo "Something went wrong";
                echo $mail->ErrorInfo;
            } else {
                $add_stud = "INSERT INTO `student`(`studentroll`, `studentname`, `studentfather`, `studentsex`, `studentmobile`, `studentguidancemobile`, `studentaddress`, `studentemail`, `studentpass`, `studentphoto`, `coursename`, `studentstatus`, `studentsem`, `studentcountry`)
                    VALUES ('$roll','$name','$fathername','$gender','$mobile','$guidancemobile','$address','$email','$pass','photouploads/$path_org','$course','$status','$sem','$country')";
                $execute1 = mysqli_query($conn, $add_stud);
                if ($execute1) {
                    echo "<script>alert('Student Added Successfully');
                   window.location.href='studentadd.php';
                   </script>";
                } else {
                    echo "<script>alert('Student Added Failed');
                   window.location.href='studentadd.php';
                   </script>";
                }
            }
        }
        break;

    case 'block':
        $primary=$_POST['status'];
        include_once "partialpage/connection.php";
        $mysql="UPDATE student SET studentstatus = '0' WHERE studentid = '$primary'";
        $exe1=mysqli_query($conn,$mysql);
        echo"<script>
                window.location.href='studentview.php';
                </script>";
        break;
    case 'active':
        $primary1=$_POST['status'];
        include_once "partialpage/connection.php";
        $mysql="UPDATE student SET studentstatus = '1' WHERE studentid = '$primary1'";
        $exe2=mysqli_query($conn,$mysql);
        echo"<script>window.location.href='studentview.php';</script>";
        break;

    case 'deletestudent':
        $studentid = $_POST['studentid'];
        if (isset($studentid)) {
            include_once "partialpage/connection.php";

            $del_sql = "DELETE FROM student where studentid = '$studentid'";
            $execute2 = mysqli_query($conn, $del_sql);
            if ($execute2) {
                echo "<script>alert('Student Deleted Successfully');
                   window.location.href='studentview.php';
                   </script>";
            } else {
                echo "<script>alert('Student Deletion Failed');
                   window.location.href='studentview.php';
                   </script>";
            }
        }
        break;

    case 'updatestudent':
        $studentid = $_POST['studentid'];
        $sname = $_POST['name'];
        $sfname = $_POST['fathername'];
        $ssem = $_POST['semester'];
        $smobile = $_POST['mobile'];
        $sgmobile = $_POST['guidancemobile'];
        $scountry = $_POST['country'];
        $semail = $_POST['email'];
        $saddress = $_POST['address'];
        $scourse = $_POST['coursename'];

        $path_temp = $_FILES['photo']['tmp_name'];
        $path_org = $_FILES['photo']['name'];

        if($path_org == "" && $path_temp == ""){
            include_once "partialpage/connection.php";
            $tsql= "SELECT studentphoto FROM student WHERE studentid = '$studentid'";
            $done=mysqli_query($conn,$tsql);
            $pres=mysqli_fetch_array($done);
            $path_org=substr($pres[0],13);
        }else{
            move_uploaded_file($path_temp, "photouploads/$path_org");
        }

        include_once "partialpage/connection.php";

        $up_sql = "UPDATE `student` SET `studentname`='$sname',`studentfather`='$sfname',`studentmobile`='$smobile',`studentguidancemobile`='$sgmobile',`studentaddress`='$saddress',`studentemail`='$semail',`studentphoto`='photouploads/$path_org',`coursename`='$scourse',`studentsem`='$ssem',`studentcountry`='$scountry'
                    WHERE `studentid` = '$studentid'";
//        print_r($up_sql);
        $execute3 = mysqli_query($conn, $up_sql);
        print_r($execute3);
        if ($execute3) {
            echo "<script>alert('Student Updated Successfully');
                   window.location.href='studentview.php';
                   </script>";
        } else {
            echo "<script>alert('Student Update Failed');
                   window.location.href='studentview.php';
                   </script>";
        }
        break;
}
