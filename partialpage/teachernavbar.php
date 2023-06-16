<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="images/snap_logo_big.png" style="width: 130px; height: 55px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-info" aria-current="page" href="teacherhome.php"><i class="fas fa-home"></i> Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-info" href="teachersubject.php"><i class="fas fa-book-open"></i> My Subject </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-info" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-concierge-bell"></i> Attendance
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="attendancesheet.php">Mark Attendance</a></li>
                        <li><a class="dropdown-item text-warning" href="viewattendance.php">VIEW Attendance</a></li>
                        <li><a class="dropdown-item text-warning" href="dailyattendance.php">Daily Attendance</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-info" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-sticky-note"></i> Notes
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="addnotes.php">ADD Notes</a></li>
                        <li><a class="dropdown-item text-warning" href="notesview.php">VIEW Notes</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-info" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-clipboard"></i> Assignment
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="addassignment.php">ADD Assignment</a></li>
                        <li><a class="dropdown-item text-warning" href="viewassignment.php">VIEW Assignment</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-info" href="downloadassign.php"><i class="fas fa-download"></i> Submitted Assignment </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-info" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-list-ol"></i> Options
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="sendmessage.php">Send Message</a></li>
                        <li><a class="dropdown-item text-warning" href="teachernotice.php">Notice Board</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-info" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-shield"></i> <?php echo $_SESSION['teachername'] ?>
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="teacherprofile.php">Profile</a></li>
                        <li><a class="dropdown-item text-warning" href="teacherreset.php">Change Passwoord</a></li>
                        <li><a class="dropdown-item text-warning" href="teacherlogout.php">Log Out</a></li>
                    </ul>
                </li>

<!--                <li class="nav-item">-->
<!--                    <a class="nav-link text-info" href="teacherprofile.php"><i class="fas fa-user-alt"></i></i>Profile</a>-->
<!--                </li>-->
<!---->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link text-info" href="teacherreset.php"><i class="fas fa-unlock-alt"></i> Change Password</a>-->
<!--                </li>-->
<!---->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link text-info" onclick="return confirm('Are you sure you want to Log Out ?');" href="teacherlogout.php">Log Out <i class="fas fa-sign-out-alt"></i> </a>-->
<!--                </li>-->
            </ul>
            <!--            <form class="d-flex">-->
            <!--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
            <!--                <button class="btn btn-outline-warning text-warning" type="submit">Search</button>-->
            <!--            </form>-->
        </div>
    </div>
</nav>
