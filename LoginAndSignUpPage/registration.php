<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="logRegStyle.css" rel="stylesheet" type="text/css">
</head>
<body style="overflow-x: hidden;">
	<header>
		<a href="/index.php">Go Home</a>
	</header>
<div class="container">
	<h2>Register Now / <a href="login.php">Login Now</a></h2>
	<div class="toPlace">
		<form method="POST">
			<input type="text" name="name" placeholder="Enter Your Name" class="writer"><br>

			<input type="text" name="lname" placeholder="Enter Your Last Name" class="writer"><br>

			<input type="email" name="email" placeholder="Enter Your Email" class="writer"><br>

			<input type="password" name="pass" placeholder="*******" class="writer"><br>

			<input type="submit" name="submit" value="Submit" class="btn">
			<input type="reset" name="reset" value="Reset" class="btn">
		</form>
	</div>
</div>
    <footer><p class="bot">&copy; Designed by Darkhan</p></footer>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST['name'];
	$last_name = $_POST['lname'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	if(empty($name) || empty($last_name) || empty($email) || empty($pass)){
		echo "You didn't fill all fields.";
		exit(1);
	}

	$conn = oci_connect('SYSTEM', '123', 'localhost/orcl');

	if(!$conn){
		echo "Oops somethings happened";
		exit(0);
	}

	$stid = oci_parse($conn, "INSERT INTO VISITOR (VISITORID, FIRST_NAME, LAST_NAME, EMAIL, VISITOR_PASSWORD) VALUES (VISITOR_ID_SEQ.nextval" . ",'" . $name . "','" . $last_name . "','" . $email . "','" . $pass . "')");
	$exe = oci_execute($stid);

	if(!$exe){
		$error_handler = oci_error($exe);
		print htmlentities($e['message']);
   		print "\n<pre>\n";
	    print htmlentities($e['sqltext']);
	    printf("\n%".($e['offset']+1)."s", "^");
    	print  "\n</pre>\n";
    	die(1);
	}
	

	oci_close($conn);

	header("Location: login.php");

}

?>
