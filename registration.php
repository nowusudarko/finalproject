<?php

header ("Access-Control-Allow-Origin: *");
		/*$servername = "35.166.18.143";
		$username = "adwoa.owusu";
		$password = "adwoa.owusu";
		$dbname = "webtech_adwoa_owusu";


*/
		function sms($number, $msg){
    	$curl = curl_init('api.deywuro.com/bulksms/?username=AshesiMoney&password=ashesi@123&type=0&dlr=1&destination='.$number.'&source=Enforcer&message='.$msg);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

         $feedback = curl_exec($curl);
         return $feedback;

         curl_close($curl);

}

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
		    $name = $_POST["name"];
			$newemail = $_POST["newemail"];
			$age = $_POST["age"];
			$phone = $_POST["phone"];
			$org = $_POST["org"];
			

		    // our SQL statements
		    //$conn->exec("INSERT INTO registration (name,email,age,phone,org) 
		    //VALUES ('$name', '$newemail', '$age' ,'$phone' , '$org')");
		    $query = "INSERT INTO registration (name,email,age,phone,org) VALUES ('$name', '$newemail', '$age' ,'$phone' , '$org')";
		    $result = mysqli_query($con,$query);

		    if ($result) {
		    	sms($phone, "You havesuccessfully registered your account with Enforcer. Get right to enforcing!");

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
