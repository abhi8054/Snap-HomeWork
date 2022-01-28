<?php
session_start();

$task = $_POST['action'];
switch ($task){
    case'login':
        $useremail=$_POST['useremail'];
        $userpass = $_POST['userpass'];

        include_once "partialpage/connection.php";

        $sql= "SELECT * FROM student WHERE studentemail = '$useremail' AND studentpass = '$userpass'";
        $execute=mysqli_query($conn,$sql);
        $res=mysqli_num_rows($execute);
        $row=mysqli_fetch_array($execute);
        if((int)$row[12]==1) {
            if ($res == 1) {
                session_start();
                $_SESSION['studentid'] = $row[0];
                $_SESSION['studentname'] = $row[2];
                $_SESSION['studentmail'] = $row[8];
                $_SESSION['sturoll'] = $row[1];
                echo "<script>alert('Login Successful');
                    window.location.href='studenthome.php';
                    </script>";
            } else {
                echo "<script>alert('Login Failed Incorrect User and Pass');
                    window.location.href='studentlogin.php';
                    </script>";
            }
        }else{
            echo "<script>alert('You aare currently Blocked Contact to Admin');
                    window.location.href='studentlogin.php';
                    </script>";
        }
        break;
    case 'reset':
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confpass = $_POST['confpass'];

        if ($newpass == $confpass) {

            include_once "partialpage/connection.php";

            $forgot_sql = "select * from student where studentpass = '$oldpass'";
            $execute2 = mysqli_query($conn, $forgot_sql);
            $res2 = mysqli_num_rows($execute2);

            if ($res2 == 1) {
                $update = "Update student set studentpass = '$newpass' where studentpass = '$oldpass'";
                mysqli_query($conn, $update);
                echo "<script>alert('Password Change Successfully');
                    window.location.href='studentlogin.php';
                    </script>";
            } else {
                echo "<script>alert('Old Password Does Not Match');
                    window.location.href='studentreset.php';
                    </script>";
            }
        } else {
            echo "<script>alert('New and Confirm Password Not Match');
                    window.location.href='studentreset.php';
                    </script>";
        }
        break;
}
?>