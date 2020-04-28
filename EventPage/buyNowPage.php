<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="buyNowPage.css">
</head>
<body>
	<form class="box" method = "post">
		<h1>BUY NOW</h1>
		<input type="text" name="phone_number" placeholder="+7XXXXXXXXXX">
		<input type="text" id="cardNumber" name="cardNumber" placeholder="KZXXXXXXXXX">
		<input type="submit" name="submit" value="Confirm">
	</form>
	
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){
		$event_id = $_GET['event'];
		$phone_number = $_POST['phone_number'];
		$card_number = $_POST['cardNumber'];

		if(empty($phone_number) || empty($card_number)){
			echo "You should enter all fields";
			die(0);
		}

		$conn = oci_connect("SYSTEM", "123", "localhost/orcl");
		$stid = oci_parse($conn, "INSERT INTO ORDERS (ORDER_ID, EVENT_ID, CARDNUMBER, PHONENUMBER)
			VALUES (ORDER_ID_SEQ.nextval, '$event_id', '$card_number', '$phone_number')");

		$exe = oci_execute($stid);
		if(!$exe){
			echo "Oooops something  happened";
			die(2);
		}

		echo "Thanks!";

	}		


}

?>