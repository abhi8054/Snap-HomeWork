<?php
session_start();
$task = $_GET['option'];

switch ($task) {

    case'select':
        ?>
        <label for="selectsubject" class="form-label">Select Subject</label>
        <select name="subject" class="form-select text-white bg-transparent " onchange="getassign(this.value)" aria-label="Default select example" id="selectsubject">
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

    case 'checkbox':
        ?>
        <section>
            <?php
            include_once "partialpage/connection.php";
            $course = $_GET['coursename'];
            $count = 0;
            $sql = "SELECT subname FROM subject WHERE coursename = '$course'";
            $exc = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($exc);
            if ($row != 0) {
                while ($res = mysqli_fetch_array($exc)) {
                    $count++;
                    ?>
                    <label class="form-check-label text-warning" style="margin-left: 5px" for="checkbox<?php echo $count; ?>">
                        <?php echo "$res[0]"; ?>
                    </label>
                    <input class="form-check-input text-warning" name="subject[]" type="checkbox" value="<?php echo "$res[0]"; ?>"
                           id="checkbox<?php echo $count; ?>">
                    <?php
                }
            } else {
                echo 'No subject found.....';
            }
            ?>
        </section>
        <?php
        break;
    case 'table1':
        $course = $_GET['coursename'];
        $sem = $_GET['semester'];
        if($course!="" && $sem!=""){
            ?>
            <h1 class="text-center mb-4 mt-4 text-info"><strong> Attendance Sheet </strong></h1>
            <?php
            include_once "partialpage/connection.php";
            $count=0;
            $sql="SELECT * FROM student WHERE coursename = '$course' AND studentsem='$sem'";
            $execute=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($execute);
            print_r($row);
            if($row !=0){
                ?>
                <table class="table table-hover table-dark table-bordered table-primary table-striped"
                       style="  border: 1px solid yellow;">
                <thead class="thead-dark">
                <tr>
                    <th>S No.</th>
                    <th>Mark Attendance</th>
                    <th>Roll No.</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Photo</th>
                    <th>Gender</th>
                </tr>
                </thead>
                <tbody>
            <?php
                while($res=mysqli_fetch_array($execute)){
                    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?> </td>
                        <td>
                            <label class="form-check-label" style="margin-left: 5px"
                                   for="checkbox<?php echo $count; ?>">Mark
                            </label>
                            <input class="form-check-input" name="roll[]" type="checkbox" value="<?php echo $res[0]; ?>"
                                   id="checkbox<?php echo $count; ?>">
                        </td>
                        <td><?php echo $res[1]; ?> </td>
                        <td><?php echo $res[2]; ?> </td>
                        <td><?php echo $res[3]; ?> </td>
                        <td>
                            <img src="<?php echo $res[10]; ?>" style="width: 50px;height: 50px;" alt="">
                        </td>
                        <td><?php echo $res[4]; ?> </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                </table>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-info bg-transparent text-info" name="action"  style="text-align: center;padding: 10px 20px;border-radius: 20px" value="addattendance">Done</button>
                </div>
                <?php
            }else{
                echo"<h1 class='text-info text-center mt-5 mb-5'>No Record Found.......</h1>";
            }
        }else{
            echo"<h1 class='text-info text-center mt-5 mb-5'>Please Select Course and Sem.......</h1>";
        }
        break;

    case 'table2':
        $course = $_GET['coursename'];
        $sem = $_GET['semester'];
        $dat = $_GET['date'];
        if($course!="" && $sem!=""){
            ?>
            <h1 class="text-center mb-4 mt-4 text-info"><strong> Attendance Sheet </strong></h1>

            <?php
            include_once "partialpage/connection.php";
            $count=0;
            $tid=$_SESSION['teacherid'];
            $sql="SELECT student.*,attendance.status FROM student INNER JOIN attendance ON student.studentid = attendance.studentid
                        WHERE student.coursename = '$course' AND student.studentsem='$sem' AND attendance.attendancedate = '$dat' AND teacherid = $tid";
            $execute=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($execute);
            if($row !=0){
                ?>

            <table class="table table-hover table-dark table-bordered table-primary table-striped"
                   style="  border: 1px solid yellow;">
            <thead class="thead-dark">
            <tr>
                <th>S No.</th>
                <td>Status</td>
                <th>Roll No.</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Photo</th>
                <th>Gender</th>
            </tr>
            </thead>
            <tbody>
            <?php
                while($res=mysqli_fetch_array($execute)){
                    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?> </td>
                        <td><?php echo $res[15]; ?></td>
                        <td><?php echo $res[1]; ?> </td>
                        <td><?php echo $res[2]; ?> </td>
                        <td><?php echo $res[3]; ?> </td>
                        <td>
                            <img src="<?php echo $res[10]; ?>" style="width: 50px;height: 50px;" alt="">
                        </td>
                        <td><?php echo $res[4]; ?> </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                </table>
                <?php
            }else{
                echo"<h1 class='text-info text-center mt-5 mb-5'>No Record Found.......</h1>";
            }
        }else{
            echo"<h1 class='text-info text-center mt-5 mb-5'>Please Select Course and Sem.......</h1>";
        }
        break;
}
?>
