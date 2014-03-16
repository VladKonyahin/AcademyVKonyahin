<?php
include_once("database_class.php");
include_once("interface.php");

class Country extends Database implements dbFunction {
	private $id;
	private $city;
	private $country;


function __construct() {
	
}

public function getId() {
	return $this->id;
}

public function getCity() {
	return $this->city;
}

public function getCountry() {
	return $this->country;
}

public function select() {
	$con = $this->getConnect();
	$sqlQuery = "SELECT city, country FROM countries";
	$result = $this->getQueryResult($con, $sqlQuery);?>
	<h3>Countries:</h3>
	<table border=3>
		<tr>
			<th>City</th>
			<th>Country</th>
		</tr>
	<? while($countries = mysql_fetch_array($result,MYSQL_ASSOC)) {?>
		<tr>
			<td><?print($countries['city'])?></td>
			<td><?print($countries['country'])?></td>
		</tr>
	<?}?>
	</table>
	<?$this->closeConnection($result, $con);
}

public function insert($value) {
	$con = $this->getConnect();
	$sqlQuery = "INSERT INTO countries(city, country) VALUES('".$value['city']."', '".$value['country']."')";
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function update() {
	$con = $this->getConnect();
	$sqlQuery = "UPDATE countries SET `country`='".$this->country."' WHERE `id`=".intval($this->id);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function delete($index) {
	$con = $this->getConnect();
	$sqlQuery = "DELETE FROM countries WHERE id=".intval($index);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function search($value) {
	$con = $this->getConnect();
	$sqlQuery = "SELECT city, country FROM countries WHERE `country` LIKE '%".$value."%'";
	$result = $this->getQueryResult($con, $sqlQuery);
	print("<table border=1><tr><th>City</th><th>Country</th></tr>");
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
		print(Support::rowsGen($row));
		}
	print("</table");
	$this->closeConnection($result, $con);
}

public static function getList() {
	$db = new Database();
	$con = $db->getConnect();
	$sqlQuery = "SELECT `id`, `country` FROM `countries`";
	$result = $db->getQueryResult($con, $sqlQuery);
	print("<select name='countries'>");
	while($countries = mysql_fetch_array($result,MYSQL_ASSOC)) {
		print("<option value='".$countries['id']."'>".$countries['country']."</option>");
		}
	print("</select>");
	$db->closeConnection($result, $con);
	}
}
?>