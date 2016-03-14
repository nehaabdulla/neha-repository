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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
.glyphicon {
	font-size:10px;

}
</style>
<script>
$(document).ready(function(){


$.ajax({
		'type' :"POST",
		'url' :"<?php echo base_url(); ?>"+"index.php/welcome/showcustcat",
		'datatype':"json",
		'success':function(data){
			
			var abc= JSON.parse(data);
 				
				
			var toAppend='';
			for (var i = 0 ; i < abc.length; i++) {


				toAppend+="<li value='"+abc[i].pk_int_cat_id+"'> <span class='glyphicon glyphicon-plus'></span><button type='button' class='btn btn-link' onclick='customersubcategory(this.value);' value='"+abc[i].pk_int_cat_id+"'>"+abc[i].vchr_cat_name+"</button></li><div id='"+abc[i].pk_int_cat_id+"'></div>";
			};
			$('#id1').append(toAppend);

		}
	});

$.ajax({
		'type' :"POST",
		'url' :"<?php echo base_url(); ?>"+"index.php/welcome/proddisplay",
		'datatype':"json",
		'success':function(data){
			
			var abc= JSON.parse(data);
 				
				
			var toAppend='';
			for (var i = 0 ; i < abc.length; i++) {


				toAppend+="<div class='grid_1_of_4 images_1_of_4'><img src='<?php echo base_url(); ?>uploads/"+abc[i].vchr_product_image+"'><h2>"+abc[i].vchr_product_name+"</h2><div class='price-details'><div class='price-number' style='font-size:20px;'>Rs."+abc[i].int_selling_price+"</div></div></div></div>";
			};
			$('#pc').append(toAppend);

		}
	});
})

function customersubcategory(vall)
{
	$('#'+vall+'').load('blank');
	$.ajax({
		'type' :"POST",
		'url' :"<?php echo base_url(); ?>"+"index.php/welcome/showcustsubs",
		'datatype':"json",
		'data':{name:vall},
		'success':function(data){
			var abc= JSON.parse(data);
			var toAppend="";
			for (var i = 0 ; i <=abc.length-1; i++) 
			{
				toAppend+="<li value='"+abc[i].pk_int_sub_id+"'><button type='button' class='btn btn-link' onclick='productimages(this.value);' value='"+abc[i].pk_int_sub_id+"'>"+abc[i].vchr_sub_name+"</button></li>";
			};
			$('#'+vall+'').append(toAppend);

}
});
}


function productimages(pic)
{
	
	$('#pc').load('blank');
	
	$.ajax({
		'type' :"POST",
		'url' :"<?php echo base_url(); ?>"+"index.php/welcome/showproductpic",
		'datatype':"json",
		'data':{name:pic},
		'success':function(data){
			var abc= JSON.parse(data);

			var toAppend="";
			for (var i = 0 ; i <=abc.length-1; i++) {
				
					toAppend+="<div class='grid_1_of_4 images_1_of_4'><img src='<?php echo base_url(); ?>uploads/"+abc[i].vchr_product_image+"'><h2>"+abc[i].vchr_product_name+"</h2><div class='price-details'><div class='price-number' style='font-size:20px;'>"+abc[i].int_selling_price+"</div><div class='add-cart'><button type='button' class='btn btn-danger' value='"+abc[i].int_quantity+"'  onclick='productpurch("+abc[i].pk_int_product_id+",\""+abc[i].int_selling_price+"\",\""+abc[i].int_quantity+"\")'>Buy Now</button></div></div></div></div>";
			};
			$('#pc').append(toAppend);
		}
});
}



function productpurch(prdctid,p,q)

{
	if(q<1)
	{
		alert("sorry!Out of Stock");
		
	}

	else
	{
		var r=confirm("Are you sure?");
		if(r==true)
		{
			var qnty=prompt("Enter the quantity",'1');
			$.ajax({
				'type' :"POST",
				'url' :"<?php echo base_url(); ?>"+"index.php/welcome/purchaseproduct",
				'datatype':"json",
				'data':{name:prdctid,nm:qnty,price:p},
				'success':function(data){
					
					
						alert("Your product will be recieved soon");
					
			}

		});

		}
		else
		{
			alert("error found");
		}
 }

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
		
    	                  
	<div class="container">	
	<div class="row" id ="div1">
        <div class="col-sm-offset-3 col-sm-4" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-user"></span> Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" name="form2" action ="loginuser" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email Id</label>
                        <div class="col-sm-7">
                            <input type="text"id="txt1" name="email" class="form-control" id="inputEmail3" placeholder="EmailId" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="pass" id="txt2" class="form-control" id="inputPassword3" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="col-sm-offset-3 col-sm-9">
                       		<div class="checkbox">
                       			<label><input type="checkbox">Remember Me</label>
                       		</div>
                       	</div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-5 col-sm-7">
                             <input type="submit" name="sub" class="btn btn-danger btn-mini" value="Login">
                        </div>
                    </div>
                    <label id="lab4"><u>Forgot Password?</u></label>
                    </form>
                    </div>
                </div>
                   
        </div>
        </div>
    </div>
</div>
</div>
			
		             
					 					       
		         
		  
		
   </div>
 <div class="main">
    <div class="content">
    	<div class="content_top" style="margin-top:440px;">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group" id="pc">
				
				</div>
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

