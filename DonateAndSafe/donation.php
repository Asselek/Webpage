<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="donationStyle.css" rel="stylesheet" type="text/css">
</head>
<body style="overflow-x: hidden; overflow-y: hidden;">
	<div class="header">
  <a href="#" class="logo">Go Home</a>
  <div class="header-right">
    <a href="donation.php?look=yes">Look at statistics</a>
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
      <input class="btn" type="button" value="donate">
    </form>
  </div>
  </div>
  <div class="donationChar">
    <h2>Statistics</h2>
    <?php
      if(isset($_GET['look'])){
        echo "<p>How many times have been donated: </p><p>"."</p>";
        echo "<p>How much money do we get from donation: </p><p>"."</p>";
        echo "<p>Average donation per person: </p><p>"."</p>";
        echo "<p>Big donation: </p><p>"."</p>";
          
      }
    ?>
  </div>
</div>
    <footer><p class="bot">&copy; Designed by Darkhan</p></footer>
</body>
</html>

<?php

?>
