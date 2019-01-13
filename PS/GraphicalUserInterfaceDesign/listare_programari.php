<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT SUM(valoare_incasare) FROM incasari "."'";
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
