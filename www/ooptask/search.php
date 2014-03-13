<?php
include ('models/club_class.php');
include ('models/league_class.php');
include ('models/trophy_class.php');
include ('models/stadium_class.php');
include ('models/country_class.php');
include ('models/person_class.php');

	function fSearch() {
		if(isset($_REQUEST['submitValue']) && !empty($_REQUEST['value'])) {
			$word = $_POST['value'];
			switch($_POST['searchForm']) {
				case "Club": {
				$clubs = new Club();
				$clubs->search($word);
				break;
				}
				case "League": {
				$leagues = new League();
				$leagues->search($word);
				break;
				}
				case "Trophy": {
				$trophies = new Trophy();
				$trophies->search($word);
				break;
				}
				case "Stadium": {
				$stadiums = new Stadium();
				$stadiums->search($word);
				break;
				}
				case "Country": {
				$countries = new Country();
				$countries->search($word);
				break;
				}
				case "Person": {
				$persons = new Person();
				$persons->search($word);
				break;
				}
				default: break;
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Search</title>
	</head>
	<body>
		<fieldset>
			<legend>Value</legend>
			<form name="search" method="post">
				From table <select name="searchForm">
					<option value="Club">Club</option>
					<option value="League">League</option>
					<option value="Trophy">Trophy</option>
					<option value="Stadium">Stadium</option>
					<option value="Country">Country</option>
					<option value="Person">Person</option>
				</select>
				Value <input type="text" class="field" name="value" />
				<input type="submit" class="submit" name="submitValue" value="Search"/>
			</form>
		</fieldset>
		<?php fSearch(); ?>
	</body>
</html>