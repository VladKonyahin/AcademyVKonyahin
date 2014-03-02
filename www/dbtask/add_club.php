<?php
include("../../config/config.php");
include("functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add stadium</title>
	</head>
	<body>
		<form name="addClub" method="post">
			Name
			<br/>
			<input type="text" name="name">
			<br/>
			Year of foundation
			<br/>
			<input type="date"  name="foundation"/>
			<br/>
			Trophies
			<br/>
			<input type="number" name="trophies"/>
			<br/>
			Budget
			<br/>
			<input type="number" name="budget"/>
			<br/>
			Country
			<br/>
			<select name="country_id">
			<?php getCountries(); ?>
			</select>
			<br/>
			League
			<br/>
			<select name="league_id">
			<?php getLeagues(); ?>
			</select>
			<br/>
			President
			<br/>
			<select name="person_id">
			<?php getPersons(); ?>
			</select>
			<br/>
			Stadium
			<br/>
			<select name="stadium_id">
			<?php getStadiums(); ?>
			</select>
			<br/>
			<input type="submit" name="submitClub" class="button" value="Add"/>
			<hr/>
			<input type="text" name="club_id"/>
			<input type="submit" name="deleteClub" class="button" value="Delete"/>
		</form>
<?php
	if (isset($_REQUEST['submitClub'])) {
		$club['name'] = $_POST['name'];
		$club['foundation'] = $_POST['foundation'];
		$club['budget'] = $_POST['budget'];
		$club['trophies'] = $_POST['trophies'];
		$club['country_id'] = $_POST['country_id'];
		$club['league_id'] = $_POST['league_id'];
		$club['person_id'] = $_POST['person_id'];
		$club['stadium_id'] = $_POST['stadium_id'];
		$empty = true;
		foreach ($club as $value) {
			if (empty($value)) {
				$empty = false;
				break;
				}
		}
		if ($empty) {
			addClub($club);
			}
		}
		if(isset($_REQUEST['deleteClub'])) {
			$id = $_POST['club_id'];
			if(!empty($id)) {
				removeClub($id);
			}
		}
?>
<a href="index.php"><h2>Back</h2></a>
</body>
</html>