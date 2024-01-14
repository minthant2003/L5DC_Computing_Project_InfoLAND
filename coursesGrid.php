<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoLAND | Online Learning Platform</title>
    <link rel="shortcut icon" href="images/tabicon.ico" type="image/x-icon" />

    <?php include("cssExternal.php"); ?>
</head>
<body>
    <?php include("loader.php"); ?>

    <div id="wrapper">
        <?php include("topbar&header.php"); ?>

        <section class="grey page-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h1>Courses List</h1>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Courses List</li>                                
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="white section">
            <div class="container">
                <div id="filters" class="filters-dropdown">
                    <ul class="option-set" data-option-key="filter">
                        <li><a href="#" class="selected" data-option-value="*"><i class="fa fa-filter"></i> All Courses</a></li>
                        <li><a href="#" data-option-value=".free">Free</a></li>
                        <li><a href="#" data-option-value=".web">Web Development</a></li>
                        <li><a href="#" data-option-value=".programming">Programming Languages</a></li>
                        <li><a href="#" data-option-value=".network">Networking</a></li>
                        <li><a href="#" data-option-value=".security">Cyber Security</a></li>
                        <li><a href="#" data-option-value=".cloud">Cloud Computing</a></li>
                    </ul>
                </div>
                <div class="portfolio course-list">
                    <div class="item free">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_01.png.pagespeed.ic.XTOvCuUmZu.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Learn Web Design & Development</a></h4>
                                <div class="shopmeta">                                
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item cloud">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_02.png.pagespeed.ic.PL7Wu2UcSB.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Graphic Design & Logo Mockups Course</a></h4>
                                <div class="shopmeta">                                    
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item security">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_03.png.pagespeed.ic.8e1MyY5M7i.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Social Media Network & Marketing</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item cat1 programming">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_04.png.pagespeed.ic.2rIKmUwjA7.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">WordPress Blogging, Tumblr and Blogger</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item free">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_05.png.pagespeed.ic.mrKpzOf8LX.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Learning Viral Marketing Strategy</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item free">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_06.png.pagespeed.ic.2iR1Lq1HrU.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Learning Custom Product Design</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item network">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_07.png.pagespeed.ic.KNvblD_Vd1.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Skeching Custom Item Prize Design</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item network">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_08.png.pagespeed.ic.uuUPd8pkHT.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Learning Website Optimization with Bootstrap</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item programming">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_09.png.pagespeed.ic.onaUPvr7s-.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Search Engine Optimization (SEO)</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item web">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_10.png.pagespeed.ic.Vk_tFeUOXa.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Digital Marketing Strategy Video Tuts</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item web">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_11.png.pagespeed.ic._TBnV-TA7x.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Funding System Strategy Video Tuts</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item web">
                        <div class="shop-item-list entry">
                            <div class="">
                                <img src="upload/xcourse_12.png.pagespeed.ic.25NTcM097E.png" alt="course">
                                <div class="magnifier">
                                </div>
                            </div>
                            <div class="shop-item-title clearfix">
                                <h4><a href="course.php">Email Marketing Strategy with MailChimp</a></h4>
                                <div class="shopmeta">                            
                                    <div class="rating pull-left">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="visible-buttons">
                                <a title="Add to Cart" href="shoppingCart.php"><span class="fa fa-cart-arrow-down"></span></a>
                                <a title="Read More" href="course.php"><span class="fa fa-search"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="grey section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h4>Meet Our Learners</h4>
                            <p>What Our Learners Say About InfoLAND</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="testimonial">
                            <img class="alignleft img-circle" src="upload/xstudent_01.png.pagespeed.ic.756JwMcqdq.png" alt="student1">
                            <p>Lorem Ipsum is simply dummy text of the printing and industry. </p>
                            <div class="testimonial-meta">
                                <h4>John DOE <small><a href="mailto:JohnDOE.com">.com</a></small></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="testimonial">
                            <img class="alignleft img-circle" src="upload/xstudent_02.png.pagespeed.ic.y-PM-y4pVj.png" alt="student2">
                            <p>Lorem Ipsum is simply dummy text of the most popular items.</p>
                            <div class="testimonial-meta">
                                <h4>Jenny Anderson <small><a href="mailto:JennyAnderson.com">.com</a></small></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="testimonial">
                            <img class="alignleft img-circle" src="upload/xstudent_03.png.pagespeed.ic.uCQY3WNMCJ.png" alt="student3">
                            <p>Lorem Ipsum is simply dummy text of the printing.</p>
                            <div class="testimonial-meta">
                                <h4>Mark BOBS <small><a href="mailto:MarkBOBS.com">.com</a></small></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-wrapper text-center">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since<br> the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book. </p>                    
                </div>
            </div>
        </section>

        <?php include("footer&copyright.php"); ?>
    </div>

    <?php include("jsExternal.php"); ?>
</body>
</html>