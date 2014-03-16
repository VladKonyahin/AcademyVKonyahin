<?php 
include ('../models/trophy_class.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Add trophy</title>
</head>
<body>
	<form name="addPerson" method="post">
		Trophy name
		<br/>
		<input type="text" name="name"/>
		<br/>
		Year of foundation
		<br/>
		<input type="date" name="foundation"/>
		<br/>
		<input type="submit" name="submitTrophy" class="button" value="Add"/>
		<hr/>
		<input type="text" name="trophy_id"/>
		<input type="submit" name="deleteTrophy" class="button" value="Delete"/>
	</form>
<?php
	if(isset($_REQUEST['submitTrophy'])) {
		$trophy['name'] = $_POST['name'];
		$trophy['foundation'] = $_POST['foundation'];
		$empty = true;
		foreach ($trophy as $value) {
			if (empty($value)) {
				$empty = false;
				break;
		} 
		if ($empty) {
		$obj = new Trophy();
		$obj->insert($trophy);
		}
	}
}
	if(isset($_REQUEST['deleteTrophy'])) {
		$id = $_POST['trophy_id'];
		if(!empty($id)) {
			$obj = new Trophy();
			$obj->delete($id);
			}
	}	
	$trophies = new Trophy();
	$trophies->select();
?>
<a href="../index.php"><h2>Back</h2></a>
</body>
</html>