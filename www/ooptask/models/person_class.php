<?php
include_once("database_class.php");
include_once("interface.php");

class Person extends Database implements dbFunction {
	private $id;
	private $first_name;
	private $last_name;


function __construct() {

}

public function getId() {
	return $this->id;
}

public function getFirstName() {
	return $this->first_name;
}


public function getLastName() {
	return $this->last_name;
}

public function select() {
	$con = $this->getConnect();
	$sqlQuery = "SELECT first_name, last_name FROM persons";
	$result = $this->getQueryResult($con, $sqlQuery);?>
	<h3>Presidents:<h3>
	<table border=3>
		<tr>
			<th>First name</th>
			<th>Last name</th>
		</tr>
	<?
	while($persons = mysql_fetch_array($result)) {?>
		<tr>
			<td><?print($persons['first_name'])?></td>
			<td><?print($persons['last_name'])?></td>
		</tr>
		<?}?>
	</table>
	<?$this->closeConnection($result, $con);
	}

public function insert($value) {
	$con = $this->getConnect();
	$sqlQuery = "INSERT INTO persons(first_name, last_name) VALUES('".$value['first_name']."', '".$value['last_name']."')";
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function update() {
	$con = $this->getConnect();
	$sqlQuery = "UPDATE persons SET `last_name`='".$this->last_name."' WHERE `id`=".intval($this->id);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function delete($index) {
	$con = $this->getConnect();
	$sqlQuery = "DELETE FROM persons WHERE id=".intval($index);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function search($word) {
	$con = $this->getConnect();
	$sqlQuery = "SELECT first_name, last_name FROM persons WHERE `last_name` LIKE '%".$word."%'";
	$result = $this->getQueryResult($con, $sqlQuery);?>
	<table border=3>
		<tr>
			<th>First name</th>
			<th>Last name</th>
		</tr> <?
	while($persons = mysql_fetch_array($result,MYSQL_ASSOC)) {?>
		<tr>
			<td><?print($persons['first_name'])?></td>
			<td><?print($persons['last_name'])?></td>
		</tr>
		<?}?>
	</table>
	<?
	$this->closeConnection($result, $con);
}

public static function getList() {
	$db = new Database();
	$con = $db->getConnect();
	$sqlQuery = "SELECT id, last_name FROM persons";
	$result = $db->getQueryResult($con, $sqlQuery);
	print("<select name='persons'>");
	while($persons = mysql_fetch_array($result,MYSQL_ASSOC)) {
		print("<option value='".$persons['id']."'>".$persons['last_name']."</option>");
		}
	print("</select>");
	$db->closeConnection($result, $con);
	}
}
?>