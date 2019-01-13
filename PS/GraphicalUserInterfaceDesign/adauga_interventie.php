<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO catalog_interventii VALUES('".$_POST['numeinterventie']."', '".$_POST['costmateriale']."', '".$_POST['tarif']."')";
$result = $conn->query($query);
if($result){
		echo 1;
}else{
	echo "Nu s-a putut retine tipul de interventie in baza de date! ".$conn->error;
}
$conn->close();
?>
