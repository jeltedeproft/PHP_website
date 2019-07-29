<?php
//check for error
if ($response->code == 200) {
	echo "succesfull data retrieval! <br>";
	foreach($response->body as $pokemon) {
		$i = 0;
		foreach ($pokemon as $pokemonAttribute => $value) {
			switch($pokemonAttribute){
				case "base_attack":
					array_push($attacks, $value);
					//$attacks[] = $value;
					break;
				case "base_defense":
					array_push($defenses, $value);
					//$defenses[] = $value;
					break;
				case "base_stamina":
					array_push($staminas, $value);
				    //$staminas[] = $value;
				    break;
				case "pokemon_id":
					array_push($names, $value);
					//$ids[] = $value;
					break;
				case "pokemon_name":
					array_push($ids, $value);
					//$names[] = $value;
					break;
			}
			$i++;
		}
	}
}else{
	echo "failure retrieving data from pokemon API";
}
?>