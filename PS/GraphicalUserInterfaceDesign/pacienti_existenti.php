<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM fise_pacienti";
$result = $conn->query($query);
if($result){
	$pacienti_existenti = array();
	for($i=0; $i<$result->num_rows;$i++){
		$result->data_seek($i);
		$pacient = $result->fetch_array(MYSQLI_ASSOC);
		array_push($pacienti_existenti, $pacient);
	}
}
echo json_encode($pacienti_existenti);

$conn->close();
?>