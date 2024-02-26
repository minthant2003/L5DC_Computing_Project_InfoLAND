<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoLAND | Online Learning Platform</title>
    <link rel="shortcut icon" href="images/tabicon.ico" type="image/x-icon" />

    <?php include("cssExternal.html"); ?>    
</head>
<body>
    <?php include("loader.html"); ?>

    <div id="wrapper">
        <?php include("topbar&header.php"); ?>  

        <section class="grey page-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h1>Web Design & Development</h1>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="coursesGrid.php">Courses</a></li>
                                <li class="active">Web Design & Development</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="white section">
            <div class="container">
                <div class="row">
                    <div id="course-left-sidebar" class="col-md-4">
                        <div class="course-image-widget">
                            <img src="upload/xcourse_01.png.pagespeed.ic.XTOvCuUmZu.png" alt="course" class="img-responsive">
                        </div>
                        <div class="course-meta">
                            <p class="course-category">Category : <a href="coursesGrid.php">Web Development</a></p>
                            <hr>
                            <div class="rating">
                                <p>Reviews : &nbsp;
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <a title="reviews" data-toggle="collapse" data-target="#collapseExample" style="cursor:pointer;">&nbsp; (3)</a>
                                </p>
                            </div>
                            <hr>
                            <p class="course-prize">Completion : <i class="fa fa-trophy"></i> <i class="fa fa-certificate"></i> Certificate</p>
                            <hr>
                            <p class="course-instructors">Instructor : 
                                <a href="#" title="instructor"><img src="upload/xteam_01.jpg.pagespeed.ic.uNKwi9Xmie.jpg" class="img-circle" alt="instructor1"></a>
                                <a href="#" title="instructor"><img src="upload/xteam_02.jpg.pagespeed.ic.Foo3PN64df.jpg" class="img-circle" alt="instructor2"></a>
                                <a href="#" title="instructor"><img src="upload/xteam_03.jpg.pagespeed.ic.Mw22RnI1eL.jpg" class="img-circle" alt="instructor3"></a>
                                <a href="#" title="instructor"><img src="upload/xteam_04.jpg.pagespeed.ic.equz9NTtM1.jpg" class="img-circle" alt="instructor4"></a>
                            </p>
                            <hr>
                            <p class="course-forum">Course Forum : <a href="#" title="forum">Web Development</a></p>
                        </div>
                        <div class="course-button">
                            <a href="shoppingCart.php" class="btn btn-primary btn-block">ADD TO SHOPPING CART <i class="fa fa-shopping-cart"></i></a>
                        </div>
                    </div>
                    <div id="course-content" class="col-md-8">
                        <div class="course-description">
                            <small>Course Status: <span>Active</span> </small>
                            <small>Course Price: <span>$21.00</span> </small>
                            <h3 class="course-title">Learning Quality Graphic Design & Mockup and Business Card</h3>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                alteration in some form, by injected humour, or randomised words which don't look even slightly
                                believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                                embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat
                                predefined chunks as necessary, making this the first true generator on the Internet.</p>
                            <p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to
                                generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from
                                repetition, injected humour, or non-characteristic words etc.</p>
                        </div>
                        <hr class="invis">
                        <div id="reviews" class="feedbacks">
                            <p>
                                <a class="btn btn-default btn-block" role="button" data-toggle="collapse" data-target="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                                What Our Learners said? (3 Comments)
                                </a>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="well">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="upload/xstudent_01.png.pagespeed.ic.756JwMcqdq.png"
                                                alt="student1">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">John DOE</h4>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                                commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                                                nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="upload/xstudent_02.png.pagespeed.ic.y-PM-y4pVj.png"
                                                alt="student2">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Amanda FOXOE</h4>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                                commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                                                nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object" src="upload/xstudent_03.png.pagespeed.ic.uCQY3WNMCJ.png"
                                                alt="student3">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Mark BOBS</h4>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                                                commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                                                nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-success">
                                *** this section should be comment form submitted to the database for review on each course by learners. ***
                            </div>

                        </div>
                    </div>
                </div>            
            </div>
        </section>

        <?php include("popularCourses.php"); ?>

        <?php include("footer&copyright.php"); ?>
    </div>

    <?php include("jsExternal.html"); ?>
</body>
</html>