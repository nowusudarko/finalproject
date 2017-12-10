<?php

header ("Access-Control-Allow-Origin: *");
		/*$servername = "35.166.18.143";
		$username = "adwoa.owusu";
		$password = "adwoa.owusu";
		$dbname = "webtech_adwoa_owusu";


*/

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "enforcer";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $con = mysqli_connect("localhost", "root","","enforcer");
		    // begin the transaction
		    //$conn->beginTransaction();
		    
			$email = $_POST["email"];
			$pwd = $_POST["pwd"];
			
			
		    $query = "SELECT * FROM registration WHERE email='$email' and phone='$pwd'";
		    $result = mysqli_query($con,$query);

		    if ($result) {
		    	echo "success";
		    }
		    else{
		    	echo "Error ".mysqli_error($con);
		    }

		    // commit the transaction
		    /*$conn->commit();
		    echo "<h3>Your name is: " . $name . "</h3>";
		    echo "<h3>Your number is: " . $number . "</h3>";
		    echo "<h3>Your email is: " . $email . "</h3>";
		    echo "<h3>You are spending: " . $numberOfNights . " nights</h3>";
		    echo "<h3>You have a " . $rmType . "</h3>";
		    echo "<h3>You paid with a: " . $pmtMethod . "</h3>";*/
		    }

		catch(PDOException $e)
		    {
		    // roll back the transaction if something failed
		    $conn->rollback();
		    echo "Error: " . $e->getMessage();
		    }

		$conn = null;

?>
