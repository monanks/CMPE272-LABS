<!DOCTYPE html>
<html>

<head>
	<title>PHP</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/stylesheets/main.css" />

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
     
</head>

<body style="background: #3a3a3a">
	<div class="row myrow" >
  	<div class="col-md-1" class="navtitle">
  		<a href="index.php" class="myitem" class="brand-logo left">LearnStack</a>
  	</div>
  	<div class="col-md-11">

  		<div class="row newrow">
		<a href="products.php" class="myitem newitem">Products</a>
        <a href="news.php" class="myitem newitem">News</a>
		<a href="about.php" class="myitem newitem">About</a>
        <a href="contact.php" class="myitem newitem">Contact</a>
        <a href="login.php" class="myitem newitem">Secure</a>
        <a href="user.php" class="myitem newitem">User</a>
   		</div>
			
  	</div>
  </div>
  
	<div class="row homebox cbox text-center">
		Most Recently Visited 5 Course Pages
		<br>
		<br>
		<?php
			if(isset($_COOKIE['count'])){
				//print $_COOKIE['count'];
				$c = $_COOKIE['count'];
				for($i=5;$i>0;$i--){
					//print "<br>hello".$_COOKIE[$c].$c;
					if(isset($_COOKIE[$c])){
						print '<br>'.$_COOKIE[$c];
					}
					$c = ($c==1)? 5 : ($c-1);
				}
			}
			else{
				print "<br>No Pages Visited Yet";
			}
			
		?>
	</div>
	
</body>
</html>
