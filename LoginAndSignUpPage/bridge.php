<?php
session_start();
$conn = oci_connect("SYSTEM","123","localhost/orcl");

if(!$conn){ echo "Oooops somthings happened!"; die(0);}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//checking is this person in base?

		if(!isset($_POST['isUserOrAdmin'])){
			echo "You didn't check the buttons.";
			echo "<br/><a href = 'http://localhost/LoginAndSignUpPage/login.php' >back</a>";
			die(5);
		}

		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$adminOrUser = $_POST['isUserOrAdmin'];

		if(empty($email) || empty($pass)){
			echo "You didn't fill all fields.";
			echo "<br/><a href = 'http://localhost/LoginAndSignUpPage/login.php' >back</a>";
			die(5);
		}

		if($adminOrUser == 'Admin'){
			$stid = oci_parse($conn, "SELECT FIRST_NAME FROM STAFF_TABLE WHERE STAFF_EMAIL LIKE '$email' AND STAFF_PASSWORD LIKE '$pass'");

			oci_execute($stid);
				
			echo "Incorrect password or email try again";
			echo "<br/><a href = 'http://localhost/LoginAndSignUpPage/login.php' >back</a>";

			while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
	    		foreach ($row as $item) {
	    			header('Location: /index.php?Aname=' . $item);
	    			die(4);
	    		}
	    		break;
			}

		}

		else{
			$stid = oci_parse($conn, "SELECT FIRST_NAME FROM VISITOR WHERE EMAIL LIKE '$email' AND VISITOR_PASSWORD LIKE '$pass'");

			oci_execute($stid);
				
			echo "Incorrect password or email try again";
			echo "<br/><a href = 'http://localhost/LoginAndSignUpPage/login.php' >back</a>";

			while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
	    		foreach ($row as $item) {
	    			header('Location: /index.php?Uname=' . $item);
	    			die(4);
	    		}
	    		break;
			}
		}


		
		oci_close($conn);
}
?>
