<?php
$task = $_POST['action'];
switch ($task) {
    case 'submit':
        $username = $_POST['username'];
        $password = $_POST['password'];

        include_once "partialpage/connection.php";

        $submit_sql = "select * from admin where adminuser = '$username' and adminpass = '$password'";
        $execute1 = mysqli_query($conn, $submit_sql);
        $res=mysqli_fetch_array($execute1);
        $res1 = mysqli_num_rows($execute1);

        if ($res1 == 1) {
            session_start();
            $_SESSION['adminuser'] = $username;
            $_SESSION['password']=$password;
            $_SESSION['email']=$res[2];
            echo "<script>
                    window.location.href='adminhome.php';
                    </script>";
        } else {
            echo "<script>alert('Incorrect Username and Password');
                    window.location.href='adminlogin.php';
                    </script>";
        }
        break;
    case 'forgot':
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confpass = $_POST['confpass'];

        if ($newpass == $confpass) {

            include_once "partialpage/connection.php";

            $forgot_sql = "select * from admin where adminpass = '$oldpass'";
            $execute2 = mysqli_query($conn, $forgot_sql);
            $res2 = mysqli_num_rows($execute2);

            if ($res2 == 1) {
                $update = "Update admin set adminpass = '$newpass' where adminpass = '$oldpass'";
                mysqli_query($conn, $update);
                echo "<script>alert('Password Change Successfully');
                    window.location.href='adminlogin.php';
                    </script>";
            } else {
                echo "<script>alert('Old Password Does Not Match');
                    window.location.href='adminreset.php';
                    </script>";
            }
        } else {
            echo "<script>alert('New and Confirm Password Not Match');
                    window.location.href='adminreset.php';
                    </script>";
        }
}
?>
