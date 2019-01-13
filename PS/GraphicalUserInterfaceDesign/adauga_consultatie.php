<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$data = date("d-m-Y");
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO foi_consultatie VALUES(NULL,'".$_POST['pacientconsultat']."', '".$_POST['medic_consultant']."', '".$_POST['interventie_consultatie']."', '".$_POST['observatiiconsultatie']."', '".date('Y-m-d')."')";
$result = $conn->query($query);
if($result){
		echo 1;
}else{
	echo "Nu s-a putut retine fisa pacientului in baza de date! ".$conn->error;
}
$conn->close();
?>

