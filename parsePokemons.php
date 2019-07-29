<?php
//create arrays for different attributes
$attacks = [];
$defenses = [];
$staminas = [];
$names = [];
$ids = [];

//check for error
if ($response->code == 200) {
	echo "succesfull data retrieval!";
	foreach($response->body as $pokemon) {
		$i = 0;
		foreach ($pokemon as $pokemonAttribute => $value) {
			switch($pokemonAttribute){
				case "base_attack":
					$attacks[] = $value;
					break;
				case "base_defense":
					$defenses[] = $value;
					break;
				case "base_stamina":
				    $staminas[] = $value;
				    break;
				case "pokemon_id":
					$ids[] = $value;
					break;
				case "pokemon_name":
					$names[] = $value;
					break;
			}
			$i++;
		}
	}
}else{
	echo "failure retrieving data from pokemon API";
}
?>