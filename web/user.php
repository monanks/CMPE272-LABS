<!DOCTYPE html>
<html>

<head>
	<title>LearnStack</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/stylesheets/main.css" />
	
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

	<script>
		$(document).ready(function() {
		    $('select').material_select();
		 });
	</script>
     
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
	<?php 
	include 'mysql.php';
	$firstname = $lastname = $email = $homeaddress = $homephone = $cellphone = $mysearch = $myselect = $res = "";
	$fnameErr = $lnameErr = $emailErr = $addrErr = $hpErr = $cpErr = $success = $searchErr = $cErr = "";
	if(!empty($_POST)){
		
		if($_POST['act'] == 'create')
		{
			extract($_POST);
			if (empty($firstname)) {
		    	$fnameErr = "First Name is required";
			} 
			else {
			    //$firstname = test_input($firstname);
			}
			if (empty($lastname)) {
			    $lnameErr = "Last Name is required";
			} else {
			    //$lastname = test_input($lastname);
			} 
			if (empty($email)) {
			    $emailErr = "Email is required";
			} else {
			    //$email = test_input($email);
			} 
			if (empty($homeaddress)) {
			    $addrErr = "Address is required";
			} else {
			    //$homeaddress = test_input($homeaddress);
			} 
			if (empty($homephone)) {
			    $hpErr = "Home Phone is required";
			} else {
			    //$homephone = test_input($homephone);
			} 
			if (empty($cellphone)) {
			    $cpErr = "Cell Phone is required";
			} else {
			    //$cellphone = test_input($cellphone);
			}

			if( $firstname && $lastname && $email && $homeaddress && $homephone && $cellphone )
			{
				$sql = "insert into user(first_name,last_name,email,home_address,home_phone,cell_phone) values ('".$firstname."','".$lastname."','".$email."','".$homeaddress."','".$homephone."','".$cellphone."')";
				if ($conn->query($sql) === TRUE) {
				    $success = "New User created successfully";
				} else {
				    $success = "Error: " . $sql . "<br>" . $conn->error;
				}	
			}
		}
		else if($_POST['act'] == 'search')
		{
			extract($_POST);
			//echo $_POST['mysearch'].$_POST['myselect'];
			if(empty($_POST['mysearch']))
			{
				$searchErr = "Search Crieteria is required";
			}
			else{
				$mysearch = $_POST['mysearch'];
			}
			if(empty($_POST['myselect']))
			{
				$cErr = "Select Search Option";
			}
			else{
				$myselect = $_POST['myselect'];
			}

			if($mysearch && $myselect)
			{
				if($myselect==="1") $sql="select * from user where first_name = '".$mysearch."' or last_name = '".$mysearch."'";
				if($myselect==="2") $sql = "select * from user where email = '".$mysearch."'";
				if($myselect==="3") $sql = "select * from user where home_phone = '".$mysearch."'";
				//$res = $c;

				//$sql = "select * from user where $c = '".$mysearch."'";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        $res = $res."id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]." - email " . $row["email"].    " - home address " . $row["home_address"]." - phone " . $row["home_phone"]." ".$row["cell_phone"]."<br>";
				    }
				} else {
				    $res = "0 results";
				}
			}
		}

		$conn->close();
	}
	 
	?>
	<div class="row cbox dbox">
		<div class="col-md-4 mycol">
			<div class="row text-center">
				<form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
					<input type="hidden" name="act" value="create"/>
					 <div class="input-field inline">
						<span class="succ"><?php echo $success;?></span>
					 </div>
					 <div class="input-field inline">
			            <input id="firstname" type="text" class="validate input" name='firstname'>
			            <span class="error"><?php echo $fnameErr;?></span>
			            <label for="firstname" data-error="wrong" >First Name</label>
			         </div>
			         <div class="input-field inline">
			            <input id="lastname" type="text" class="validate input" name='lastname'>
			            <span class="error"><?php echo $lnameErr;?></span>
			            <label for="lastname" data-error="wrong" >Last Name</label>
			         </div>
			         <div class="input-field inline">
			            <input id="email" type="text" class="validate input" name='email'>
			            <span class="error"><?php echo $emailErr;?></span>
			            <label for="email" data-error="wrong" >Email</label>
			         </div>
			         <div class="input-field inline">
			            <input id="homeaddress" type="text" class="validate input" name='homeaddress'>
			            <span class="error"><?php echo $addrErr;?></span>
			            <label for="homeaddress" data-error="wrong" >Home Address</label>
			         </div>
			         <div class="input-field inline">
			            <input id="homephone" type="text" class="validate input" name='homephone'>
			            <span class="error"><?php echo $hpErr;?></span>
			            <label for="homephone" data-error="wrong" >Home Phone</label>
			         </div>
			         <div class="input-field inline">
			            <input id="cellphone" type="text" class="validate input" name='cellphone'>
			            <span class="error"><?php echo $cpErr;?></span>
			            <label for="cellphone" data-error="wrong" >Cell Phone</label>
			         </div>
					<div class="input-field inline">
						<button class="btn waves-effect waves-light" type="submit" name="create">Register
						    <i class="material-icons right"></i>
						</button>
					</div>					
				</form>
			</div>
		</div>
		<div class="col-md-8 mycol">
			<div class="row text-center">
				<form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
					<input type="hidden" name="act" value="search"/>
			         <div class="input-field search inline">
			            <input id="search" type="text" class="validate input" name="mysearch">
			            <span class="error"><?php echo $searchErr;?></span>
			            <label for="search" data-error="wrong" >Search Crieteria</label>
			         </div>
			         <div class="input-field search inline">
					    <select class="input" id="select" name="myselect">
					      <option value="0" disabled selected>Choose your option</option>
					      <option value="1" class="input">Name</option>
					      <option value="2" class="input">Email</option>
					      <option value="3" class="input">Phone Number</option>
					    </select>
					    <label>Select Crieteria</label>
					    <span class="error"><?php echo $cErr;?></span>
					 </div>
					<div class="input-field search inline">
						<button class="btn waves-effect waves-light" type="submit" name="search">Search
						    <i class="material-icons right"></i>
						</button>
					</div>					
				</form>
			</div>

			<div class="row">
				<span class="succ"><?php echo $res;?></span>
			</div>
		</div>
    </div>
	
</body>
</html>
