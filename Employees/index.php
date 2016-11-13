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
		if( $row["AccessLevel"] == "BD" )
        {
          echo "<a href="bd.php">BD</a>";
        }
        elseif( $row["AccessLevel"] == "FM")
        {
          echo "<a href="fm.php" >Fleet Manager</a>";
        }
        elseif( $row["AccessLevel"] == "FOR")
        {
          echo "<a href="for.php" >Forwarder</a>";
        }
        elseif( $row["AccessLevel"] == "CC")
        {
          echo "<a href="callCenter.php" >Call centre</a>";
        }
        elseif( $row["AccessLevel"] == "FIN")
        {
          echo "<a href="finance.php">Finance</a>";
        }
	//	echo "<a href="track.php"> </a>";
	}
	else
	{
		echo "incorrect password";
	}

	
	if ($conn->query($query1)) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $query1 . "<br>" . $conn->error;
	}
	$conn->close();

}

// open page depending on the username 
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
												<label for="username">Username</label>
												<input type="text" name="username" id="username" />
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
						
						
						
					</section>
				</div>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: </li>
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