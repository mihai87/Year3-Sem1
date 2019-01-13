<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM catalog_interventii";
$result = $conn->query($query);
if($result){
	$interventii_existente = array();
	for($i=0; $i<$result->num_rows;$i++){
		$result->data_seek($i);
		$interventie = $result->fetch_array(MYSQLI_ASSOC);
		array_push($interventii_existente, $interventie);
	}
}
echo json_encode($interventii_existente);

$conn->close();
?>
