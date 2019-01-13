<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO incasari VALUES(NULL,'".$_POST['pacientincasat']."', '".$_POST['valoareconsultatie']."', '".date('Y-m-d')."')";
$result = $conn->query($query);
if($result){
		echo 1;
}else{
	echo "Nu s-a putut retine incasarea in baza de date! ".$conn->error;
}
$conn->close();
?>
