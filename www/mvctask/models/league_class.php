<?php
include_once("database_class.php");
include_once("interface.php");

class League extends Database implements dbFunction {
	private $id;
	private $league_name;
	private $rating;
	private $country_id;
	private $person_id;


function __construct() {
	
}

public function getId() {
	return $this->id;
}

public function getLeagueName() {
	return $this->league_name;
}

public function getRating() {
	return $this->rating;
}

public function getCountryId() {
	return $this->country_id;
}

public function getPersonId() {
	return $this->person_id;
}

public function select() {
	$con = $this->getConnect();
	$sqlQuery = "SELECT league_name, rating, countries.country, persons.last_name FROM leagues
				JOIN countries ON leagues.country_id = countries.id
				JOIN persons ON leagues.person_id = persons.id";
	$result = $this->getQueryResult($con, $sqlQuery);?>
	<h3>Leagues:</h3>
	<table border=3>
		<tr>
			<th>League name</th>
			<th>Rating</th>
			<th>Country</th>
			<th>President</th>
		</tr>
	<? while($leagues = mysql_fetch_array($result,MYSQL_ASSOC)) {?>
		<tr>
			<td><?print($leagues['league_name'])?></td>
			<td><?print($leagues['rating'])?></td>
			<td><?print($leagues['country'])?></td>
			<td><?print($leagues['last_name'])?></td>
		</tr>
	<?}?>
	</table>
	<?$this->closeConnection($result, $con);
}

public function insert($value) {
	$con = $this->getConnect();
	$sqlQuery = "INSERT INTO leagues(league_name, rating, country_id, person_id) VALUES('".$value['league_name']."', '".$value['rating']."', '".$value['country_id']."', '".$value['person_id']."')";
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function update() {
	$con = $this->getConnect();
	$sqlQuery = "UPDATE trophies SET `name`='".$this->name."' WHERE `id`=".intval($this->id);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function delete($index) {
	$con = $this->getConnect();
	$sqlQuery = "DELETE FROM leagues WHERE id=".intval($index);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function search($value) {
	$con = $this->getConnect();
	$sqlQuery = "SELECT name, foundation FROM trophies WHERE `name` LIKE '%".$value."%'";
	$result = $this->getQueryResult($con, $sqlQuery);
	print("<table border=1><tr><th>name</th><th>foundation</th></tr>");
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
		print(Support::rowsGen($row));
		}
	print("</table");
	$this->closeConnection($result, $con);
}

public static function getList() {
	$db = new Database();
	$con = $db->getConnect();
	$sqlQuery = "SELECT `id`, `league_name` FROM `leagues`";
	$result = $db->getQueryResult($con, $sqlQuery);
	print("<select name='leagues'>");
	while($leagues = mysql_fetch_array($result,MYSQL_ASSOC)) {
		print("<option value='".$leagues['id']."'>".$leagues['league_name']."</option>");
		}
	print("</select>");
	$db->closeConnection($result, $con);
	}
}
?>