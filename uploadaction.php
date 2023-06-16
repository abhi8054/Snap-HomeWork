<?php
session_start();

$task = $_POST['action'];
switch ($task) {
    case'upload':
        $sid = $_SESSION['studentid'];
        $sname = $_POST['name'];
        $srol = $_POST['rollno'];
        $suid = $_POST['subject'];
        $assign = $_POST['assign'];
        $astatus = 1;
        include_once "partialpage/connection.php";
        $s = "SELECT studentroll,studentsem,coursename FROM student WHERE studentroll = '$srol' AND studentname='$sname'";
        $r = mysqli_query($conn, $s);
        $resStu = mysqli_fetch_row($r);
        $res = mysqli_num_rows($r);
        $course = $resStu[2];
        $sem = $resStu[1];
        if ($res) {
            $temail = $_POST['email'];
            $s1 = "SELECT teacheremail ,teacherid FROM teacher WHERE teacheremail='$temail'";
            $r1 = mysqli_query($conn, $s1);
            $res1 = mysqli_num_rows($r1);
            $row = mysqli_fetch_array($r1);
            if ($res1) {
                require 'PHPMailer/class.phpmailer.php';
                require 'PHPMailer/PHPMailerAutoload.php';
                $mail = new PHPMailer;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                $mail->Username = 'abhishek.kp6239@gmail.com';//Your Email Address
                $mail->Password = 'aphjpzbqmdjopkso';//Your Email Password
                $mail->setFrom('abhishek.kp6239@gmail.com', 'Snap Homework');

                $mail->addAddress($temail);//Receiver Email
//$mail->addReplyTo('subhratocoder@gmail.com');

                $mail->isHTML(true);

                $mail->Subject = '';
                $mail->Body = '<h1 style="color:red;">You have receive an assignment from</h><br>'.'<h3 style="color:red;">Roll No. :</h3>'.$srol.'<br><h3 style="color:red;">Name :</h3>'.$sname;

                if (!$mail->send()) {
                    echo "Something went wrong";
                    echo $mail->ErrorInfo;
                } else {
                    $tpath = $_FILES['doc']['tmp_name'];
                    $opath = $_FILES['doc']['name'];
                    $extension = strtolower(pathinfo($opath, PATHINFO_EXTENSION));
                    if ($extension != 'pdf' && $extension != 'doc') {
                        echo "<script>
                    alert('File format invalid');
                    window.location.href='assignmentupload.php';
                </script>";
                    } else {
                        move_uploaded_file($tpath, "photouploads/$opath");
                        include_once "partialpage/connection.php";
                        $sql = "INSERT INTO `upassign`(`subid`, `teacherid`, `studentid`, `coursename`, `assignpath`, `assignstatus`, `assignsem`, `sturoll`,`assignmentid` )
                            VALUES ('$suid','$row[1]','$sid','$course','photouploads/$opath','$astatus','$sem','$srol','$assign')";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                echo "<script>alert('Assignment Uploaded Successfully');
                                    window.location.href='assignmentupload.php';
                                     </script>";
                            } else {
                                echo "<script>
                                    alert('Assignment Uploaded Failed');
                                    window.location.href='assignmentupload.php';
                                    </script>";
                            }
                    }
                }
            } else {
                echo "<script>
                    alert('Email not invalid');
                    window.location.href='assignmentupload.php';
                </script>";
            }
        } else {
            echo "<script>
                    alert('Roll No invalid');
                    window.location.href='assignmentupload.php';
                </script>";
        }

}
?>
