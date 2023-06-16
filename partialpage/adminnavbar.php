<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="images/snap_logo_big.png" style="width: 130px; height: 55px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-warning" aria-current="page" href="adminhome.php"><i class="fas fa-home"></i> Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-book"></i> Courses
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="courseadd.php">ADD Course</a></li>
                        <li><a class="dropdown-item text-warning" href="courseview.php">VIEW Course</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-book-open"></i> Subject
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="subjectadd.php">ADD Subject</a></li>
                        <li><a class="dropdown-item text-warning" href="subjectview.php">VIEW Subject</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-chalkboard-teacher"></i> Teacher
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="teacheradd.php">ADD Teacher</a></li>
                        <li><a class="dropdown-item text-warning" href="teacherview.php">VIEW Teacher</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-graduate"></i> Student
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="studentadd.php">ADD Student</a></li>
                        <li><a class="dropdown-item text-warning" href="studentview.php">VIEW Student</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-paste"></i> Notice
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="noticeadd.php">ADD Notice</a></li>
                        <li><a class="dropdown-item text-warning" href="noticeview.php">VIEW Notice</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-shield"></i> <?php echo $_SESSION['email'];?>
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="adminforgot.php">Change Password</a></li>
                        <li><a class="dropdown-item text-warning" href="adminlogout.php">Log Out</a></li>
                    </ul>
                </li>
<!---->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link text-warning" href="adminforgot.php"><i class="fas fa-unlock-alt"></i> Change Password</a>-->
<!--                </li>-->
<!---->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link text-warning" onclick="return confirm('Are you sure you want to Log Out ?');" href="adminlogout.php">Log Out <i class="fas fa-sign-out-alt"></i> </a>-->
<!--                </li>-->
            </ul>
<!--            <form class="d-flex">-->
<!--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--                <button class="btn btn-outline-warning text-warning" type="submit">Search</button>-->
<!--            </form>-->
        </div>
    </div>
</nav>
