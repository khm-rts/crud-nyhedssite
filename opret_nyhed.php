<?php
// Indlæs fil til configuration og oprettelse af forbindelse til databasen.
require 'db_config.php'
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Opret nyhed</title>
</head>

<body>
	<h1>Opret nyhed</h1>
	<a href="index.php">Tilbage til oversigt</a>

<?php
// Hvis formularen er sendt, køres dette kode
if ( isset($_POST['submit']) )
{
	// Hent værdier fra formular og escape værdier for at sikre imod SQL injections, når variabel bruges i forespørgsel til databasen
	$nyhed_overskrift		= mysqli_real_escape_string($link, $_POST['overskrift']);
	$nyhed_indhold			= mysqli_real_escape_string($link, $_POST['indhold']);
	$nyhed_forfatternavn	= mysqli_real_escape_string($link, $_POST['forfatternavn']);

	// Forespørgsel til at oprette nyheden i databasen
	$query =
	"INSERT INTO 
		nyheder (nyhed_overskrift, nyhed_indhold, nyhed_forfatternavn) 
	VALUES ('$nyhed_overskrift', '$nyhed_indhold', '$nyhed_forfatternavn')";

	// Send forespørgslen til databasen. Hvis der er fejl i forespørgslen udskrives den sammen med aktuel linje, fil og forespørgsel
	mysqli_query($link, $query) or die( mysqli_error($link) . '<br>Se linje <strong>' . __LINE__ . '</strong> i fil: <strong>' . __FILE__ . '</strong><br><pre><code>' . $query . '</code></pre>' );

	// Vis besked til brugeren om at nyheden blev oprettet
	echo '<p>Nyheden blev oprettet!</p>';
}
?>

	<form method="post">
		<p>
			<label for="overskrift">Overskrift:</label><br>
			<input type="text" name="overskrift" id="overskrift" required>
		</p>

		<p>
			<label for="indhold">Indhold:</label><br>
			<textarea name="indhold" id="indhold" required></textarea>
		</p>

		<p>
			<label for="forfatternavn">Forfatternavn:</label><br>
			<input type="text" name="forfatternavn" id="forfatternavn" required>
		</p>

		<button type="submit" name="submit">Opret nyhed!</button>
	</form>
</body>
</html>
<?php
// Lukker forbindelsen til databasen
mysqli_close($link);