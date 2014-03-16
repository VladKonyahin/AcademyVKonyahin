<?php

if (!isset ($_GET["action"] ))
$_GET ["action"] = "Clubs";
	switch($_GET['action']) {
		case "Clubs": {	
		$clubs = new Club();
		$clubs->select();
		break;
		}
		case "Leagues" : {	
		$leagues = new League();
		$leagues->select();
		break;
		}
		case "Stadiums" : {	
		$stadiums = new Stadium();
		$stadiums->select();
		break;
		}
		case "Trophies" : {
		$trophies = new Trophy();
		$trophies->select();
		}
		default: break;	
	}

?>