<?php
include_once("database_class.php");
include_once("interface.php");

class Stadium extends Database implements dbFunction {
	private $id;
	private $stadium_name;
	private $foundation;
	private $capacity;


function __construct() {

}

public function getId() {
	return $this->id;
}

public function getStadiumName() {
	return $this->stadium_name;
}


public function getFoundation() {
	return $this->foundation;
}

public function getCapacity() {
	return $this->capacity;
}

public function select() {
	$con = $this->getConnect();
	$sqlQuery = "SELECT stadium_name, foundation, capacity FROM stadiums";
	$result = $this->getQueryResult($con, $sqlQuery);?>
	<h3>Stadiums:</h3>
	<table border=3>
		<tr>
			<th>Stadium name</th>
			<th>Foundation</th>
			<th>Capacity</th>
		</tr>
	<?
	while($stadiums = mysql_fetch_array($result)) {?>
		<tr>
			<td><?print($stadiums['stadium_name'])?></td>
			<td><?print($stadiums['foundation'])?></td>
			<td><?print($stadiums['capacity'])?></td>
		</tr>
		<?}?>
	</table>
	<?$this->closeConnection($result, $con);
	}

public function insert($value) {
	$con = $this->getConnect();
	$sqlQuery = "INSERT INTO stadiums(stadium_name, foundation, capacity) VALUES('".$value['stadium_name']."', '".$value['foundation']."', '".$value['capacity']."')";
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function update() {
	$con = $this->getConnect();
	$sqlQuery = "UPDATE stadiums SET `stadium_name`='".$this->stadium_name."' WHERE `id`=".intval($this->id);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function delete($index) {
	$con = $this->getConnect();
	$sqlQuery = "DELETE FROM stadiums WHERE id=".intval($index);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function search($word) {
	$con = $this->getConnect();
	$sqlQuery = "SELECT stadium_name, foundation, capacity FROM stadiums WHERE `stadium_name` LIKE '%".$word."%'";
	$result = $this->getQueryResult($con, $sqlQuery);?>
	<table border=3>
		<tr>
			<th>Stadium name</th>
			<th>Year of foundation</th>
			<th>Capacity</th>
		</tr> <?
	while($stadiums = mysql_fetch_array($result,MYSQL_ASSOC)) {?>
		<tr>
			<td><?print($stadiums['stadium_name'])?></td>
			<td><?print($stadiums['foundation'])?></td>
			<td><?print($stadiums['capacity'])?></td>
		</tr>
		<?} ?>
	</table><?
	$this->closeConnection($result, $con);
}

public static function getList() {
	$db = new Database();
	$con = $db->getConnect();
	$sqlQuery = "SELECT id, stadium_name FROM stadiums";
	$result = $db->getQueryResult($con, $sqlQuery);
	print("<select name='stadiums'>");
	while($stadiums = mysql_fetch_array($result,MYSQL_ASSOC)) {
		print("<option value='".$stadiums['id']."'>".$stadiums['stadium_name']."</option>");
		}
	print("</select>");
	$db->closeConnection($result, $con);
	}
}
?>