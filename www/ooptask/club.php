<?php 
include ('models/club_class.php');
include ('models/league_class.php');
include ('models/country_class.php');
include ('models/person_class.php');
include ('models/stadium_class.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Add club</title>
</head>
<body>
	<form name="addClub" method="post">
		Club name
		<br/>
		<input type="text" name="name"/>
		<br/>
		league
		<br/>
		<? League::getList(); ?>
		<br/>
		Country
		<br/>
		<? Country::getList(); ?>
		<br/>
		Budget
		<br/>
		<input type="number" name="budget"/>
		<br/>
		Year of foundation
		<br/>
		<input type="date" name="foundation"/>
		<br/>
		Trophies
		<br/>
		<input type="number" name="trophies"/>
		<br/>
		Stadium
		<br/>
		<? Stadium::getList(); ?>
		<br/>
		President
		<br/>
		<? Person::getList(); ?>
		<input type="submit" name="submitClub" class="button" value="Add"/>
		<hr/>
		<input type="text" name="club_id"/>
		<input type="submit" name="deleteClub" class="button" value="Delete"/>
	</form>
<?php
	if(isset($_REQUEST['submitClub'])) {
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
		if ($empty) {
		$obj = new Club();
		$obj->insert($club);
		}
	}
}
	if(isset($_REQUEST['deleteClub'])) {
		$id = $_POST['club_id'];
		if(!empty($id)) {
			$obj = new Club();
			$obj->delete($id);
			}
	}	
	$clubs = new Club();
	$clubs->select();
?>
<a href="index.php"><h2>Back</h2></a>
</body>
</html>