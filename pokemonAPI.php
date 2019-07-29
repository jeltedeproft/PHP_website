<?php

$response = \Unirest\Request::get("https://pokemon-go1.p.rapidapi.com/pokemon_stats.json",
	array(
		"X-RapidAPI-Host" => "pokemon-go1.p.rapidapi.com",
		"X-RapidAPI-Key" => "4a0fac725amsh2442ad7bd8ffbb0p1a73c5jsn0ecb633d49df"
		)
	);

?>