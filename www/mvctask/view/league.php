<?php 
include ('../models/country_class.php');
include ('../models/person_class.php');
include ('../models/league_class.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Add league</title>
</head>
<body>
	<form name="addLeague" method="post">
		League name
		<br/>
		<input type="text" name="league_name"/>
		<br/>
		Rating
		<br/>
		<input type="number" name="rating"/>
		<br/>
		Country
		<br/>
		<? Country::getList(); ?>
		<br/>
		President
		<br/>
		<? Person::getList(); ?>
		<br/>
		<input type="submit" name="submitLeague" class="button" value="Add"/>
		<hr/>
		<input type="text" name="league_id"/>
		<input type="submit" name="deleteLeague" class="button" value="Delete"/>
	</form>
<?php
	if(isset($_REQUEST['submitLeague'])) {
		$league['league_name'] = $_POST['league_name'];
		$league['rating'] = $_POST['rating'];
		$league['country_id'] = $_POST['country_id'];
		$league['person_id'] = $_POST['person_id'];
		$empty = true;
		foreach ($league as $value) {
			if (empty($value)) {
				$empty = false;
				break;
		} 
		if ($empty) {
		$obj = new League();
		$obj->insert($league);
		}
	}
}
	if(isset($_REQUEST['deleteLeague'])) {
		$id = $_POST['league_id'];
		if(!empty($id)) {
			$obj = new League();
			$obj->delete($id);
			}
	}	
	$leagues = new League();
	$leagues->select();
?>
<a href="../index.php"><h2>Back</h2></a>
</body>
</html>