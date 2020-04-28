<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="donationStyle.css" rel="stylesheet" type="text/css">
</head>
<body style="overflow-x: hidden; overflow-y: hidden;">
  <div class="header">
  <a href="/index.php" class="logo">Go Home</a>
  <div class="header-right">
  </div>
</div>
<div class="container">
  <div class="contents">
    <div class="inside">
    <h1>Donation to the zoo</h1>
    <p>All money will be transferred to the convenience of animals!</p>

    <form>
      <label for="fname">Enter your Name or Nickname:</label>
      <input type="text" id="nickname" name="nickname" placeholder="Nickname">
      <label for="lname">Credit card number:</label>
      <input type="text" id="cardNumber" name="cardNumber" placeholder="KZXXXXXXXXX">
      <label for="lname">Amount of money which you want to give:</label>
      <input type="text" id="amount" name="amount" placeholder="Amount">
      <input class="btn" name="submit" type="submit" value="donate">
    </form>
  </div>
  </div>
  <div class="donationChar">
    <h2>Statistics</h2>
    <?php
        $conn = oci_connect('SYSTEM', '123', 'localhost/orcl');

        if(!$conn){
          echo "Oops somethings happened";
          exit(0);
        }

        $stid1 = oci_parse($conn, "SELECT COUNT(*) FROM DONATE");
        $stid2 = oci_parse($conn, "SELECT AVG(AMOUNT) FROM DONATE");
        $stid3 = oci_parse($conn, "SELECT SUM(AMOUNT) FROM DONATE");
        $stid4 = oci_parse($conn, "SELECT MAX(AMOUNT) FROM DONATE");

        $e1 = oci_execute($stid1);
        $e2 = oci_execute($stid2);
        $e3 = oci_execute($stid3);
        $e4 = oci_execute($stid4);


        $row1 = oci_fetch_array($stid1, OCI_ASSOC+OCI_RETURN_NULLS);
         $row2 = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS);
          $row3 = oci_fetch_array($stid3, OCI_ASSOC+OCI_RETURN_NULLS);
           $row4 = oci_fetch_array($stid4, OCI_ASSOC+OCI_RETURN_NULLS);     

        echo "<p>How many times have been donated: </p><p>".$row1['COUNT(*)']."</p>";
        echo "<p>How much money do we get from donation: </p><p>".$row2['AVG(AMOUNT)']."</p>";
        echo "<p>Average donation per person: </p><p>".$row3['SUM(AMOUNT)']."</p>";
        echo "<p>Big donation: </p><p>".$row4['MAX(AMOUNT)']."</p>";
    ?>
  </div>
</div>
    <footer><p class="bot">&copy; Designed by Darkhan</p></footer>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $nickname = $_POST['nickname'];
  $cardNumber = $_POST['cardNumber'];
  $amount = $_POST['amount'];

  if(empty($nickname) || empty($cardNumber) || empty($amount)){
    echo "<p class='error'>You didn't fill all fields.</p>";
    exit(1);
  }

  $conn = oci_connect('SYSTEM', '123', 'localhost/orcl');

  if(!$conn){
    echo "<p class='error'>Oops somethings happened</p>";
    exit(0);
  }
  echo "something";
  $stid = oci_parse($conn, "INSERT INTO DONATE (DONATEID, AMOUNT, CARDNUMBER) VALUES (DONATION_ID_SEQ.nextval" . ",'" . $amount . "','" . $cardNumber . "')");
  $exe = oci_execute($stid);

  if(!$exe){
    $e = oci_error($exe);
    print htmlentities($e['message']);
      print "\n<pre>\n";
      print htmlentities($e['sqltext']);
      printf("\n%".($e['offset']+1)."s", "^");
      print  "\n</pre>\n";
      die(1);
  }
  

  oci_close($conn);

  //header("Location: donation.php");

}

?>
