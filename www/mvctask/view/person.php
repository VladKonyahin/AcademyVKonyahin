<?php 
include ('../models/person_class.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Add person</title>
</head>
<body>
	<form name="addPerson" method="post">
		First name
		<br/>
		<input type="text" name="first_name"/>
		<br/>
		Last name
		<br/>
		<input type="text" name="last_name"/>
		<input type="submit" name="submitPerson" class="button" value="Add"/>
		<hr/>
		<input type="text" name="person_id"/>
		<input type="submit" name="deletePerson" class="button" value="Delete"/>
	</form>
<?php
	if(isset($_REQUEST['submitPerson'])) {
		$person['first_name'] = $_POST['first_name'];
		$person['last_name'] = $_POST['last_name'];
		$empty = true;
		foreach ($person as $value) {
			if (empty($value)) {
				$empty = false;
				break;
		} 
		if ($empty) {
		$obj = new Person();
		$obj->insertValue($person);
		}
	}
}
	if(isset($_REQUEST['deletePerson'])) {
		$id = $_POST['person_id'];
		if(!empty($id)) {
			$obj = new Person();
			$obj->delete($id);
			}
	}
	$persons = new Person();
	$persons->select();
?>
<a href="../index.php"><h2>Back</h2></a>
</body>
</html>