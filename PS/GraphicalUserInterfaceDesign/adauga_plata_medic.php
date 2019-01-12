<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$data = date("d-m-Y");
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO plati_medici VALUES(NULL,'".$_POST['cnpmedic']."', '".$_POST['valoarebonus']."', '".$_POST['valoareplata']."', '".date('Y-m-d')."')";
$result = $conn->query($query);
if($result){
		echo 1;
}else{
	echo "Nu s-a putut retine plata in baza de date! ".$conn->error;
}
$conn->close();
?>
