<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>title</title>
</head>
<body>
<fieldset>
<legend> Input a value</legend>
<form name='search' method="post" id="sForm">
From table <select name='sTable' form="sForm">
<option value="clubs">Club</option>
<option value="leagues">League</option>
<option value="trophies">Trophy</option>
<option value="stadiums">Stadium</option>
</select>
Value <input type='text' class='field' name='value' />
<input type='submit' class='submit' name='submitValue' value='Search'/>
</form>	
</fieldset>
</body>
</html>
<?php
include("../../config/config.php");
if (isset($_REQUEST['submitValue']) && !empty($_POST['value'])) {
		$queryPart = " AND ";
		$table = $_POST['sTable'];
		$value = $_POST['value'];
		if ($table == "clubs") {
			$query = "SELECT * FROM clubs
			WHERE $value = club.name";
		$result = mysql_query($query); 
			echo "<table border=\"3\", width=\"70%\">";
		echo "<tr>
		<td><b>Club name</td>
		</tr>";
		echo "<tr>";
while ($club = mysql_fetch_array($result)) {
			echo "<td>{$club['name']}</td>
			echo "</tr>";
}
	echo "</table>";
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
}


?>