<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM foi_consultatie 
				INNER JOIN fise_pacienti ON fise_pacienti.numar_fisa = foi_consultatie.numar_fisa 
				INNER JOIN medici ON medici.cnp_medic = foi_consultatie.cnp_medic
					WHERE fise_pacienti.numar_fisa = '".$_POST['pacientfisa']."'";
$result = $conn->query($query);
if($result){
	$pacient_info = array();
	for($i=0; $i<$result->num_rows;$i++){
		$result->data_seek($i);
		$pacient = $result->fetch_array(MYSQLI_ASSOC);
		array_push($pacient_info, $pacient);
	}
	echo json_encode($pacient_info);
}

$conn->close();
?>
