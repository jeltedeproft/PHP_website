<?php

$db_host='pdb39.awardspace.net';
$db_name='3107837_testphpdatabase';
$db_user='3107837_testphpdatabase';
$db_pass='deproft0511';

//CONNECTION
$mysqli_connection = new MySQLi($db_host, $db_user, $db_pass, $db_name);

//TEST ERROR
if ($mysqli_connection->connect_error) {
	echo "Could not connect to $db_user, error: " . $mysqli_connection->connect_error;
} else {
	echo "Connected to $db_user! <hr> <br />";
}

//CREATE
for ($x = 0; $x <= sizeof($attacks); $x++) {
	$attack_power = mysqli_real_escape_string($mysqli_connection,$attacks[$x]);
	$defense_power = mysqli_real_escape_string($mysqli_connection,$defenses[$x]);
	$stamina = mysqli_real_escape_string($mysqli_connection,$staminas[$x]);
	$name = mysqli_real_escape_string($mysqli_connection,$names[$x]);
	$id = mysqli_real_escape_string($mysqli_connection,$ids[$x]);
	$sql = "INSERT IGNORE INTO `Pokemon`(`base_attack`, `base_defense`, `base_stamina`,`pokemon_id`, `pokemon_name`)
					VALUES ('".$attack_power."', '".$defense_power."', '".$stamina."', '".$id."', '".$name."')";

	//EXECUTE
	if (mysqli_query($mysqli_connection, $sql)) {
		//echo "New record created successfully! <br>";
	} else {
		echo "Error: " . $sql . "" . mysqli_error($mysqli_connection);
	}
}

//CLOSE
$mysqli_connection->close();
//echo "<hr> mysqli_connection closed! <hr> <br />";

?>
