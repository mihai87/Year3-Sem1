<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM medici 
				INNER JOIN contracte_medici ON medici.cnp_medic = contracte_medici.cnp_medic 
					WHERE medici.cnp_medic = '".$_POST['cnp_medic']."'";
$result = $conn->query($query);
if($result){
		$result->data_seek(0);
		$medic = $result->fetch_array(MYSQLI_ASSOC);
		echo json_encode($medic);
	}
$conn->close();
?>
