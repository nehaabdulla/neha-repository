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



<script>
$(document).ready(function(){


$('#img').hide();
$('#reg2').click(function()

{

$('#img').show();
$('#slider1').hide();
});

$.ajax({
		'type' :"POST",
		'url' :"http://api.baabtra.com/homeshop_services/index.php/welcome/showcustcat",
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

});

function customersubcategory(vall)
{
	$('#'+vall+'').load('blank');
	$.ajax({
		'type' :"POST",
		'url' :"http://api.baabtra.com/homeshop_services/index.php/welcome/showcustsubs",
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
		'url' :"http://api.baabtra.com/homeshop_services/index.php/welcome/showproductpic",
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
				'url' :"http://api.baabtra.com/homeshop_services/index.php/welcome/purchaseproduct",
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
<style>
#navbar {
    position: relative;
    }
#navbar ul {
    display: inline-block;
   
}
#navbar li {
    list-style: none;
    position: relative;
    display: inline-block;
}
#navbar ul ul {
    display:none;
    position:absolute;

}
#navbar ul li:hover ul {
    display:block;
    margin:0;
    padding:0;
    background:#383838;
}
#tb1 th ,tr, td
{
padding:20px;
}
.glyphicon {
	font-size:10px;

}
</style>
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
					
					<li><a href="logout">Logout</a></li>
					
					
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="<?php echo base_url();?>images/logo.png" alt="" /></a>
			</div>
			  <div class="cart">
			  	   <p>Welcome to our Online Store!</p>
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
	<div class="menu" id="navbar">
	    <ul>
			<li class="active"><a href="index.html">Home</a></li>
			<li><a href="about.html">About</a></li>
			<li><a href="contact.html">Contact</a></li>
		
			<li ><a  href="#">Add<span style="margin-left:10px;" class="arrow">&#9660;</span></a>
			<ul>
				<li><a href="category">Category</a></li>
				<li><a href="selectcategory">Sub Category</a></li>
				<li><a href="products">Products</a></li>
			</ul>
			</li>
		
			<li><a href="#">View<span style="margin-left:10px;" class="arrow">&#9660;</span></a>
			<ul>
				<li><a href="#">Category</a></li>
				<li><a href="viewsubcategory">Sub Category</a></li>
				<li><a href="viewprod">Products</a></li>
			</ul>
			</li>
			<li><a href="#">Edit<span style="margin-left:10px;" class="arrow">&#9660;</span></a>
			<ul>
				<li><a href="editcat">Category</a></li>
				<li><a href="editsubcat">Sub Category</a></li>
				<li><a href="editproduct">Products</a></li>
			</ul>
		    </li>
		    <li><a href="#">Customers<span style="margin-left:10px;" class="arrow">&#9660;</span></a>
		    	<ul>
		    		<li><a href="viewcusto">View Customer</a></li>
		    		<li><a href="suspendcusto">Suspend<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
		    		
		    	</ul>
		    </li>

			<div class="clear"></div>
     	</ul>
	</div>
	<div class="search_box">
	    <form>
	     	<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
	     	<input type="submit" value="">
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
				    <ul><div id='mm'></div></ul>
				  	</li>
				      
				       
				  </ul>
				</div>				
	  	     </div>
	  	     <div class="header_bottom_right">

	  	     	<div class="container" style="padding:15px;">
	  	     		<div class="row" id="div1">
	  	     			<div class="col-sm-offset-3 col-sm-4">
            				<div class="panel panel-default">
                				<div class="panel-heading" align="center">
                					<span  ><b> Category Added</b></span> 
                   				</div>
                   				<div class="panel-body">
                   					<table  id="tb1"  class="table table-bordered">
    					<tr>
    						<th>SI NO</th>
    						<th>Category Name</th>
    					</tr>
						<?php
							foreach ($viewcat as $row) 
							{
								echo"<tr>";
								echo "<td>".$row->pk_int_cat_id."</td><td>".$row->vchr_cat_name." </td> ";
								echo "</tr>";
							}
						?>
						</table>
                        		</div>
                        	</div>
                        </div>
                    </div>
                 </div>
	  	     	
		   <div class="clear"></div>
		</div>
   </div>
</div>
 <div class="main">
    <div class="content">
    	<div class="content_top" style="margin-top:350px;">
    		<div class="heading">
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
									<h4><a href="preview.html">Buy Now</a></h4>
							     </div>
							 <div class="clear"></div>
					</div>
					 
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview1.html"><img src="<?php echo base_url();?>images/feature-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$899.75</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="preview.html">Buy Now</a></h4>
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
									<h4><a href="preview.html">Buy Now</a></h4>
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
									<h4><a href="preview.html">Buy Now</a></h4>
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
									<h4><a href="preview.html">Buy Now</a></h4>
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
									<h4><a href="preview.html">Buy Now</a></h4>
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
									<h4><a href="preview.html">Buy Now</a></h4>
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
									<h4><a href="preview.html">Buy Now</a></h4>
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

