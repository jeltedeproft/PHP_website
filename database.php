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
	echo "Connected to $db_user! <hr> The database contains the following tables: <br />";
}

//CREATE
$columns = "base_attack,base_defense,base_stamina,pokemon_name,pokemon_id";
$numberOfPokemons = sizeof($attack);
$arrays = [$attacks,$defenses,$staminas,$names,$ids];
$stringArrays = implode(", ", $arrays);
$sql = "INSERT INTO `Pokemon`($columns) VALUES ($values)";

for ($i = 0; $i <= 10; $i++) {
    echo $i;
}

//EXECUTE
if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "" . mysqli_error($conn);
}

//CLOSE
$mysqli_connection->close();
echo "<hr> mysqli_connection closed!";

?>