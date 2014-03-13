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
		<a href="club.php"><h3>Add club</h3></a>
		<a href="league.php"><h3>Add league</h3></a>
		<a href="stadium.php"><h3>Add stadium</h3></a>
		<a href="trophy.php"><h3>Add trophy</h3></a>
		<a href="person.php"><h3>Add person</h3></a>
		<a href="country.php"><h3>Add country</h3></a>
		<a href="search.php"><h3>Search</h3></a>
		<hr/>
		<h3>Select:</h3>
	<div id="menu">
		<ul>
			<li>
				<a href='index.php?page=Clubs'>Clubs</a>
			</li>
			<li>
				<a href='index.php?page=Leagues'>Leagues</a>
			</li>
			<li>
				<a href='index.php?page=Stadiums'>Stadiums</a>
			</li>
			<li>
				<a href='index.php?page=Trophies'>Trophies</a>
			</li>
		</ul>
	</div>
			<?php
			$table = $_GET['page'];
				if(isset($_REQUEST['page'])) {
					switch ($_GET['page']) {
						case "Clubs": {	
							$clubs = new Club();
							$clubs->select();
							break;
						}
						case "Leagues" : {	
							$leagues = new League();
							$leagues->select();
							break;
						}
						case "Stadiums" : {	
							$stadiums = new Stadium();
							$stadiums->select();
							break;
						}	
						case "Trophies" : {
						$trophies = new Trophy();
						$trophies->select();
						}
						default: break;	
						}
				}
			?>
	</body>
</html>
