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
                        <h1>Download & Quiz Page</h1>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li class="active">Download & Quiz</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="white section">
            <div class="container">
                <div class="row">
                    <div id="course-content" class="col-md-8">
                        <div class="course-description">
                            <small>Download link for : <span><a href="course.php">Web Design & Development</a></span> </small>
                            <h3 class="course-title">Download Link</h3>
                            <a href="download&Quiz.php">Click Here to get the Full Course for Web Design & Development.</a>
                            <hr class="invis">

                            <small>Quiz for : <span><a href="course.php">Web Design & Development</a></span> </small>                            
                            <h3 class="course-title">Quizzes</h3>
                            <div class="quiz-wrapper">
                                <h4>What is HTML?</h4>                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-body">
                                                <div class="radio">
                                                    <label>
                                                        <input name="options1" id="" value="option1" checked type="radio">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quaerat omnis nisi,
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="options1" id="" value="option2" type="radio"> 
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="options1" id="" value="option3" type="radio"> 
                                                        Lorem ipsum dolor sit amet consectetur 
                                                    </label>
                                                </div>                                                
                                            </div>                                            
                                        </div>                                
                                    </div>
                                </div>                            
                            </div>
                            <div class="quiz-wrapper">
                                <h4>What is CSS?</h4>                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-body">
                                                <div class="radio">
                                                    <label>
                                                        <input name="options2" id="" value="option1" checked type="radio">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quaerat omnis nisi,
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="options2" id="" value="option2" type="radio"> 
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="options2" id="" value="option3" type="radio"> 
                                                        Lorem ipsum dolor sit amet consectetur 
                                                    </label>
                                                </div>                                                
                                            </div>                                            
                                        </div>                                
                                    </div>
                                </div>                            
                            </div>
                            <div class="quiz-wrapper">
                                <h4>What is Javascript?</h4>                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-body">
                                                <div class="radio">
                                                    <label>
                                                        <input name="options3" id="" value="option1" checked type="radio">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quaerat omnis nisi,
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="options3" id="" value="option2" type="radio"> 
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="options3" id="" value="option3" type="radio"> 
                                                        Lorem ipsum dolor sit amet consectetur 
                                                    </label>
                                                </div>                                                
                                            </div>                                            
                                        </div>                                
                                    </div>
                                </div>                            
                            </div>                                                            
                            <form action="download&Quiz.php" method="post">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" class="btn btn-default">Clear All</button>
                            </form>
                        </div>
                    </div>
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
                    </div>
                </div>                        
            </div>
        </section>

        <?php include("footer&copyright.php"); ?>
    </div>

    <?php include("jsExternal.html"); ?>
</body>
</html>