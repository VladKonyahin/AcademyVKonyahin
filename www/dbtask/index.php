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
		<a href="search.php"><h3>Search</h3></a>


<?php
include("../../config/config.php");

$query = "SELECT clubs.name, clubs.foundation, clubs.trophies, clubs.budget, countries.city, countries.country, persons.last_name, stadiums.stadium_name, leagues.league_name
					FROM clubs
					JOIN countries ON clubs.country_id = countries.id
					JOIN persons ON clubs.person_id = persons.id
					JOIN stadiums ON clubs.stadium_id = stadiums.id
					JOIN leagues ON clubs.league_id = leagues.id";
$result = mysql_query($query);?>
	<h3>Clubs:</h3>
		<table border=3, width=70%>
			<tr>
				<td><b>Club name</td>
				<td><b>City</td>
				<td><b>Country</td>
				<td><b>President</td>
				<td><b>Foundation</td>
				<td><b>Trophies</td>
				<td><b>Budget</td>
				<td><b>League</td>
				<td><b>Stadium</td>
			</tr>
		<tr> <?
while ($club = mysql_fetch_array($result)) { ?>
			<td><?print($clubs['name'])?></td>
			<td><?print($clubs['city'])?></td>
			<td><?print($clubs['country'])?></td>
			<td><?print($clubs['last_name'])?></td>
			<td><?print($clubs['foundation'])?></td>
			<td><?print($clubs['trophies'])?></td>
			<td><?print($clubs['budget'])?></td>
			<td><?print($clubs['league_name'])?></td>
			<td><?print($clubs['stadium_name'])?></td>
		</tr> <?
} ?>
	</table> <?

$query = "SELECT leagues.league_name, leagues.rating, countries.city, persons.last_name
		FROM leagues
		JOIN countries ON leagues.country_id = countries.id
		JOIN persons ON leagues.person_id = persons.id";
$result = mysql_query($query);?>
	<h3>Leagues:</h3>
		<table border=3, width=20%>
			<tr>
				<td><b>Name</td>
				<td><b>City</td>
				<td><b>Rating</td>
				<td><b>President</td>
			</tr>
		<tr> <?
while($league = mysql_fetch_array($result)) {?>
			<td><?print($league['league_name'])?></td>
			<td><?print($league['city'])?></td>
			<td><?print($league['rating'])?></td>
			<td><?print($league['last_name'])?></td>
			</tr> <?
} ?>
		</table>
	<?
$query = "SELECT * FROM stadiums";
$result = mysql_query($query); ?>
	<h3>Stadiums:</h3>
		<table border=3, width=20%>
			<tr>
				<td><b>Name</td>
				<td><b>Foundation</td>
				<td><b>Capacity</td>
			</tr>
		<tr> <?
while($stadium = mysql_fetch_array($result)) {?>
			<td><?print($stadium['stadium_name'])?></td>
			<td><?print($stadium['foundation'])?></td>
			<td><?print($stadium['capacity'])?></td>
		</tr><?
}?>
	</table>
	<?
$query = "SELECT * FROM trophies";
$result = mysql_query($query); ?>
	<h3>Trophies:</h3>
		<table border=3, width=10%>
		<tr>
			<td><b>Name</td>
			<td><b>Foundation</td>
		</tr>
			<tr> <?
while($trophy = mysql_fetch_array($result)) { ?>
				<td><?print($trophy['name'])?></td>
				<td><?print($trophy['foundation'])?></td>
			</tr> <?
}?>
		</table>
	</body>
</html>