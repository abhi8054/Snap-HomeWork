
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us</title>
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

    </style>
</head>

<body>
<body style="background-image: url('images/snap_icon.png');background-color:rgba(0,0,0,0.67);background-position: center center;background-repeat: no-repeat;background-size: cover">

<div style="background-image:linear-gradient(rgba(255,255,255,0.22),rgba(255,255,255,0.22));height:15vh;background-repeat: no-repeat;background-position: center center;background-size: cover">
    <?php
    include_once "partialpage/publicnavbar.php";
    ?>
</div>
<!-- inner page banner -->
<section class="innerpage_banner">
	<div class="dot1">
		
	</div>
</section>
<!-- //inner page banner -->
<!-- about -->
	<div class="about">
		<div class="container  py-md-3">
			<div class="w3-head-all mb-3 text-center">
		         <h5 style="margin: 65px 0px; font-size: 50px; color: #0d6efd;">About More</h5>
            </div>
			<div class="agile_about_grids row">
				<div class="col-md-6 agile_about_grid_left">
				<div class="row">
					<div class="col-md-6 agile_about_grid_left1">
						<img src="images/ab1.jpg" alt=" " class="img-responsive img-fluid" />
					</div>
					<div class="col-md-6 agile_about_grid_left1">
						<img src="images/ab2.jpg" alt=" " class="img-responsive img-fluid" />
					</div>
					</div>
					<div class="clearfix"> </div>
					<img class="agile_about_grid_left_img img-responsive img-fluid" src="images/ab3.jpg" alt=" " />
				</div>
				<div class="col-md-6 agile_about_grid_right">
					<p class=" text-justify" style="color: #ff9720"> A multi faculty institution, that aims to blend professional & vocational
                        education with traditional courses, it is an excellent model of development.
                        The thrust of the college is on the highly innovative and efficient management of all
                        its resources – human and infrastructural.The college combines teaching excellence with
                        extensive sports and cultural opportunities. The academic
                        thrust is on imparting in-depth knowledge of the subjects concerned and to develop
                        critical abilities to enable the students to relate and use knowledge in real life situations.
                        The co-academic and cultural activities are focused around inculcating a strong sense of
                        obligation to nationalist, social & aesthetic values. Nurtured by an ideal amalgam of
                        facilities and facilitators, the college scholars and artists have been winning the highest
                        honours in their fields of interest A multi faculty institution, that aims to blend professional & vocational
                        education with traditional courses, it is an excellent model of development.
                        The thrust of the college is on the highly innovative and efficient management of all
                        its resources – human and infrastructural.The college combines teaching excellence with
                        extensive sports and cultural opportunities. The academic.</p>

				</div>
                <div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->
<?php
include "partialpage/footer.php";
include_once "partialpage/files.php";
?>
</body>
</html>