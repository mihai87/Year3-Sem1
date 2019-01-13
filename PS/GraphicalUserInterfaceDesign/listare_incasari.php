<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

if($_POST['zi']<10){
	$zi_formatata = '0'.$_POST['zi'];
}else{
	$zi_formatata = $_POST['zi'];
}

if($_POST['luna']<10){
	$luna_formatata = '0'.$_POST['luna'];
}else{
	$luna_formatata = $_POST['luna'];
}

$data_formatata = $_POST['an'].'-'.$luna_formatata.'-'.$zi_formatata;

$query = "SELECT SUM(valoare_incasare) FROM incasari WHERE data_incasare = '".$data_formatata."'";
$result = $conn->query($query);
$result->data_seek(0);
$incasari = $result->fetch_array(MYSQLI_ASSOC);
echo json_encode($incasari['SUM(valoare_incasare)']);
$conn->close();
?>
