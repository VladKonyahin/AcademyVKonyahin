<?php
include_once("database_class.php");
include_once("interface.php");

class Trophy extends Database implements dbFunction {
	private $id;
	private $name;
	private $foundation;


function __construct() {
	
}

public function getId() {
	return $this->id;
}

public function getName() {
	return $this->name;
}

public function getFoundation() {
	return $this->foundation;
}

public function select() {
	$con = $this->getConnect();
	$sqlQuery = "SELECT name, foundation FROM trophies";
	$result = $this->getQueryResult($con, $sqlQuery);?>
	<h3>Trophies:</h3>
	<table border=3>
		<tr>
			<th>Trophy name</th>
			<th>Year of foundation</th>
		</tr>
	<? while($trophies = mysql_fetch_array($result,MYSQL_ASSOC)) {?>
		<tr>
			<td><?print($trophies['name'])?></td>
			<td><?print($trophies['foundation'])?></td>
		</tr>
	<?}?>
	</table>
	<?$this->closeConnection($result, $con);
}

public function insert($value) {
	$con = $this->getConnect();
	$sqlQuery = "INSERT INTO trophies(name, foundation) VALUES('".$value['name']."', '".$value['foundation']."')";
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
	$sqlQuery = "DELETE FROM trophies WHERE id=".intval($index);
	$this->getQueryResult($con, $sqlQuery);
	mysql_close($con);
}

public function search($word) {
	$con = $this->getConnect();
	$sqlQuery = "SELECT name, foundation FROM trophies WHERE `name` LIKE '%".$word."%'";
	$result = $this->getQueryResult($con, $sqlQuery); ?>
	<table border=3>
		<tr>
			<th>Name</th>
			<th>Year of foundation</th>
		</tr> <?
	while($trophies = mysql_fetch_array($result,MYSQL_ASSOC)) {?>
		<tr>
			<td><?print($trophies['name'])?></td>
			<td><?print($trophies['foundation'])?></td>
		</tr>
		<?} ?>
	</table><?
	$this->closeConnection($result, $con);
}

public static function getList() {
	$db = new Database();
	$con = $db->getConnect();
	$sqlQuery = "SELECT `id`, `name` FROM `trophies`";
	$result = $db->getQueryResult($con, $sqlQuery);
	print("<select name='trophies'>");
	while($countries = mysql_fetch_array($result,MYSQL_ASSOC)) {
		print("<option value='".$trophies['id']."'>".$trophies['name']."</option>");
		}
	print("</select>");
	$db->closeConnection($result, $con);
	}
}
?>