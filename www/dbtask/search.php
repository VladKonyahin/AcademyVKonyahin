<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Search</title>
</head>
<body>
	<fieldset>
		<legend> Input a value</legend>
		<form name="search" method="post" id="searchForm">
			From table <select name="searchTable" form="searchForm">
				<option value="clubs">Club</option>
				<option value="leagues">League</option>
				<option value="trophies">Trophy</option>
				<option value="stadiums">Stadium</option>
			</select>
			Value <input type="text" class="field" name="value" />
			<input type="submit" class="submit" name="submitValue" value="Search"/>
		</form>	
	</fieldset>
	<?php search(); ?>
</body>
</html>