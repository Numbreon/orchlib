<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<title>The Missouri S&T Instrumental Music Library</title>
	</head>

	<body>
		<center>		
			<!--Title Banner-->
			<a href="Home.php"><img src="http://i63.tinypic.com/qzojtv.png" alt="Banner" style="width: 75%; padding-bottom: 20px;"/></a>
			<h2>Modify Music</h2><br>
		</center>

		<div class="container" style="left-padding: 20px;">
			<h3>Select the piece you would like to modify.</h3>

			<?php
				// Variables used to connect to the databse
				$servername = "localhost";
				$database = "musiclibrary";
				$username ="root";
				$password = "";

				// Connection to localhost
				$link = mysql_connect($servername, $username, $password);
				// Connection to MusicLibrary
				$db_selected = mysql_select_db($database, $link);	

				// retreive data from database and display MusicID and Title
				$search = "SELECT * FROM musiclibrary.SHEET_MUSIC";
				$result = mysql_query($search);
				echo "<form action='ModifyForm.php' method='post'><table class='table table-striped'><thead><tr><th>MusicID</th><th>Title</th><th>Composer</th></tr></thead><tbody>";
				while($row = mysql_fetch_array($result)) {
					echo "<tr><td><input type='submit' name='choice' value=".$row["MusicID"]."></td><td>".$row["Title"]."</td><td>".$row["COMPFirst"]." ".$row["COMPLast"]."</td>";	
				}
				echo "</table></form>";
			?>

			<!-- home button -->
			<br><a href='Home.php'> Return to homepage</a><br></br>

		</div>
	</body>
</html>