<?php
class Database {
	public function getConnect(){
	include("$_SERVER[DOCUMENT_ROOT]/../config/config.php");
		$connect = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname,$connect);
		return $connect;
	}
	public function getQueryResult($connection ,$sqlQuery) {
        return mysql_query($sqlQuery);
	}
    public function closeConnection($result, $connect) {
		mysql_free_result($result);
		mysql_close($connect);
	}
}
?>