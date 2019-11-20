<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "talentne_recreac";


$email = $_POST['email'];
session_start();
$_SESSION['nombre'] = "";

$code = "0";

	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT name,email FROM users WHERE email = '$email' ";

		$result = $conn->query($sql);
		//$conn->close();

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION['nombre'] = mb_strtoupper($row["name"]);
			}
		    // output data of each row
		    //Existe el usuario1 en BD, no se puede vincular error 0
			//On page 2
		    global $code;
			$code = "0";
		}
		else{
			//No lo encuentra
			global $code;
			$code = "1";
		}

	echo $code;
?>