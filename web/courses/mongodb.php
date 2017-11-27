<!DOCTYPE html>
<?php
    setcookie('mongodb', isset($_COOKIE['mongodb']) ? ++$_COOKIE['mongodb'] : 1,time()+60*60,"/");
    if(isset($_COOKIE['count'])){
    	$c=$_COOKIE['count'];
    	$c++;
    	if($c>5) $c=1;
    }
    else{
    	$c=1;	
    }
    setcookie('count',$c,time()+60*60*24,"/");
    setcookie($c,"MongoDB Course Page",time()+60*60,"/");
?>
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
  		<a href="../index.php" class="myitem" class="brand-logo left">LearnStack</a>
  	</div>
  	<div class="col-md-11">

  		<div class="row newrow">
		<a href="../products.php" class="myitem newitem">Products</a>
        <a href="../news.php" class="myitem newitem">News</a>
		<a href="../about.php" class="myitem newitem">About</a>
        <a href="../contact.php" class="myitem newitem">Contact</a>
        <a href="../login.php" class="myitem newitem">Secure</a>
        <a href="../user.php" class="myitem newitem">User</a>
   		</div>
			
  	</div>
  </div>
  
	<div class="row cbox homebox text-center">
		MongoDB Course
		<br>
		<?php 
			
		?>
	</div>

	<div class="row" style="font-size: 17px;color: white">
		<div class="col-md-1">

		</div>
		<div class="col-md-10">
			<div class="row">
				Description:<br>
				MongoDB is an open-source document database and leading NoSQL database. MongoDB is written in C++. This tutorial will give you great understanding on MongoDB concepts needed to create and deploy a highly scalable and performance-oriented database.
			</div>
			<div class="row">
				<img src="https://www.tutorialspoint.com/mongodb/images/mongodb.jpg" alt="Mountain View" width="100%" height="100%">
			</div>
		</div>
		<div class="col-md-1">

		</div>
	</div>
	
</body>
</html>
