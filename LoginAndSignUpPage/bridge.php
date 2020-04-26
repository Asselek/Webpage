<?php
session_start();
$conn = oci_connect("SYSTEM","123","localhost/orcl");

if(!$conn){ echo "Oooops somthings happened!"; exit(0);}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//checking is this person in base?
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		if(empty($email) || empty($pass)){
			echo "You didn't fill all fields.";
			echo "<br/><a href = 'http://localhost/LoginAndSignUpPage/login.php' >back</a>";
			exit(5);
		}


		$stid = oci_parse($conn, "SELECT FIRST_NAME FROM VISITOR WHERE EMAIL LIKE '$email' AND VISITOR_PASSWORD LIKE '$pass'");

		oci_execute($stid);
			
		echo "Incorrect password or email trye again";
		echo "<br/><a href = 'http://localhost/LoginAndSignUpPage/login.php' >back</a>";

		//TO DO PASSWORD
		while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    		foreach ($row as $item) {
    			header('Location: /index.php?name=' . $item);
    			exit(4);
    		}
    		break;
		}
		oci_close($conn);
}
?>