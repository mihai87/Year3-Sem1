<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM medici";
$result = $conn->query($query);
if($result){
	$medici_existenti = array();
	for($i=0; $i<$result->num_rows;$i++){
		$result->data_seek($i);
		$medic = $result->fetch_array(MYSQLI_ASSOC);
		array_push($medici_existenti, $medic);
	}
}
echo json_encode($medici_existenti);

$conn->close();
?>