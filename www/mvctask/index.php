<?php
include ('models/interface.php');
include ('models/database_class.php');
include ('models/club_class.php');
include ('models/league_class.php');
include ('models/country_class.php');
include ('models/person_class.php');
include ('models/stadium_class.php');
include ('models/trophy_class.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Main page</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<a href="view/club.php"><h3>Add club</h3></a>
		<a href="view/league.php"><h3>Add league</h3></a>
		<a href="view/stadium.php"><h3>Add stadium</h3></a>
		<a href="view/trophy.php"><h3>Add trophy</h3></a>
		<a href="view/person.php"><h3>Add person</h3></a>
		<a href="view/country.php"><h3>Add country</h3></a>
		<a href="view/search.php"><h3>Search</h3></a>
		<hr/>
		<h3>Select:</h3>
	<div id="menu">
		<ul>
			<li>
				<a href='?action=Clubs'>Clubs</a>
			</li>
			<li>
				<a href='?action=Leagues'>Leagues</a>
			</li>
			<li>
				<a href='?action=Stadiums'>Stadiums</a>
			</li>
			<li>
				<a href='?action=Trophies'>Trophies</a>
			</li>
		</ul>
	</div>
			<?php
				include ('controller/action.php');
			?>
	</body>
</html>
