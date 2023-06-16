<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="images/snap_logo_big.png" style="width: 130px; height: 55px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="studenthome.php"><i class="fas fa-home"></i> Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="studentsubject.php"><i class="fas fa-book-open"></i> My Subject </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="studentassignment.php"><i class="fas fa-clipboard"></i> My Assignment </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="studentnotes.php"><i class="fas fa-sticky-note"></i> My Notes </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="assignmentupload.php"><i class="fas fa-upload"></i> Assignment Upload </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-list-ol"></i> Options
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="viewmessage.php" onclick="seen()"> Messages </a></li>
                        <li><a class="dropdown-item text-warning" href="studentnotice.php">Notice Board</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-shield"></i> <?php echo $_SESSION['studentname'] ?>
                    </a>
                    <ul class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-warning" href="studentprofile.php">Profile</a></li>
                        <li><a class="dropdown-item text-warning" href="studentreset.php">Change Passwoord</a></li>
                        <li><a class="dropdown-item text-warning" href="studentlogout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>


