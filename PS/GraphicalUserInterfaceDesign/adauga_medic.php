<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO medici VALUES('".$_POST['cnpmedic']."', '".$_POST['numemedic']."', '".$_POST['prenumemedic']."', '".$_POST['zinastere']."', '".$_POST['lunanastere']."', '".$_POST['annastere']."')";
$result = $conn->query($query);
if($result){
	$query_adresa = "INSERT INTO adrese_medici VALUES('".$_POST['cnpmedic']."', '".$_POST['seriecimedic']."', '".$_POST['numarcimedic']."', '".$_POST['stradamedic']."', '".$_POST['nrstradamedic']."', '".$_POST['blocmedic']."', '".$_POST['scaramedic']."', '".$_POST['apmedic']."', '".$_POST['orasmedic']."')";
	$result_adresa = $conn->query($query_adresa);
	if($result_adresa){
		echo 1;
	}else{
		echo "Nu s-a putut retine medicul in baza de date!";
	}
}else{
	echo "Nu s-a putut retine medicul in baza de date!";
}
$conn->close();
?>