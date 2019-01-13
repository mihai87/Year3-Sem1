<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM foi_consultatie 
				INNER JOIN incasari ON foi_consultatie.id_consultatie = incasari.id_consultatie
				INNER JOIN fise_pacienti ON foi_consultatie.numar_fisa = fise_pacienti.numar_fisa
				WHERE incasari.id_incasare = '".$_POST['platachitanta']."'";
$result = $conn->query($query);
if($result){
	$result->data_seek(0);
	$plata = $result->fetch_array(MYSQLI_ASSOC);
	echo json_encode($plata);
}


$conn->close();
?>