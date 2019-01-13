<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM foi_consultatie 
				INNER JOIN incasari ON foi_consultatie.id_consultatie = incasari.id_consultatie
				WHERE foi_consultatie.numar_fisa = '".$_POST['pacientchitanta']."'";
$result = $conn->query($query);
if($result){
	$plati_existente = array();
	for($i=0; $i<$result->num_rows;$i++){
		$result->data_seek($i);
		$plata = $result->fetch_array(MYSQLI_ASSOC);
		array_push($plati_existente, $plata);
	}
}
echo json_encode($plati_existente);

$conn->close();
?>