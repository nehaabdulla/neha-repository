<!DOCTYPE HTML>
<head>
<title>Free Home Shoppe Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script>
$(document).ready(function(){


$('#img').hide();
$('#catdiv').hide();
$('#reg2').click(function()

{

$('#img').show();
$('#slider1').hide();

$('#cat').click(function()

{
	alert("clicked div");
	$('#catdiv').show();

})
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
					<li><a href="register.html">Register</li>
					<li><a href="login1.html">Login</a></li>
					
					<li><a href="#">My Account</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" alt="" /></a>
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
				<li id="cat">Category</li>
				<li><a href="#">Sub Category</a></li>
				<li><a href="#">Products</a></li>
			</ul>
			</li>
		
			<li><a href="#">View<span style="margin-left:10px;" class="arrow">&#9660;</span></a>
			<ul>
				<li><a href="">Category</a></li>
				<li><a href="#">Sub Category</a></li>
				<li><a href="#">Products</a></li>
			</ul>
			</li>
			<li><a href="#">Edit<span style="margin-left:10px;" class="arrow">&#9660;</span></a>
			<ul>
				<li><a href="#">Category</a></li>
				<li><a href="sub">Sub Category</a></li>
				<li><a href="product">Products</a></li>
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