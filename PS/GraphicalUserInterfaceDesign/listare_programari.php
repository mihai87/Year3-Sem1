<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM programari_consultatii 
				INNER JOIN fise_pacienti ON fise_pacienti.numar_fisa = programari_consultatii.numar_fisa 
				INNER JOIN medici ON medici.cnp_medic = programari_consultatii.cnp_medic
					WHERE programari_consultatii.zi_programare = '".$_POST['zi']."' AND programari_consultatii.luna_programare = '".$_POST['luna']."' AND programari_consultatii.an_programare = '".$_POST['an']."'";
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
