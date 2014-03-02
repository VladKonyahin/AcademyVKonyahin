<?php
include("../../config/config.php");
include("functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add trophies</title>
	</head>
	<body>
		<form name="addTrophy" method="post">
			Name
			<br/>
			<input type="text" name="name">
			<br/>
			Year of foundation
			<br/>
			<input type="text" name="foundation"/>
			<input type="submit" name="submitTrophy" class="button" value="Add"/>
			<hr/>
			<input type="text" name='trophy_id'/>
			<input type="submit" name="deleteTrophy" class="button" value="Delete"/>
		</form>
<?php
	if (isset($_REQUEST['submitTrophy'])) {
		$trophy['name'] = $_POST['name'];
		$trophy['foundation'] = $_POST['foundation'];
		$empty = true;
		foreach ($trophy as $value) {
		if (empty($value)) {
			$empty = false;
			break;
			}
		}
		if ($empty) {
			addTrophy($trophy);
			}
		}
		if(isset($_REQUEST['deleteTrophy'])) {
			$id = $_POST['trophy_id'];
			if(!empty($id)) {
				removeTrophy($id);
			}
		}
?>
<a href="index.php"><h2>Back</h2></a>
</body>
</html>