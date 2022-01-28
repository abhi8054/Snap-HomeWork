<?php
session_start();
$task = $_GET['option'];
switch ($task) {
    case 'notes':
        $sub=$_GET['subject'];
        $count=0;
        $sid = $_SESSION['studentid'];
        include_once "partialpage/connection.php";
        $s = "SELECT coursename FROM student WHERE studentid = '$sid'";
        $r = mysqli_query($conn, $s);
        $row = mysqli_fetch_array($r);
        ?>
        <h1 class="text-center mb-4 mt-4 text-white"><strong> All <?php echo $sub; ?> Notes</strong></h1>
            <table class="table table-hover table-dark table-bordered table-primary table-striped"
                   style="  border: 1px solid yellow;">
            <thead class="thead-dark">
            <tr>
                <th>S No.</th>
                <td>Title</td>
                <th>File</th>
                <th>Description</th>
                <th>Course</th>
                <th>Subject</th>
                <th class="text-center" colspan="2">Controls</th>
            </tr>
            </thead>
            <tbody>
            <?php
        include_once "partialpage/connection.php";
        $s = "select notes.*,subject.subname from notes inner join subject ON notes.subid=subject.subid where notes.coursename = '$row[0]' AND subject.subname='$sub'; ";
        $e = mysqli_query($conn, $s);
        $rst=mysqli_num_rows($e);
        if ($rst !=0) {
            while ($res = mysqli_fetch_array($e)) {
                $count++;
                ?>
                <tr>
                    <td><?php echo $count; ?> </td>
                    <td><?php echo $res[4]; ?> </td>
                    <td>
                        <embed src="<?php echo $res[3]; ?>" type="application/pdf" style="width: 50px;height: 50px;" alt="">
                    </td>
                    <td><?php echo $res[5]; ?></td>
                    <td><?php echo $res[1]; ?> </td>
                    <td><?php echo $res[9]; ?> </td>
                    <td class="text-center">
                        <a class="text-warning " href="<?php echo $res[3]; ?>" download style="text-decoration: none;font-size: 20px"><i class="fas fa-download"></i> &nbsp;Download </a>
                    </td>
                    <td class="text-center">
                        <a class="text-warning " href="<?php echo $res[3]; ?>" target="_blank" style="text-decoration: none;font-size: 20px"><i class="fas fa-eye"></i> &nbsp;View </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            </table>
            <?php
        }else{
            echo"<h1 style='position: absolute; top: 30vh; left:37%'>No Record Found.......</h1>";
        }
    break;
    case'assign':
        $sub=$_GET['subject'];
        $count=0;
        $sid = $_SESSION['studentid'];
        include_once "partialpage/connection.php";
        $s = "SELECT coursename FROM student WHERE studentid = '$sid'";
        $r = mysqli_query($conn, $s);
        $row = mysqli_fetch_array($r);
        ?>
        <h1 class="text-center mb-4 mt-4 text-white"><strong> All <?php echo $sub; ?> Assignment</strong></h1>
        <table class="table table-hover table-dark table-bordered table-primary table-striped"
               style="  border: 1px solid yellow;">
        <thead class="thead-dark">
        <tr>
            <th>S No.</th>
            <td>Title</td>
            <th>File</th>
            <th>Description</th>
            <td>Last Date</td>
            <th>Course</th>
            <th>Subject</th>
            <th class="text-center" colspan="2">Controls</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once "partialpage/connection.php";
        $s = "select assignment.*,subject.subname from assignment inner join subject ON assignment.subid=subject.subid where assignment.coursename = '$row[0]' AND subject.subname='$sub'";
        $e = mysqli_query($conn, $s);
        $rst=mysqli_num_rows($e);
//        print_r($res = mysqli_fetch_array($e));
        if ($rst !=0) {
            while ($res = mysqli_fetch_array($e)) {
                $count++;
                ?>
                <tr>
                    <td><?php echo $count; ?> </td>
                    <td><?php echo $res[1]; ?> </td>
                    <td>
                        <embed src="<?php echo $res[3]; ?>" type="application/pdf" style="width: 50px;height: 50px;" alt="">
                    </td>
                    <td><?php echo $res[2]; ?></td>
                    <td><?php echo $res[7]; ?></td>
                    <td><?php echo $res[8]; ?> </td>
                    <td><?php echo $res[9]; ?> </td>
                    <td class="text-center">
                        <a class="text-warning " href="<?php echo $res[3]; ?>" download style="text-decoration: none;font-size: 20px"><i class="fas fa-download"></i> &nbsp;Download </a>
                    </td>
                    <td class="text-center">
                        <a class="text-warning " href="<?php echo $res[3]; ?>" target="_blank" style="text-decoration: none;font-size: 20px"><i class="fas fa-eye"></i> &nbsp;View </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            </table>
            <?php
        }else{
            echo"<h1 style='position: absolute; top: 30vh; left:37%'>No Record Found.......</h1>";
        }
        break;
}
?>