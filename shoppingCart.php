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

		<section class="grey section">
			<div class="container">
				<div class="row">
					<div id="content" class="col-md-12 col-sm-12 col-xs-12">
						<div class="blog-wrapper">
							<div class="row second-bread">
								<div class="col-md-6 text-left">
									<h1>Shopping Cart & Checkout</h1>
								</div>
								<div class="col-md-6 text-right">
									<div class="bread">
										<ol class="breadcrumb">
											<li><a href="index.php">Home</a></li>
											<li class="active">Cart & Checkout</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
						<div class="blog-wrapper">
							<div class="blog-desc">
								<div class="shop-cart">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Item Name</th>
												<th>Item Price</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<a href="course.php"><img src="upload/xcourse_01.png.pagespeed.ic.XTOvCuUmZu.png" alt="item"
														class="alignleft img-thumbnail">Web Design & Development</a>
												</td>
												<td>
													$40.00
												</td>
												<td class="remove">
													<a href="shoppingCart.php">Remove</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="course.php"><img src="upload/xcourse_02.png.pagespeed.ic.PL7Wu2UcSB.png" alt="item"
														class="alignleft img-thumbnail">Network System Design & Development</a>
												</td>
												<td>
													$40.00
												</td>
												<td class="remove">
													<a href="shoppingCart.php">Remove</a>
												</td>
											</tr>
										</tbody>
										<tfoot>		
											<tr>
												<th colspan="5" class="text-right">
													Total: $80.00
												</th>
											</tr>									
											<tr>
												<th colspan="5">
													Discount Code: A001 - 5% Off
												</th>
											</tr>												
										</tfoot>
									</table>
									<div class="coupon-code-wrapper">
										<p>
											<a class="btn btn-default btn-block" role="button" data-toggle="collapse" data-target="#collapseExample"
												aria-expanded="false" aria-controls="collapseExample">
												Have got a Discount Code? Click Here.
											</a>
										</p>
										<div class="collapse" id="collapseExample">
											<div class="well">
												<div class="media">
													<p>Enter a Discount Code that you have got:</p>
													<div class="couponform">
														<form action="shoppingCart.php" method="post">
															<input type="text" class="form-control" placeholder="Enter discount code here">
															<button class="btn btn-primary">Apply Code</button>
														</form>	
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr class="invis">
									<div class="payment-methods">
										<img src="images/xcredit.jpg.pagespeed.ic.lGluDMrwzI.jpg" alt="">
									</div>
									<hr class="invis">
									<div class="payment-check">
										<p><strong>Select Payment Method</strong></p>
										<div class="checkbox">											
											<input type="radio" name="method" id="paypal"/>
											<label for="paypal">PayPal</label>&nbsp;&nbsp;
											<input type="radio" name="method" id="credit"/>
											<label for="credit">Credit Card</label>
										</div>
									</div>
									<hr class="invis">
									<div class="edit-profile">
										<form role="form" action="shoppingCart.php" method="post">
											<div class="form-group">
												<label>First / Last Name</label>
												<input type="text" class="form-control" placeholder="Amanda FOX">
											</div>
											<div class="form-group">
												<label>Email Address</label>
												<input type="email" class="form-control" placeholder="name@InfoLAND.com">
											</div>
											<div class="form-group">
												<label>Username</label>
												<input type="text" class="form-control" placeholder="Username">
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="password" class="form-control" placeholder="************">
											</div>
											<div class="form-group">
												<label>Re-Enter Password</label>
												<input type="password" class="form-control" placeholder="************">
											</div>
											<div class="well total-price">
												<p><strong> Total Amount:</strong> $80.00 </p>
											</div>
											<button type="submit" class="btn btn-primary">Check Out & Pay</button>
										</form>
									</div>
									<hr class="invis">
								</div>
							</div>
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