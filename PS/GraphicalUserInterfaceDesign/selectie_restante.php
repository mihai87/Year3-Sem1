<?php
//$conn = new mysqli($_POST["host"], $_POST["user"], $_POST["pass"], $_POST["dbname"]);
$conn = new mysqli("localhost", "mihai", "parola_mihai", "proiectsincretic");
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM foi_consultatie 
				INNER JOIN fise_pacienti ON  foi_consultatie.numar_fisa = fise_pacienti.numar_fisa
				ORDER BY foi_consultatie.numar_fisa ASC";
$result = $conn->query($query);
if($result){
	$interventii_existente = array();
	for($i=0; $i<$result->num_rows;$i++){
		$result->data_seek($i);
		$interventie = $result->fetch_array(MYSQLI_ASSOC);
		
		$query_valoare_plati = "SELECT SUM(valoare_incasare) FROM incasari WHERE id_consultatie = ". $interventie['id_consultatie'];
		$result_total = $conn->query($query_valoare_plati);
		$result_total->data_seek(0);
		$suma_incasari = $result_total->fetch_array(MYSQLI_ASSOC);
		$suma_extrasa = $suma_incasari['SUM(valoare_incasare)'];
		
		$query_cost_interventie = "SELECT tarif_interventie FROM catalog_interventii WHERE tip_interventie = '". $interventie['tip_interventie']."'";
		$result_cost = $conn->query($query_cost_interventie);
		if($result_cost){
			$result_cost->data_seek(0);
			$cost = $result_cost->fetch_array(MYSQLI_ASSOC);
			$cost_extras = $cost['tarif_interventie'];
			if($suma_extrasa<$cost_extras){//inca nu a fost achitat integral costul
				$diferenta = $cost_extras - $suma_extrasa;
				$interventie['diferenta'] = $diferenta;
				array_push($interventii_existente, $interventie);
				}
			}
	}
}
echo json_encode($interventii_existente);
$conn->close();
?>