<?php
// Indlæs fil til configuration og oprettelse af forbindelse til databasen.
require 'db_config.php'
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rediger nyhed</title>
</head>

<body>
	<h1>Rediger nyhed</h1>
	<a href="index.php">Tilbage til oversigt</a>

<?php
// Hent værdi af nyhed_id fra URL parametre og brug intval for at sikre det er et tal
$nyhed_id	= $_GET['nyhed_id'];

// Hvis formularen er sendt, køres dette kode
if ( isset($_POST['submit']) )
{

	// Hent værdier fra formular og escape værdier for at sikre imod SQL injections, når variabel bruges i forespørgsel til databasen
	$nyhed_overskrift		= mysqli_real_escape_string($link, $_POST['overskrift']);
	$nyhed_indhold			= mysqli_real_escape_string($link, $_POST['indhold']);
	$nyhed_forfatternavn	= mysqli_real_escape_string($link, $_POST['forfatternavn']);

	// Forespørgsel til at opdatere nyheden i databasen der matcher tallet gemt i variablen $nyhed_id
	$query =
	"UPDATE 
		nyheder 
	SET 
		nyhed_overskrift = '$nyhed_overskrift', nyhed_indhold = '$nyhed_indhold', nyhed_forfatternavn = '$nyhed_forfatternavn' 
	WHERE 
		nyhed_id = $nyhed_id";

	// Send forespørgslen til databasen. Hvis der er fejl i forespørgslen udskrives den sammen med aktuel linje, fil og forespørgsel
	mysqli_query($link, $query) or die( mysqli_error($link) . '<br>Se linje <strong>' . __LINE__ . '</strong> i fil: <strong>' . __FILE__ . '</strong><br><pre><code>' . $query . '</code></pre>' );

	// Vis besked til brugeren om at nyheden blev opdatéret
	echo '<p>Nyheden blev opdatéret!</p>';
}

// Forespørgsel til at hente nyheden fra databasen, som matcher tal gemt i variablen $nyhed_id
$query =
"SELECT 
	nyhed_overskrift, nyhed_indhold, nyhed_forfatternavn 
FROM 
	nyheder 
WHERE 
	nyhed_id = $nyhed_id";

// Send forespørgslen til databasen. Hvis der er fejl i forespørgslen udskrives den sammen med aktuel linje, fil og forespørgsel
$result = mysqli_query($link, $query) or die( mysqli_error($link) . '<br>Se linje <strong>' . __LINE__ . '</strong> i fil: <strong>' . __FILE__ . '</strong><br><pre><code>' . $query . '</code></pre>' );

// Gem resultat fra databasen som et assoc array i variablen $row (hvor databasens kolonnenavne bruges som keys)
$row = mysqli_fetch_assoc($result)
?>

	<form method="post">
		<p>
			<label for="overskrift">Overskrift:</label><br>
			<input type="text" name="overskrift" id="overskrift" required value="<?php echo $row['nyhed_overskrift'] // Udskriv den aktuelle overskrift fra databasen ?>">
		</p>

		<p>
			<label for="indhold">Indhold:</label><br>
			<textarea name="indhold" id="indhold" required><?php echo $row['nyhed_indhold'] // Udskriv det aktuelle indhold fra databasen ?></textarea>
		</p>

		<p>
			<label for="forfatternavn">Forfatternavn:</label><br>
			<input type="text" name="forfatternavn" id="forfatternavn" required value="<?php echo $row['nyhed_forfatternavn'] // Udskriv det aktuelle forfatternavn fra databasen ?>">
		</p>

		<button type="submit" name="submit">Opdatér nyhed!</button>
	</form>
</body>
</html>
<?php
// Lukker forbindelsen til databasen
mysqli_close($link);