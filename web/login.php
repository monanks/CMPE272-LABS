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

	
	
	<div class="row cbox">
	<div class="col-md-4">
	</div>
      <div class="col-md-4">
        <div class="card-panel black">
          <span class="white-text">
			<div class="row text-center">
				<form method='post' action='login.php'>
					 <div class="input-field inline">
			            <input id="username" type="text" class="validate" name='username'>
			            <label for="username" data-error="wrong" >UserName</label>
			         </div>
			         <div class="input-field inline">
			            <input id="password" type="password" class="validate" name='password'>
			            <label for="password" data-error="wrong" >Password</label>
			         </div>
					<div class="row">
						<button class="btn waves-effect waves-light" type="submit" name="action">Login
						    <i class="material-icons right"></i>
						</button>
					</div>
				</form>
			</div>
          </span>
        </div>
        <div class="center" style="color:white;margin-left:60px">
		<?php
			if(!empty($_POST)){
				extract($_POST);
				if(!$username || !$password){
					echo "Username or Password is empty";
					die();
				}

				$adminfile = 'admin.txt';
				$content = explode("\n" , file_get_contents($adminfile));
				$b = explode(" ",$content[0]);
				$uname = $b[0];
				$pwd = $b[1];
				if($username==$uname && $password==$pwd){
					echo "success";
					$contactfile = 'users.txt';
						$array = explode("\n", file_get_contents($contactfile));
						echo '<table><tr><th>Username</th><th>Password</th></tr>';
						//echo file_get_contents($contactfile);
						for($i = 0; $i < count($array); $i++)
						{
							$arr = explode(' ',$array[$i]);
							echo '<tr><th>'.$arr[0].'</th><th>'.$arr[1].'</th></tr>'; 
						}
					echo '</table>';
				}
				else{
					echo "Wrong userid password. Try Again!!";
				}
			}
			
		?>
	</div>
      </div>
	<div class="col-md-4">
	</div>
    </div>
	
</body>
</html>