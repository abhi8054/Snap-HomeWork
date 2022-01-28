    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Snap Homework</title>

        <?php
        include "partialpage/headerfiles.php";
        include_once "partialpage/favicon.php";
        ?>
        <style>
            #navbarSupportedContent ul li a:hover{
                 padding-bottom: 3px;
                 border-bottom: 2px solid yellow;
             }
            ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                color: #ffbf00 !important;
            }
            ::-moz-placeholder { /* Firefox 19+ */
                color: #ffbf00 !important;
            }
            :-ms-input-placeholder { /* IE 10+ */
                color: #ffbf00 !important;
            }
            :-moz-placeholder { /* Firefox 18- */
                color: #ffbf00 !important;
            }

            footer{
                margin-top: 0px !important;
            }
        </style>
    </head>
    <body style="background-image: url('images/snap_icon.png');background-color:rgba(0,0,0,0.67);background-position: center center;background-repeat: no-repeat;background-size: cover">

    <div style="background-image:linear-gradient(rgba(255,255,255,0.22),rgba(255,255,255,0.22));height:15vh;background-repeat: no-repeat;background-position: center center;background-size: cover">
        <?php
        include_once "partialpage/publicnavbar.php";
        ?>
    </div>
    <!--//Navigation -->

    <!--Slider-->

<div style="background-image: url('images/snap_icon.png');background-color:rgba(0,0,0,0.4);background-position: center center;background-repeat: no-repeat;background-size: cover" >
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="images/ban22.jpg"  class="d-block w-100" style="height: 100vh" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 50px; margin-bottom: 265px; color:yellow ;font-weight: bold">Grow up future choose right careerl</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="images/ban33.jpg" class="d-block w-100" style="height: 100vh" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 50px; margin-bottom: 265px; color:yellow ;font-weight: bold">Value of education to future</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/ban44.jpg" class="d-block w-100" style="height: 100vh" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 50px; margin-bottom: 265px; color:yellow ;font-weight: bold" >Take the help from experts staff</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--//Slider-->

    <!-- About us -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 style=" font-size: 55px; margin: 60px 0px; color:dodgerblue">Welcome</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 style="color: red">WE ARE THE LEADERS IN THE ONLINE EDUCATION.</h3>
                <p class="details text-warning mt-3 mb-3">We are leader in the online education. we are provide quality education to the
                    student which help them n their studies</p>
                <ul class="about-list " style="list-style-type: none">
                    <li>
                        <span style="font-size: 30px" class="fas fa-chess-rook text-danger" aria-hidden="true"> Our Mission</span>
                        <div>
                            <p style="font-size: 20px" class="text-warning">To provide quality education and spread the benefits of education to student by
                                synchronizing tradition with modernity as well as blending professional and vocational
                                education with traditional courses for student’s development</p>
                        </div>
                    </li>
                    <li>
                        <span class="fas fa-bus text-danger" style="font-size: 30px" aria-hidden="true"> Our Vission</span>
                        <div>
                            <p style="font-size: 20px" class="text-warning">Being quality conscious in all the programmes for imparting new educational and cultural
                                experiences.
                                Becoming more aware of the institutional as well as individual needs and thus working
                                with initiative, innovation and insight.
                                Moving Beyond the trageted standard limits through strategic planning</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-5">
                <img style="border-radius: 50%" class="img-fluid" src="images/ah.jpg">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1 style="margin: 60px 0; color: #0d6efd; font-size: 55px ">Our Progress</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <img style="border-radius: 50%" class="img-fluid" src="images/f1.jpg">
            </div>
            <div class="col-md-5">
                <h3 class="text-warning" >WHY DID THAT STUDENT FAIL AND HOW NOT TO FAIL?</h3>

                <div>
                    <p style="padding-top: 50px" class="text-warning">  Many teenagers are not challenged and have a lazy mindset, which leads to their ability to see
                        the need for preparation. Consequently, they feel things should be done for them or given to
                        them with little effort on their part. When parents and teachers don’t challenge them in this
                        area, they set them up for failure as they plan to transition into post-secondary education.  When parents and teachers don’t challenge them in this
                        area, they set them up for failure as they plan to transition into post-secondary education.</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1 style="margin: 60px 0; font-size: 50px; color: #0b5ed7" class="text-danger">Our Teachers</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h3 class="pt-3" style="color: green" >DEPARTMENTS</h3>
                <div>
                    <ul class="" style="color: #0aa21a">
                        <li class="active"><a href="#home" class=" text-decoration-none text-warning" style="font-size: 25px"><span> Department of Science</span></a></li>
                        <li><a href="#profile" class=" text-decoration-none text-warning" style="font-size: 25px"><span> Department of Computer Application</span></a>
                        </li>
                        <li><a href="#messages" class=" text-decoration-none text-warning" style="font-size: 25px"><span> Department of Arts </span></a>
                        </li>
                        <li><a href="#settings" class=" text-decoration-none text-warning" style="font-size: 25px" ><span> Department of Commerce</span></a></li>
                    </ul>
                    <h3 style="color: #0aa21a">Head of Department</h3>
                    <ul class="" style="color: #0aa21a">
                        <li class="active"><a href="#home" class=" text-decoration-none text-warning" style="font-size: 25px"><span> Dr. Amarpreet Singh</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <img style="border-radius: 50%" class="img-fluid" src="images/fh1.jpg">
            </div>

            <div class="row justify-content-center mt-5">
                <h1 class="text-center" style="color: #0d6efd ;margin-bottom: 20px">Student Reviews</h1>
                <div class="col-md-10">

                </div>
            </div>
        </div>
    </div>
</div>


    <?php
include_once "partialpage/footer.php";
include_once "partialpage/files.php";
?>

</body>
</html>
