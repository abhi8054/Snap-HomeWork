<?php
session_start();
$task = $_GET['option'];

switch ($task) {

    case'select':
        ?>
        <label for="selectsubject" class="form-label">Select Subject</label>
        <select name="subject" class="form-select text-info bg-transparent " onchange="getassign(this.value)" aria-label="Default select example" id="selectsubject">
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
                echo "<option class='bg-dark'>No subject found.....</option>";
            }
            ?>
        </select>
        <?php
        break;
    case 'assign':
        $cor = $_GET['coursename'];
        $sem = $_GET['semester'];
        $sub = $_GET['assignment'];
        ?>
        <label for="selectsubject" class="form-label">Select Assignmrnt</label>
        <select name="assign" class="form-select text-info bg-transparent " onchange="getaid(this.value)"
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

    case'select12':
        ?>
        <label for="selectsubject" class="form-label">Select Subject</label>
        <select name="subject" class="form-select text-info bg-transparent " onchange="getassign(this.value)" aria-label="Default select example" id="selectsubject">
            <option value="">Select Subject</option>
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
                echo "<option class='bg-dark'>No subject found.....</option>";
            }
            ?>
        </select>
        <?php
        break;
}