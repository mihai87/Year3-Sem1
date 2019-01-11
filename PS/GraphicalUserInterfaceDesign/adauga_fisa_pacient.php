<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO fise_pacienti VALUES('".$_POST['prenumepacient']."', '".$_POST['zinasterepacient']."', '".$_POST['lunanasterepacient']."', '".$_POST['stradapacient']."', '".$_POST['nrstradapacient']."', '".$_POST['blocpacient']."', '".$_POST['scarapacient']."', '".$_POST['appacient']."', '".$_POST['oraspacient']."', '".$_POST['telefonpacient']."')";
$result = $conn->query($query);
if($result){
		echo 1;
}else{
	echo "Nu s-a putut retine fisa pacientului in baza de date! ".$conn->error;
}
$conn->close();
?>