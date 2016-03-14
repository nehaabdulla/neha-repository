<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<title>Free Home Shoppe Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo base_url();?>css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/easing.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/startstop-slider.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){


$.ajax({
		'type' :"POST",
		'url' :"<?php echo base_url(); ?>"+"index.php/welcome/showcustcat",
		'datatype':"json",
		'success':function(data){
			
			var abc= JSON.parse(data);
 				
				
			var toAppend='';
			for (var i = 0 ; i < abc.length; i++) {


				toAppend+="<li value='"+abc[i].pk_int_cat_id+"'><button type='button' class='btn btn-link' onclick='customersubcategory(this.value);' value='"+abc[i].pk_int_cat_id+"'>"+abc[i].vchr_cat_name+"</button></li>";
			};
			$('#id1').append(toAppend);
		}
	});
})

function customersubcategory(vall)

{
	$.ajax({
		'type' :"POST",
		'url' :"<?php echo base_url(); ?>"+"index.php/welcome/showcustsubs",
		'datatype':"json",
		'data':{name:vall},
		'success':function(data){
			
			
			
			var abc= JSON.parse(data);
				
				
			var toAppend="";
			for (var i = 0 ; i <=abc.length-1; i++) {

				toAppend+="<li value='"+abc[i].pk_int_sub_id+"'><button type='button' class='btn btn-link' onclick='productimages(this.value);' value='"+abc[i].pk_int_sub_id+"'>"+abc[i].vchr_sub_name+"</button></li>";
			};
			$('#mm').append(toAppend);
}
});

}


</script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
			</div>
			<div class="account_desc">
				<ul>
					<li><a href="">Register</li>
					<li><a href="login">Login</a></li>
					
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="<?php echo base_url();?>images/logo.png" alt="" /></a>
			</div>
			  <div class="cart">
			  	   <p>Welcome to our Online Store! </p>
			  </div>
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});
			function toggle(id){
	var e=document.getElementById(id);
	if(e.style.display==''){
		e.style.display='none';

	}
	else{
		e.style.display='';
	}
}

</script>
<div class="clear"></div>
</div>
<div class="header_bottom">
	<div class="menu">
	    <ul>
			<li class="active"><a href="../../">Home</a></li>
			<li><a href="about">About</a></li>
			<li><a href="contact">Contact</a></li>
			<div class="clear"></div>
     	</ul>
	</div>
	<div class="search_box">
		<form>
	    	<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
		</form>
	</div>
	<div class="clear"></div>
</div>	

<div class="header_slide">
	<div class="header_bottom_left">				
		<div class="categories">
			<ul id="id1">
				  	<h3>Categories</h3>
				  	<li>
				    <ul id='mm'></ul>
				  	</li>
				      
				       
				  </ul>
				</div>		
	</div>

	<div class="header_bottom_right">
		            
       	<div class="row" id ="div1">
        <div class="col-sm-offset-3 col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<span class="glyphicon glyphicon-user"> Register</span> 
                   </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" name="register" action ="insertreg" method="post">
                    <div class="form-group">
                        <label for="inputfname3" class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-7">
                        <input type="text"id="txt1" name="fname" class="form-control" id="inputfname3" placeholder="First Name" required>
                       </div>
                    </div>
                    <div class="form-group">
                        <label for="inputLname3" class="col-sm-3 control-label">Last Name</label>
                        <div class="col-sm-7">
                            <input type="text" name="lname" id="txt2" class="form-control" id="inputLname3" placeholder="Last Name" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email Id</label>
                        <div class="col-sm-7">
                            <input type="email" name="email" id="txt3" class="form-control" id="inputEmail3" placeholder="Email" required>
                       </div>
                        </div>
                        <div class="form-group">
                        <label for="inputAddress3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-7">
                            <textarea name="addrs" id="txt4" class="form-control" id="inputAddress3"></textarea>
                       </div>
                        </div>
                       
                        <div class="form-group">
                        <label for="inputMobilenum3" class="col-sm-3 control-label">Mobile Number</label>
                        <div class="col-sm-7">
                            <input type="text" name="mbnum" id="txt6" class="form-control" id="inputMobilenum3" placeholder="Mobile number" required>
                       </div>
                        </div>
                        <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="pswd" id="txt7" class="form-control" id="inputPassword3" placeholder="password" required>
                       </div>
                        </div>
                        <div class="form-group">
                        <label for="inputConfrmpassword3" class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="cnfrmpswd" id="txt8" class="form-control" id="inputConfrmpassword3" placeholder="Confirm password" required>
                       </div>
                        </div>
                         <div class="col-sm-offset-5 col-sm-7">
                            <button type="submit" name="submt" class="btn btn-danger">Sign Up</button>    
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
		
    			</div>		 
					 	 
 <div class="main">
    <div class="content">
    	<div class="content_top" style="margin-top:500px;">
    		<div class="heading" >
    		<h3>New Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.html"><img src="<?php echo base_url();?>images/feature-pic1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$620.87</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.html"><img src="<?php echo base_url();?>images/feature-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$899.75</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				    
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.html"><img src="<?php echo base_url();?>images/feature-pic3.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$599.00</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.html"><img src="<?php echo base_url();?>images/feature-pic4.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$679.87</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>				     
				</div>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.html"><img src="<?php echo base_url();?>images/new-pic1.jpg" alt="" /></a>					
					 <h2>Lorem Ipsum is simply </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$849.99</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.html"><img src="<?php echo base_url();?>images/new-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$599.99</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.html"><img src="<?php echo base_url();?>images/new-pic4.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$799.99</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
				 <a href="preview.html"><img src="<?php echo base_url();?>images/new-pic3.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>					 
					 <div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$899.99</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
				</div>
			</div>
    </div>
 </div>
</div>
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="delivery.html">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="<?php echo base_url();?>images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="<?php echo base_url();?>images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="<?php echo base_url();?>images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="<?php echo base_url();?>images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="<?php echo base_url();?>images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>Company Name © All rights Reseverd | Design by  <a href="http://w3layouts.com">W3Layouts</a> </p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

