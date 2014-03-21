<?php
include_once("database_class.php");
include_once("interface.php");

class Club extends Database implements dbFunction {
	private $id;
	private $name;
	private $league_id;
	private $country_id;
	private $budget;
	private $foundation;
	private $trophies;
	private $stadium_id;
	private $person_id;


function __construct() {

}

public function getId() {
	return $this->id;
}

public function getLeagueId() {
	return $this->league_id;
}

public function getCountryId() {
	return $this->country_id;
}

public function getBudget() {
	return $this->budget;
}

public function getFoundation() {
	return $this->foundation;
}

public function getTrophies() {
	return $this->trophies;
}

public function getStadiumId() {
	return $this->stadium_id;
}

public function getPersonId() {
	return $this->person_id;
}

public function select() {
	$con = $this->getConnect();
	$sqlQuery = "SELECT clubs.name, clubs.foundation, clubs.trophies, clubs.budget, countries.city, countries.country, persons.last_name, stadiums.stadium_name, leagues.league_name
					FROM clubs
					JOIN countries ON clubs.country_id = countries.id
					JOIN persons ON clubs.person_id = persons.id
					JOIN stadiums ON clubs.stadium_id = stadiums.id
					JOIN leagues ON clubs.league_id = leagues.id";
	$result = $this->getQueryResult($con, $sqlQuery);?>
	<h3>Clubs:</h3>
	<table border=3>
		<tr>
			<th>Club name</th>
			<th>City</th>
			<th>Country</th>
			<th>President</th>
			<th>Foundation</th>
			<th>Trophies</th>
			<th>Budget</th>
			<th>League</th>
			<th>Stadium</th>
		</tr>
	<?
	while($clubs = mysql_fetch_array($result)) {?>
		<tr>
			<td><?print($clubs['name'])?></td>
			<td><?print($clubs['city'])?></td>
			<td><?print($clubs['country'])?></td>
			<td><?print($clubs['last_name'])?></td>
			<td><?print($clubs['foundation'])?></td>
			<td><?print($clubs['trophies'])?></td>
			<td><?print($clubs['budget'])?></td>
			<td><?print($clubs['league_name'])?></td>
			<td><?print($clubs['stadium_name'])?></td>
		</tr>
		<?}?>
	</table>
	<?$this->closeConnection($result, $con);
	}

public function insert($value) {
	$con = $this->getConnect();
	$sqlQuery = "INSERT INTO clubs(name, country_id, league_id, foundation, trophies, budget, person_id, stadium_id) VALUES('".$value['name']."', '".$value['country_id']."', '".$value['league_id']."', '".$value['foundation']."', '".$value['trophies']."', '".$value['budget']."', '".$value['person_id']."', '".$value['stadium_id']."')";
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function update() {
	$con = $this->getConnect();
	$sqlQuery = "UPDATE clubs SET `name`='".$this->name."' WHERE `id`=".intval($this->id);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function delete($index) {
	$con = $this->getConnect();
	$sqlQuery = "DELETE FROM clubs WHERE id=".intval($index);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function search($word) {
	$con = $this->getConnect();
	$sqlQuery = "SELECT clubs.name, clubs.foundation, clubs.trophies, clubs.budget, countries.city, countries.country, persons.last_name, stadiums.stadium_name, leagues.league_name
					FROM clubs
					JOIN countries ON clubs.country_id = countries.id
					JOIN persons ON clubs.person_id = persons.id
					JOIN stadiums ON clubs.stadium_id = stadiums.id
					JOIN leagues ON clubs.league_id = leagues.id
					WHERE `name` LIKE '%".$word."%'";
	$result = $this->getQueryResult($con, $sqlQuery);?>
	<table border=3>
		<tr>
			<th>Club name</th>
			<th>City</th>
			<th>Country</th>
			<th>President</th>
			<th>Foundation</th>
			<th>Trophies</th>
			<th>Budget</th>
			<th>League</th>
			<th>Stadium</th>
		</tr> <?
	while($clubs = mysql_fetch_array($result,MYSQL_ASSOC)) {?>
		<tr>
			<td><?print($clubs['name'])?></td>
			<td><?print($clubs['city'])?></td>
			<td><?print($clubs['country'])?></td>
			<td><?print($clubs['last_name'])?></td>
			<td><?print($clubs['foundation'])?></td>
			<td><?print($clubs['trophies'])?></td>
			<td><?print($clubs['budget'])?></td>
			<td><?print($clubs['league_name'])?></td>
			<td><?print($clubs['stadium_name'])?></td>
		</tr>
		<?} ?>
	</table><?
	$this->closeConnection($result, $con);
	}
	
	public static function getList() {
	$db = new Database();
	$con = $db->getConnect();
	$sqlQuery = "SELECT `id`, `name` FROM `clubs`";
	$result = $db->getQueryResult($con, $sqlQuery);
	print("<select name='clubs'>");
	while($clubs = mysql_fetch_array($result,MYSQL_ASSOC)) {
		print("<option value='".$clubs['id']."'>".$clubs['name']."</option>");
		}
	print("</select>");
	$db->closeConnection($result, $con);
	}
}
?>