<?php
include("../../config/config.php");
include("functions.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Add leagues</title>
</head>
<body>
	<form name="addLeague" method="post">
		Name
		<br/>
		<input type="text" name="league_name"/>	
		<br/>
		Rating
		<br/>
		<input type="number" name="rating"/>
		<br/>
		Country
		<br/>
		<select name="country_id">
		<?php getCountries(); ?>
		</select>
		<br/>
		President
		<br/>
		<select name="person_id">
		<?php getPersons(); ?>
		</select>
		<br/>
		<input type='submit' name='submitLeague' class='button' value='Add' />
		<hr/>
		<input type='text' class='field' name='league_id' />
		<input type='submit' name='deleteLeague' class='button' value='Delete' />
	</form>
<?php
if(isset($_REQUEST["submitLeague"])) {
		$league["league_name"] = $_POST["league_name"];
		$league["rating"] = $_POST["rating"];
		$league["country_id"] = $_POST["country_id"];
		$league["person_id"] = $_POST["person_id"];
		$empty = true;
		foreach ($league as $value) {
			if (empty($value)) {
				$empty = false;
				break;
				}
			}
		if($flag) {
			addLeague($league);
		}
	}
	if(isset($_REQUEST['deleteLeague'])) {
			$id = $_POST['league_id'];
			if(!empty($id)) {
				removeLeague($id);
			}
		}
?>
<a href="index.php"><h2>Back</h2></a>
</body>
</html>