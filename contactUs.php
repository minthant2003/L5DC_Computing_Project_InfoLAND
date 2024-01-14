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
        
        <section class="white section">
            <div class="container">
                <div class="row contact-wrapper">
                    <div class="col-md-9 col-sm-9 col-xs-12 content-widget">
                        <div class="widget-title">
                            <h4>Contact Form</h4>
                            <hr>
                        </div>
                        <div id="contact_form" class="contact_form row">
                            <div id="message"></div>
                            <form id="contactform" action="contactUs.php" name="contactform" method="post">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Fullname *">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email *">
                                    <input type="text" name="name" id="website" class="form-control" placeholder="Username *">
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Subject *"></textarea>
                                    <button type="submit" value="SEND" id="submit" class="btn btn-primary btn-block">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 content-widget">
                        <div class="widget-title">
                            <h4>Contact Details</h4>
                            <hr>
                        </div>
                        <div class="contact-list">
                            <ul class="contact-details">
                                <li><i class="fa fa-envelope"></i> <a href="mailto:admin@InfoLAND.com">admin@InfoLAND.com</a></li>
                                <li><i class="fa fa-phone"></i> +959 123 456 789</li>
                                <li><i class="fa fa-fax"></i> +951 123 45</li>
                                <li><i class="fa fa-home"></i> No.00, Thirimyaing Road, 00-Ward, Hlaing Township, Yangon, Myanmar.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include("footer&copyright.php"); ?>
    </div>

    <?php include("jsExternal.php"); ?>
</body>
</html>