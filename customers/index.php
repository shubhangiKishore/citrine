<?php
$servername= "localhost";
$username = "root";
$password="";
$dbname= "citrine";

	$conn=new mysqli($servername, $username, $password,$dbname);
	if($conn->connect_error){
		die("Connection Failed" . $conn->connect_error);
	}

if(!empty($_POST['login']))
{	
	$conn=new mysqli($servername, $username, $password,$dbname);
	if($conn->connect_error){
		die("Connection Failed" . $conn->connect_error);
	}

	$shipId=$_POST['shipId'];
	$password=$_POST['password'];
	
	
	$query1="SELECT `password` FROM `password` WHERE `shipId`='".$shipId."'";
	$result = $conn->query($query1);
	$row = $result->fetch_assoc();
	if($row['password']===$password)
	{
		echo "hola";
	//	echo "<a href="track.php"> </a>";
	}
	else
	{
		echo "incorrect password";
	}

	// check if password matches 
	//open track.php with user details 
	//$sql1="INSERT INTO `query`(`name`, `email`, `query`) VALUES ('".$name."','".$email."','".$message."')";
	if ($conn->query($query1)) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $query1 . "<br>" . $conn->error;
	}
	$conn->close();

}
if(!empty($_POST['register']))
{	
	$conn=new mysqli($servername, $username, $password,$dbname);
	if($conn->connect_error){
		die("Connection Failed" . $conn->connect_error);
	}

	$name=$_POST['name'];
	$email=$_POST['email'];
	$requirement=$_POST['requirement'];
	$company=$_POST['company'];
	$city=$_POST['city'];
	echo "User has submitted form and entered this name : <b> $name </b> ";
	$sql1="INSERT INTO `register`(`name`, `email`, `company`,`city`,`requirement`) VALUES ('".$name."','".$email."','".$requirement."','".$company."','".$city."')";

	if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

}
?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Citrine</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Welcome</a></li>
							<li><a href="#one">Who we are</a></li>
							<li><a href="#two">Our services</a></li>
							<li><a href="track.php">Track your shipment</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Citrine</h1>
							
							<ul class="actions">
								<li><a href="#one" class="button scrolly">Learn more</a></li>
							</ul>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
							<a href="#" class="image"><img src="images/pic01.jpg" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">
									<h2>LOG IN</h2>
									<p>Existing users are required to login here.</p>
									<ul class="actions">
										<li><a href="#" class="button">Learn more</a></li>
									</ul>
								</div>
							</div>
							
    						</section>
						<section id="loginform">
							<a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
							<div class="content">
								<div class="inner">
									<h2>LOGIN FORM</h2>
									<div class="split style1">
									<section>
										<form method="post" action="#">
											<div class="field half first">
												<label for="shipId">Shipment Id</label>
												<input type="text" name="shipId" id="shipId" />
											</div>
											<div class="field half">
												<label for="password">Password</label>
												<input type="text" name="password" id="password" />
											</div>
											
											<ul class="actions">
											<li><input type="submit" name="login" value="login" ></li>
											</ul>
										</form>
									</section>
								</div>
									
								</div>
							</div>
						</section>
						<section>
							<a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
							<div class="content">
								<div class="inner">
									<h2>REGISTER</h2>
									<p>New users are required to fill this form to arrange a meeting with us.</p>
									<ul class="actions">
										<li><a href="#" class="button">Learn more</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section>
							<a href="#" class="image"><img src="images/pic02.jpg" alt="" data-position="top center" /></a>
							<div class="content">
								<div class="split style1">
									<section name="registration">
										<form name = "register" method="post" action="#">
											<div class="field half first">
												<label for="name">Name</label>
												<input type="text" name="name" id="name" />
											</div>
											<div class="field half">
												<label for="email">Email</label>
												<input type="text" name="email" id="email" />
											</div>
											<div class="field half">
												<label for="city">City</label>
												<input type="text" name="city" id="city" />
											</div>
											<div class="field half">
												<label for="company">Company</label>
												<input type="text" name="company" id="company" />
											</div>
											<div class="field">
												<label for="requirement">Job Requirement</label>
												<textarea name="requirement" id="requirement" rows="5"></textarea>
											</div>
											<ul class="actions">
											<li><input type="submit" name="register" value="register" ></li>
											</ul>
										</form>
									</section>
								</div>
							</div>
						</section>
						
					</section>
				</div>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>