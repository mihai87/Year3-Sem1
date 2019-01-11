<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO contracte_medici VALUES(NULL, '".$_POST['cnpmedic']."', '".$_POST['telefonmedic']."', '".$_POST['emailmedic']."', '".$_POST['ziangajare']."', '".$_POST['lunaangajare']."', '".$_POST['anangajare']."', '".$_POST['salariumedic']."')";
$result = $conn->query($query);
if($result){
	echo 1;
}else{
	echo "Nu s-a putut retine contractul medicului in baza de date! ".$conn->error;
}
$conn->close();
?>