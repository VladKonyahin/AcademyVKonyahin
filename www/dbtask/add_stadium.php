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
		<form name='addStadium' method="post">
			Name
			<br/>
			<input type="text" name="stadium_name">
			<br/>
			Year of foundation
			<br/>
			<input type='date' class='field' name='foundation'/>
			<br/>
			Capacity
			<br/>
			<input type="number" name="capacity"/>
			<br/>
			<input type='submit' name='submitStadium' class='button' value='Add'/>
			<hr/>
			<input type='text' class='field' name='stadium_id'/>
			<input type='submit' name='deleteStadium' class='button' value='Delete'/>
		</form>
<?php
	if (isset($_REQUEST['submitStadium'])) {
		$stadium['stadium_name'] = $_POST['stadium_name'];
		$stadium['foundation'] = $_POST['foundation'];
		$stadium['capacity'] = $_POST['capacity'];
		$empty = true;
		foreach ($stadium as $value) {
			if (empty($value)) {
				$empty = false;
				break;
				}
		}
		if ($empty) {
			addStadium($stadium);
			}
		}
		if(isset($_REQUEST['deleteStadium'])) {
			$id = $_POST['stadium_id'];
			if(!empty($id)) {
				removeStadium($id);
			}
		}
?>
<a href="index.php"><h2>Back</h2></a>
</body>
</html>