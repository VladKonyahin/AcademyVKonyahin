<?php 
include ('../models/country_class.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<title>Add country</title>
</head>
<body>
	<form name="addCountry" method="post">
		City
		<br/>
		<input type="text" name="city"/>
		<br/>
		Country
		<br/>
		<input type="text" name="country"/>
		<input type="submit" name="submitCountry" class="button" value="Add"/>
		<hr/>
		<input type="text" name="country_id"/>
		<input type="submit" name="deleteCountry" class="button" value="Delete"/>
	</form>
<?php
	if(isset($_REQUEST['submitCountry'])) {
		$country['city'] = $_POST['city'];
		$country['country'] = $_POST['country'];
		$empty = true;
		foreach ($country as $value) {
			if (empty($value)) {
				$empty = false;
				break;
		} 
		if ($empty) {
		$obj = new Country();
		$obj->insert($country);
		}
	}
}
	if(isset($_REQUEST['deleteCountry'])) {
		$id = $_POST['country_id'];
		if(!empty($id)) {
			$obj = new Country();
			$obj->delete($id);
			}
	}	
	
	$countries = new Country();
	$countries->select();
?>
<a href="../index.php"><h2>Back</h2></a>
</body>
</html>