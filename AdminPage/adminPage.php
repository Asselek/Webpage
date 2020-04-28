<html>
<head>
	<title>Admin page</title>
	<link rel="stylesheet" type="text/css" href="adminPageStyle.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>

	<div class = "home_link"><a href="/index.php">HOME</a></div>

		

	<div class = "input_area">
		<div id = "select_button">SELECT COMMAND</div>

		<div id = "action_area_id" class = "action_area">
			<!-- SUBMIT AND ACTIONS-->
			<form method="POST">
				<div class = "text_before_query">USER/VISITOR COMMANDS</div>
				<!-- DELETING VISITOR/USER -->
				<div class = "command_block">
					<div class = "text_before_input">
						Delete Visitor by ID
					</div>
					<input class = "inputCSS" type="number" name="delete_visitor_by_id" placeholder="VISITOR_ID">
					<input class = "inputCSS" type="submit" name="delete_visitor_submit" value = "DELETE">
				</div>

				<!-- GET USER/VISITOR INFO-->
				<div class = "command_block">
					<div class = "text_before_input">
						Get Visitor Info
					</div>
					<input class = "inputCSS" type="number" name="get_visitor_by_id" placeholder="VISITOR_ID">
					<input class = "inputCSS" type="submit" name="get_visitor_submit" value = "FIND">
				</div>

				<!-- GET ALL USERS/VISITORS INFO-->
				<div class = "command_block">
					<div class = "text_before_input">
						Get all users
					</div>
					<input class = "inputCSS" type="submit" name="get_all_visitors_submit" value = "FIND ALL">
				</div>


				<div class = "text_before_query">STAFF COMMANDS</div>


				<!-- INSERT STAFF MEMBER -->
				<div class = "command_block">
					<div class = "text_before_input">
						Insert new staff member
					</div>
					<input class = "inputCSS" type="text" name="insert_staff_first_name" placeholder="First Name">
					<input class = "inputCSS" type="text" name="insert_staff_last_name" placeholder="Last Name">
					<input class = "inputCSS" type="email" name="insert_staff_email" placeholder="Email">
					<input class = "inputCSS" type="password" name="insert_staff_password" placeholder="Password">
					<input class = "inputCSS" type="text" name="insert_staff_role" placeholder="Role">
					<input class = "inputCSS" type="number" name="insert_staff_to_zoo" placeholder="Zoo ID">

					<input  class = "inputCSS" type="submit" name="insert_staff_submit" value = "INSERT">
				</div>

				<!-- DELETING STAFF -->
				<div class = "command_block">
					<div class = "text_before_input">
						Delete staff member by ID
					</div>
					<input class = "inputCSS" type="number" name="delete_staff_by_id" placeholder="STAFF_ID">
					<input class = "inputCSS" type="submit" name="delete_staff_submit" value = "DELETE">
				</div>

				<!-- UPDATE STAFF MEMBER -->
				<div class = "command_block">
					<div class = "text_before_input">
						Update staff member
					</div>
					<input class = "inputCSS" type="number" name="staff_id" placeholder="Staff ID">
					<input class = "inputCSS" type="text" name="staff_first_name" placeholder="First Name">
					<input class = "inputCSS" type="text" name="staff_last_name" placeholder="Last Name">
					<input class = "inputCSS" type="email" name="staff_email" placeholder="Email">
					<input class = "inputCSS" type="password" name="staff_password" placeholder="Password">
					<input class = "inputCSS" type="text" name="staff_role" placeholder="Role">
					<input class = "inputCSS" type="number" name="staff_to_zoo" placeholder="Zoo ID">

					<input class = "inputCSS" type="submit" name="update_staff_submit" value = "UPDATE">
				</div> 

				<!-- GET ALL STAFF INFO-->
				<div class = "command_block">
					<div class = "text_before_input">
						Get all staff members
					</div>
					<input class = "inputCSS" type="submit" name="get_all_staff_submit" value = "FIND ALL">
				</div>

				<!-- GET STAFF MEMBER INFO-->
				<div class = "command_block">
					<div class = "text_before_input">
						Get staff member info
					</div>
					<input class = "inputCSS" type="number" name="get_staff_by_id" placeholder="STAFF_ID">
					<input class = "inputCSS" type="submit" name="get_staff_submit" value = "FIND">
				</div>


				<div class = "text_before_query">ADVANCED COMMANDS</div>
				<textarea class = "custom_commands"  name="admin_query"></textarea>
				<input class = "inputCSS" type="submit" name="admin_query_submit" value="SUBMIT">


			</form>

		</div>
<div style='text-align: center;'>©Desgined by Toleubay Alikhan</div>

	</div>


</body>

</html>

<?php 

	if($_SERVER["REQUEST_METHOD"] == 'POST'){

		$conn = oci_connect('SYSTEM', '123', 'localhost/orcl');

		if(!$conn){
			echo "Oops somethings happened";
			exit(0);
		}

		//VISITOR USER
		if(isset($_POST['delete_visitor_submit'])){
			$id = $_POST['delete_visitor_by_id'];
			if(empty($id)){
				someError();
			}
			$stid = oci_parse($conn, "DELETE FROM VISITOR WHERE VISITORID LIKE '$id'");
			$exe = oci_execute($stid);
			executionError($exe);
		}

		if(isset($_POST['get_visitor_submit'])){
			$id = $_POST['get_visitor_by_id'];
			if(empty($id)){
				someError();
			}
			$stid = oci_parse($conn, "SELECT * FROM VISITOR WHERE VISITORID LIKE '$id'");
			$exe = oci_execute($stid);
			executionError($exe);
			outputWithTable($stid);	
		}

		if(isset($_POST['get_all_visitors_submit'])){
			$stid = oci_parse($conn, "SELECT * FROM VISITOR ORDER BY VISITORID");
			$exe = oci_execute($stid);
			executionError($exe);
			outputWithTable($stid);
		}

		//STAFF

		if(isset($_POST['insert_staff_submit'])){

			$staff_first_name = $_POST['insert_staff_first_name'];
			$staff_last_name = $_POST['insert_staff_last_name'];
			$staff_email = $_POST['insert_staff_email'];
			$staff_password = $_POST['insert_staff_password'];
			$staff_role = $_POST['insert_staff_role'];
			$zoo_id = $_POST['insert_staff_to_zoo'];


			$stid = oci_parse($conn, "INSERT INTO STAFF_TABLE (STAFF_ID, ZOOID, FIRST_NAME, LAST_NAME, STAFF_EMAIL, ROLE, STAFF_PASSWORD) VALUES (16, '$zoo_id', '$staff_first_name', '$staff_last_name', '$staff_email', '$staff_role', '$staff_password')");

			$exe = oci_execute($stid);
			executionError($exe);

		}

		if(isset($_POST['delete_staff_submit'])){
			$id = $_POST['delete_staff_by_id'];
			if(empty($id)){
				someError();
			}
			$stid = oci_parse($conn, "DELETE FROM STAFF_TABLE WHERE STAFF_ID LIKE '$id'");
			$exe = oci_execute($stid);
			executionError($exe);
		}


		if(isset($_POST['update_staff_submit'])){
			$staff_id = $_POST['staff_id'];
			$staff_first_name = $_POST['staff_first_name'];
			$staff_last_name = $_POST['staff_last_name'];
			$staff_email = $_POST['staff_email'];
			$staff_password = $_POST['staff_password'];
			$staff_role = $_POST['staff_role'];
			$zoo_id = $_POST['staff_to_zoo'];

			$stid = oci_parse($conn, "UPDATE STAFF_TABLE SET
				ZOOID = '$zoo_id', 
				FIRST_NAME = '$staff_first_name',
				LAST_NAME = '$staff_last_name',
				STAFF_EMAIL = '$staff_email',
				ROLE = '$staff_role',
				STAFF_PASSWORD = '$staff_password'
				WHERE STAFF_ID LIKE '$staff_id'");

			$exe = oci_execute($stid);
			executionError($exe);

		}

		if(isset($_POST['get_all_staff_submit'])){
			$stid = oci_parse($conn, "SELECT * FROM STAFF_TABLE ORDER BY STAFF_ID");
			$exe = oci_execute($stid);
			executionError($exe);
			outputWithTable($stid);

		}

		if(isset($_POST['get_staff_submit'])){
			$id = $_POST['get_staff_by_id'];
			if(empty($id)){
				someError();
			}
			$stid = oci_parse($conn, "SELECT * FROM STAFF_TABLE WHERE STAFF_ID LIKE '$id'");
			$exe = oci_execute($stid);
			executionError($exe);
			outputWithTable($stid);

		}


		if(isset($_POST['admin_query_submit'])){
			$query = $_POST['admin_query'];
			if(empty($query)){
				someError();
			}
			$stid = oci_parse($conn, $query);
			$exe = oci_execute($stid);
			executionError($exe);

			if(strpos($query, "SELECT") !== false || strpos($query, "select") !== false){
				outputWithTable($stid);
			}
		}




	}
	

	function executionError($exe){
		if(!$exe){
			$error_handler = oci_error();
			print htmlentities($error_handler['message']);
	   		print "\n<pre>\n";
		    print htmlentities($error_handler['sqltext']);
		    printf("\n%".($error_handler['offset']+1)."s", "^");
	    	print  "\n</pre>\n";
	    	exit(1);
		}
		else{
			//echo "<div class = 'status_area'>";
				echo "<div class = 'status_output_text'>SUCCESS<div>";

			//echo "</div>";
		}
	}

	function outputWithTable($stid){
		echo "<div class = 'output_area'>";

			echo "<table border='1'>\n";
			$ncols = oci_num_fields($stid);

			echo "<tr class = 'column_name_row'>\n";
			for ($i = 1; $i <= $ncols; $i++) {
			    $column_name  = oci_field_name($stid, $i);
			    echo "<td>$column_name</td>\n";
			}
			echo "</tr>\n";


			//echo "<table border='1'>\n";

			while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS) ) {
    			echo "<tr>\n";

    			$ncols = oci_num_fields($stid);

    			foreach ($row as $item) {
        			echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    			}
    			echo "</tr>\n";
			}
			echo "</table>\n";

		echo "</div>";
	}

	function someError(){
		//echo "<div class = 'output_area'>";
				echo "<div class = 'status_output_text'>SOME ERROR OCCURED PLEASE CHECK DATA AND TRY AGAIN<div>";

		//echo "</div>";
		exit(2);
	}

?>
