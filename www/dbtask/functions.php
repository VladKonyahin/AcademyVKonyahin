<?php 
function addTrophy($trophy) {
	$result = mysql_query('INSERT INTO trophies(name, foundation) VALUES("'.$trophy['name'].'","'.$trophy['foundation'].'")');
}

function addPerson($person) {
	$result = mysql_query('INSERT INTO persons(first_name, last_name) VALUES("'.$person['first_name'].'","'.$person['last_name'].'")');
}

function addStadium($stadium) {
	$result = mysql_query('INSERT INTO stadiums(stadium_name, foundation, capacity) VALUES("'.$stadium['stadium_name'].'","'.$stadium['foundation'].'", "'.$stadium['capacity'].'")');
}

function addLeague($league) {
	$result = mysql_query('INSERT INTO leagues(league_name, rating, country_id, person_id) VALUES("'.$league['league_name'].'","'.$league['rating'].'", "'.$league['country_id'].'", "'.$league['person_id'].'")');
}

function addCountry($country) {
	$result = mysql_query('INSERT INTO countries(city, country) VALUES("'.$country['city'].'","'.$country['country'].'")');
}

function addClub($club) {
	$result = mysql_query('INSERT INTO clubs(name, country_id, league_id, foundation, trophies, budget, person_id, stadium_id)
			VALUES("'.$club['name'].'", "'.$club['country_id'].'", "'.$club['league_id'].'", "'.$club['foundation'].'","'.$club['trophies'].'","'.$club['budget'].' "," '.$club['stadium_id'].' "," '.$club['person_id'].'")');
}

function getCountries() {
	$query = "SELECT id, country FROM countries";
	$result = mysql_query($query);
	while($countries = mysql_fetch_array($result)) {
		print("<option value='".$countries['id']."'>".$countries['country']."</option>");
	}
}

function getPersons() {
	$query = "SELECT id, last_name FROM persons";
	$result = mysql_query($query);
	while($persons = mysql_fetch_array($result)) {
		print("<option value='".$persons['id']."'>".$persons['last_name']."</option>");
	}
}

function getLeagues() {
	$query = "SELECT id, league_name FROM leagues";
	$result = mysql_query($query);
	while($leagues = mysql_fetch_array($result)) {
		print("<option value='".$leagues['id']."'>".$leagues['league_name']."</option>");
	}
}

function getStadiums() {
	$query = "SELECT id, stadium_name FROM stadiums";
	$result = mysql_query($query);
	while($stadiums = mysql_fetch_array($result)) {
		print("<option value='".$stadiums['id']."'>".$stadiums['stadium_name']."</option>");
	}
}

function rowsGen($row) {
	$newRow = "<tr>";
	foreach ($row as $col) {
		if (!is_null($col)) {
			$newRow = $newRow."<td>".$col."</td>";
		} else {
			$newRow = $newRow."<td>-</td>";
			}
		}
		return $newRow."</tr>";
}

function removeCountry($id){
$query = "DELETE FROM countries WHERE id=".intval($id);
$result = mysql_query($query);	
}

function removeStadium($id){
$query = "DELETE FROM stadiums WHERE id=".intval($id);
$result = mysql_query($query);	
}

function removePerson($id){
$query = "DELETE FROM persons WHERE id=".intval($id);
$result = mysql_query($query);	
}

function removeTrophy($id){
$query = "DELETE FROM trophies WHERE id=".intval($id);
$result = mysql_query($query);	
}

function removeLeague($id){
$query = "DELETE FROM leagues WHERE id=".intval($id);
$result = mysql_query($query);	
}

function removeClub($id){
$query = "DELETE FROM clubs WHERE id=".intval($id);
$result = mysql_query($query);	
}

function showClubs($order = NULL) {
	$query = "SELECT clubs.name, clubs.foundation, clubs.trophies, clubs.budget, countries.city, countries.country, persons.last_name, stadiums.stadium_name, leagues.league_name
					FROM clubs
					JOIN countries ON clubs.country_id = countries.id
					JOIN persons ON clubs.person_id = persons.id
					JOIN stadiums ON clubs.stadium_id = stadiums.id
					JOIN leagues ON clubs.league_id = leagues.id";
	$result = mysql_query($query);
	print("<table border=3><tr><td>Club name</td>
								<td>City</td>
								<td>Country</td>
								<td>President</td>
								<td>Foundation</td>
								<td>Trophies</td>
								<td>Budget</td>
								<td>Leagues</td>
								<td>Stadium</td>
							</tr>");
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
			print(rowsGen($row));
		}
	print("</table>");
}


?>