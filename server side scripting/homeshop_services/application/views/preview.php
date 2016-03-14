<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<title>Free Home Shoppe Website Template | Preview :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/easing.js"></script>
<script src="<?php echo base_url();?>js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/global.css">
<script src="<?php echo base_url();?>js/slides.min.jquery.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style type="text/css">
.slides_container img { 
-webkit-transition: .2s ease-in-out; 
-moz-transition:all .2s ease-in-out; 
-o-transition:all .2s ease-in-out; 
-ms-transition:.2s ease-in-out; 
transition:all .2s ease-in-out;
}

.slides_container img:hover { 
-moz-transform: scale(1.5); 
-webkit-transform: scale(1.5); 
-o-transform: scale(1.5); 
transform: scale(1.5); 
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



		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
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
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="<?php echo base_url();?>images/logo.png" alt="" /></a>
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

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li><a href="index.html">Home</a></li>
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
   </div>
 <div class="main">
    <div class="content">
    	
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<div id="container">
						   <div id="products_example">
							   <div id="products">
								<div class="slides_container">
								<a href="#" target="_blank"><img  src=http://localhost/homeshoppe/uploads/<?php echo ($img);?>></a>
									
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo ($name)?></h2>
					<p><?php echo ($desc)?></p>					
					<div class="price">
						<p>Price: <span><?php echo ($price)?></span></p>
					</div>
					<div class="available">
						<p>Available Options :</p>
					<ul>
						<li>Quantity:<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select></li>
					</ul>
					</div>
				<div class="share-desc">
					
					<div><button type="button" class="btn btn-danger">Buy Now</button></div>					
					<div class="clear"></div>
				</div>
				 
			</div>
			<div class="clear"></div>
		  </div>
	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>		
   
   
        </div>
				<div class="rightsidebar span_3_of_1">
					
					<ul id="id1">
				  	<h2>CATEGORIES</h2>
				  	<li>
				    <ul><div id='mm'></div></ul>
				  	</li>
				      
				       
				  </ul>
    				
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
							      <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
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

