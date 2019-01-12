<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$data = date("d-m-Y");
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO programari_consultatii VALUES(NULL,'".$_POST['ziprogramare']."', '".$_POST['lunaprogramare']."', '".$_POST['anprogramare']."', '".$_POST['oraprogramare']."', '".$_POST['minutprogramare']."', '".$_POST['medic_programare']."', '".$_POST['pacient_programat']."')";
$result = $conn->query($query);
if($result){
		echo 1;
}else{
	echo "Nu s-a putut retine fisa pacientului in baza de date! ".$conn->error;
}
$conn->close();
?>
