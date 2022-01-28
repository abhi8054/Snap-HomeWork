<?php

session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("location:adminlogin.php");
}

$task = $_POST['action'];
switch ($task) {
    case 'addteacher':
        $name = $_POST['name'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $qualification = $_POST['qualification'];

        $email = $_POST['email'];
        include_once "partialpage/connection.php";
        $s = "SELECT teacheremail FROM teacher";
        $e = mysqli_query($conn, $s);
        while ($r = mysqli_fetch_array($e)) {
            if ($r[0] == $email) {
                echo "<script>
                        alert(\"Email already Exist\");
                        window.location.href='teacheradd.php';
                    </script>";
            }
        }

        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $course = $_POST['coursename'];

        $subjectarr = $_POST['subject'];
        $subject = implode(", ", $subjectarr);

        $path_temp = $_FILES['photo']['tmp_name'];
        $path_org = $_FILES['photo']['name'];
        $extension = strtolower(pathinfo($path_org, PATHINFO_EXTENSION));
//        $size = round($_FILES['photo']['size'] / 1024, 2);

        if ($extension != 'png' && $extension != 'jpg') {
            echo "<script>alert('Suppoted only png or jpg file');
                  window.location.href='teacheradd.php';
                   </script>";
        } else {
            move_uploaded_file($path_temp, "photouploads/$path_org");
            include_once "partialpage/connection.php";

//            PHP Mail
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
            $mail->Body = '<h1>Welcomr To Our Comunity</h1>.<br><h3 style="color:red;">Your Login user :</h3> '.$email.'<br><h3 style="color:red;">Your Login password :</h3>'.$password;

            if (!$mail->send()) {
                echo "Something went wrong";
                echo $mail->ErrorInfo;
            } else {

                $add_teacher = "INSERT INTO `teacher`(`teachername`, `teachermobile`, `teacheraddress`, `teacherphoto`, `teacherquali`, `teacheremail`, `teacherpass`, `teachersubject`, `teachersex`, `teacherstate`, `teachercountry`, `coursename`) 
                        VALUES ('$name','$mobile','$address','photouploads/$path_org','$qualification','$email','$password','$subject' ,'$gender','$state','$country','$course')";

                $execute1 = mysqli_query($conn, $add_teacher);
//                print_r($execute1);
                if ($execute1) {
                    echo "<script>alert('Teacher Added Successfully');
                  window.location.href='teacheradd.php';
                   </script>";
                } else {
                    echo "<script>alert('Teacher Added Failed');
                  window.location.href='teacheradd.php';
                   </script>";
                }
            }
        }


        break;

    case 'deleteteacher':

        $teacherid = $_POST['teacherid'];
        if (isset($teacherid)) {

            include_once "partialpage/connection.php";

            $del_sql = "DELETE FROM teacher where teacherid = '$teacherid'";
            $execute2 = mysqli_query($conn, $del_sql);
            if ($execute2) {
                echo "<script>alert('Teacher Deleted Successfully');
                   window.location.href='teacherview.php';
                   </script>";
            } else {
                echo "<script>alert('Teacher Deletion Failed');
                   window.location.href='teacherview.php';
                   </script>";
            }
        }
        break;

    case 'updateteacher':

        $teacherid = $_POST['teacherid'];
        $tname = $_POST['name'];
        $tpass = $_POST['password'];
        $tmobile = $_POST['mobile'];
        $tstate = $_POST['state'];
        $tcountry = $_POST['country'];
        $temail = $_POST['email'];
        $tqual = $_POST['qualification'];
        $taddress = $_POST['address'];
        $tcourse = $_POST['coursename'];

        $tsubjet = $_POST['subject'];
        $sub = implode(", ", $tsubjet);

        $path_temp = $_FILES['photo']['tmp_name'];
        $path_org = $_FILES['photo']['name'];

        if ($path_org == "" && $path_temp == "") {
            include_once "partialpage/connection.php";
            $tsql = "SELECT teacherphoto FROM teacher WHERE teacherid = '$teacherid'";
            $done = mysqli_query($conn, $tsql);
            $pres = mysqli_fetch_array($done);
            $path_org = substr($pres[0], 13);
        } else {
            move_uploaded_file($path_temp, "photouploads/$path_org");
        }
        include_once "partialpage/connection.php";

        $up_sql = "UPDATE `teacher` SET `teachername`='$tname',`teachermobile`='$tmobile',`teacheraddress`='$taddress',`teacherquali`='$tqual',`teacheremail`='$temail',`teacherpass`='$tpass',`teacherstate`='$tstate',`teachercountry`='$tcountry', `coursename` ='$tcourse',`teachersubject` = '$sub',`teacherphoto`= 'photouploads/$path_org' 
                    WHERE teacherid = '$teacherid'";
        $execute3 = mysqli_query($conn, $up_sql);
        if ($execute3) {
            echo "<script>alert('Teacher Updated Successfully');
                   window.location.href='teacherview.php';
                   </script>";
        } else {
            echo "<script>alert('Teacher Update Failed');
                   window.location.href='teacherview.php';
                   </script>";
        }
        break;
}
?>
