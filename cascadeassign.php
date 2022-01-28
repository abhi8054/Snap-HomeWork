<?php
session_start();

$task = $_GET['option'];
switch ($task) {
    case 'select':
        ?>
        <label for="selectsubject" class="form-label">Select Subject</label>
        <select name="subject" class="form-select text-info bg-transparent " onchange="getsub(this.value)"
                aria-label="Default select example" id="selectsubject">
            <option class="bg-dark" value="">Select Subject</option>
            <?php
            $course = $_GET['coursename'];
            include_once "partialpage/connection.php";
            $sel_sub = "SELECT * FROM subject WHERE coursename = '$course'";
            $execute1 = mysqli_query($conn, $sel_sub);
            $row = mysqli_num_rows($execute1);
            if ($row != 0) {
                while ($res = mysqli_fetch_array($execute1)) {
                    echo "<option class='bg-dark' value='$res[0]'> $res[1]</option>";
                }
            } else {
                echo 'No subject found.....';
            }
            ?>
        </select>
        <?php
        break;
    case 'table':
        $course = $_GET['coursename'];
        $subject = $_GET['subject'];
        $sem = $_GET['semester'];
        $aid = $_GET['assign'];
        if ($course != "" && $subject != "" && $sem != "") {
            ?>
            <h1 class="text-center mb-4 mt-4 text-info"><strong> Assignment Details </strong></h1>
            <table class="table table-hover table-dark table-bordered table-primary table-striped"
                   style="  border: 1px solid yellow;">
            <thead class="thead-dark">
            <tr>
                <th>S No.</th>
                <td>Roll No.</td>
                <th>Name.</th>
                <th>File</th>
                <th class="text-center" colspan="2">Controls</th>
                <th>Evaluate</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include_once "partialpage/connection.php";
            $count = 0;
            $tid = $_SESSION['teacherid'];
            $sql = "SELECT student.studentroll,student.studentname,upassign.assignpath,upassign.assignstatus,student.studentid FROM student INNER JOIN upassign ON student.studentid = upassign.studentid
                        WHERE upassign.coursename = '$course' AND upassign.assignsem='$sem' AND upassign.subid = '$subject' AND upassign.teacherid = $tid AND upassign.assignmentid='$aid'";
//            echo $sql;
            $execute = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($execute);

            if ($row != 0) {
                while ($res = mysqli_fetch_array($execute)) {
                    $count++;
//                    echo $res[4];
                    ?>
                    <tr>
                        <td><?php echo $count; ?> </td>
                        <td><?php echo $res[0]; ?></td>
                        <td><?php echo $res[1]; ?> </td>
                        <td>
                            <embed src="<?php echo $res[2]; ?>" type="application/pdf" style="width: 50px;height: 50px;"
                                   alt="">
                        </td>
                        <td class="text-center">
                            <a class="text-warning " href="<?php echo $res[2]; ?>" download
                               style="text-decoration: none;font-size: 20px"><i class="fas fa-download"></i> &nbsp;Download
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="text-warning " href="<?php echo $res[2]; ?>" target="_blank"
                               style="text-decoration: none;font-size: 20px"><i class="fas fa-eye"></i> &nbsp;View </a>
                        </td>
                        <td>
                            <?php
                            if ((int)$res[3] == 1){
                                ?>
                                <div class="mb-3">
                                    <select name="grade" class="form-select text-info bg-transparent"
                                            onchange="marks(this.value,<?php echo $res[4]; ?>)"
                                            aria-label="Default select example" id="marks1<?php echo $count ?>">
                                        <option class="bg-dark" value="">Grade</option>
                                        <option class="bg-dark" value="O">O</option>
                                        <option class="bg-dark" value="A">A</option>
                                        <option class="bg-dark" value="B">B</option>
                                        <option class="bg-dark" value="C">C</option>
                                        <option class="bg-dark" value="D">D</option>
                                        <option class="bg-dark" value="F">F</option>
                                    </select>
                                </div>
                                <?php
                            }else{
                            include_once "partialpage/connection.php";
                            $q = "SELECT grade FROM marks WHERE studentid='$res[4]' ";
                            $e=mysqli_query($conn,$q);
                            $r=mysqli_fetch_array($e);
                            ?>
                            <div class="mb-3">
                                   <select name="grade" class="form-select text-info bg-transparent"
                                        aria-label="Default select example" disabled id="marks1<?php echo $count ?>">
                                    <option value=""><?php echo $r[0]; ?></option>
                                   </select>
                                    <?php
                                    }
                                    ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                </table>
                <?php
            } else {
                echo "<h1 style='position: absolute;color: deepskyblue; top: 29vh; left:37%'>No Record Found.......</h1>";
            }
        } else {
            echo "<h1 style='position: absolute;color: deepskyblue; top: 5vh; left:20%'>Please Select Course, Subject and Sem.......</h1>";
        }
        break;

    case 'assign':
        $cor = $_GET['coursename'];
        $sem = $_GET['semester'];
        $sub = $_GET['assignment'];
        ?>
        <label for="selectsubject" class="form-label">Select Assignmrnt</label>
        <select name="assign" class="form-select text-white bg-transparent " onchange="getaid(this.value)"
                aria-label="Default select example" id="selectsubject">
            <option class="bg-dark" value="">Select Assignment</option>
            <?php
            $course = $_GET['coursename'];
            include_once "partialpage/connection.php";
            $sel_sub = "SELECT assignmentid,assignmenttopic FROM assignment WHERE coursename = '$cor' AND subid='$sub'AND assignmentsem='$sem'";
            $execute1 = mysqli_query($conn, $sel_sub);
            $count = 0;
            $row = mysqli_num_rows($execute1);
            if ($row != 0) {
                while ($res = mysqli_fetch_array($execute1)) {
                    $count++;
                    echo "<option class='bg-dark' value='$res[0]'>Assignment $count ->  $res[1]</option>";
                }
            } else {
                echo "<option class='bg-dark'>No Assignment found.....</option>";
            }
            ?>
        </select>
        <?php
        break;
}