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
$columns = "`base_attack`,`base_defense`,`base_stamina`,`pokemon_name`,`pokemon_id`";
//$arrays = [$attacks,$defenses,$staminas,$names,$ids];
//insertMultidimensionalArraySQL($arrays,$mysqli_connection);
// insertArrayIntoSQL($attacks,$mysqli_connection,"base_attack");
// insertArrayIntoSQL($defenses,$mysqli_connection,"base_defense");
// insertArrayIntoSQL($staminas,$mysqli_connection,"base_stamina");
// insertArrayIntoSQL($names,$mysqli_connection,"pokemon_id");
// insertArrayIntoSQL($ids,$mysqli_connection,"pokemon_name");
insertArraysSQLWithForLoop($mysqli_connection);

function insertArraysSQLWithForLoop($connect){
	for ($x = 0; $x <= sizeof($attacks); $x++) {
		print_r($attacks);
		echo "attacks[x] = $attacks[x] <br>";
		$attack_power = mysqli_real_escape_string($connect,$attacks[x]);
		$defense_power = mysqli_real_escape_string($connect,$defenses[x]);
		$stamina = mysqli_real_escape_string($connect,$staminas[x]);
		$name = mysqli_real_escape_string($connect,$names[x]);
		$id = mysqli_real_escape_string($connect,$ids[x]);
		$sql = "INSERT INTO `Pokemon`(`base_attack`, `base_defense`, 'base_stamina',`pokemon_name`, `pokemon_id`) VALUES ('".$attack_power."', '".$defense_power."', '".$stamina."', '".$name."', '".$id."')";

		//EXECUTE
		if (mysqli_query($connect, $sql)) {
			echo "New record created successfully! <br>";
		} else {
			echo "Error: " . $sql . "" . mysqli_error($connect);
		}
	} 
}

function insertArrayIntoSQL($table,$connect,$columname){
	foreach ($table as $key => $value) {
		echo "inserting $value into $columname <br>";
		$attribute = mysqli_real_escape_string($connect,$value);
		echo "inserting $attribute <br>";
		$sql = "INSERT INTO `Pokemon`($columname) VALUES ('".$attribute."')";

		//EXECUTE
		if (mysqli_query($connect, $sql)) {
			echo "New record created successfully for $columname <br>";
		} else {
			echo "Error: " . $sql . "" . mysqli_error($connect);
		}
	}
}

function insertMultidimensionalArraySQL($arrays,$connect){
	if(is_array($arrays)){
		foreach ($arrays as $array => $value) {
			$attack_power = mysqli_real_escape_string($connect,$value[0]);
			$defense_power = mysqli_real_escape_string($connect,$value[1]);
			$stamina = mysqli_real_escape_string($connect,$value[2]);
			$name = mysqli_real_escape_string($connect,$value[3]);
			$id = mysqli_real_escape_string($connect,$value[4]);
			$sql = "INSERT INTO `Pokemon`($columns) VALUES ('".$attack_power."', '".$defense_power."', '".$stamina."', '".$name."', '".$id."', )";

			//EXECUTE
			if (mysqli_query($connect, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "" . mysqli_error($connect);
			}
		}
	}
}


//CLOSE
$mysqli_connection->close();
echo "<hr> mysqli_connection closed!";

?>