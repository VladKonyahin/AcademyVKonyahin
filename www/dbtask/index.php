<!DOCTYPE html>
<html>
	<head>
		<title>Main page</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<a href="add_club.php"><h3>Add club</h3></a>
		<a href="add_league.php"><h3>Add league</h3></a>
		<a href="add_stadium.php"><h3>Add stadium</h3></a>
		<a href="add_trophy.php"><h3>Add trophy</h3></a>
		<a href="add_person.php"><h3>Add person</h3></a>
		<a href="add_country.php"><h3>Add country</h3></a>
	</body>
</html>

<?php
include("../../config/config.php");

$query = "SELECT clubs.name, clubs.foundation, clubs.trophies, clubs.budget, countries.city, countries.country, persons.last_name, stadiums.stadium_name, leagues.league_name
					FROM clubs
					JOIN countries ON clubs.country_id = countries.id
					JOIN persons ON clubs.person_id = persons.id
					JOIN stadiums ON clubs.stadium_id = stadiums.id
					JOIN leagues ON clubs.league_id = leagues.id";
$result = mysql_query($query);
echo "<h3>Clubs:</h3>";
	echo "<table border=\"3\", width=\"70%\">";
		echo "<tr>
		<td><b>Club name</td>
		<td><b>City</td>
		<td><b>Country</td>
		<td><b>President</td>
		<td><b>Foundation</td>
		<td><b>Trophies</td>
		<td><b>Budget</td>
		<td><b>League</td>
		<td><b>Stadium</td>
		</tr>";
		echo "<tr>";
while ($club = mysql_fetch_array($result)) {
			echo "<td>{$club['name']}</td>
			<td>{$club['city']}</td>
			<td>{$club['country']}</td>
			<td>{$club['last_name']}</td>
			<td>{$club['foundation']}</td>
			<td>{$club['trophies']}</td>
			<td>{$club['budget']}</td>
			<td>{$club['league_name']}</td>
			<td>{$club['stadium_name']}</td>";
			echo "</tr>";
}
	echo "</table>";

$query = "SELECT leagues.league_name, leagues.rating, countries.city, persons.last_name
		FROM leagues
		JOIN countries ON leagues.country_id = countries.id
		JOIN persons ON leagues.person_id = persons.id";
$result = mysql_query($query);
echo "<h3>Leagues:</h3>";
	echo "<table border=\"3\", width=\"20%\">";
	echo "<tr>
		<td><b>Name</td>
		<td><b>City</td>
		<td><b>Rating</td>
		<td><b>President</td>
		</tr>";
		echo "<tr>";
while($league = mysql_fetch_array($result)) {
			echo "<td>{$league['league_name']}</td>
			<td>{$league['city']}</td>
			<td>{$league['rating']}</td>
			<td>{$league['last_name']}</td>";
			echo "</tr>";
}
	echo "</table>";
	
$query = "SELECT * FROM stadiums";
$result = mysql_query($query);
echo "<h3>Stadiums:</h3>";
	echo "<table border=\"3\", width=\"20%\">";
	echo "<tr>
		<td><b>Name</td>
		<td><b>Foundation</td>
		<td><b>Capacity</td>
		</tr>";
		echo "<tr>";
while($stadium = mysql_fetch_array($result)) {
			echo "<td>{$stadium['stadium_name']}</td>
			<td>{$stadium['foundation']}</td>
			<td>{$stadium['capacity']}</td>";
			echo "</tr>";
}
	echo "</table>";
	
$query = "SELECT * FROM trophies";
$result = mysql_query($query);
echo "<h3>Trophies:</h3>";
	echo "<table border=\"3\", width=\"10%\">";
	echo "<tr>
		<td><b>Name</td>
		<td><b>Foundation</td>
		</tr>";
		echo "<tr>";
while($trophy = mysql_fetch_array($result)) {
			echo "<td>{$trophy['name']}</td>
			<td>{$trophy['foundation']}</td>";
			echo "</tr>";
}
	echo "</table>";
?>