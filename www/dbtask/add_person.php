<?php
include("../../config/config.php");
include("functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add person</title>
	</head>
	<body>
		<form name="addTrophy" method="post">
			First name
			<br/>
			<input type="text" name="first_name">
			<br/>
			Last name
			<br/>
			<input type="text" class="field" name="last_name"/>
			<input type="submit" name="submitPerson" class="button" value="Add"/>
			<hr/>
			<input type="text" name="person_id"/>
			<input type="submit" name="deletePerson" class="button" value="Delete"/>
		</form>
<?php
	if (isset($_REQUEST['submitPerson'])) {
		$person['first_name'] = $_POST['first_name'];
		$person['last_name'] = $_POST['last_name'];
		$empty = true;
		foreach ($person as $value) {
		if (empty($value)) {
			$empty = false;
			break;
			}
		}
		if ($empty) {
			addPerson($person);
			}
		}
		if(isset($_REQUEST['deletePerson'])) {
			$id = $_POST['person_id'];
			if(!empty($id)) {
				removePerson($id);
			}
		}
?>
<a href="index.php"><h2>Back</h2></a>
</body>
</html>