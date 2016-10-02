<?php
// Indlæs fil til configuration og oprettelse af forbindelse til databasen.
require 'db_config.php'
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Oversigt nyheder</title>
</head>

<body>
<?php
// Hvis nyhed_id er defineret i URL parametre, har vi klikket på slet og skal slette nyheden fra databasen
if ( isset($_GET['nyhed_id']) )
{
	// Hent værdi af nyhed_id fra URL parametre og brug intval for at sikre det er et tal
	$nyhed_id	= intval($_GET['nyhed_id']);

	// Forespørgsel til at slette nyheden fra databasen der matcher tallet gemt i variablen $nyhed_id
	$query =
	"DELETE FROM 
		nyheder 
	WHERE 
		nyhed_id = $nyhed_id";

	// Send forespørgslen til databasen. Hvis der er fejl i forespørgslen udskrives den sammen med aktuel linje, fil og forespørgsel
	mysqli_query($link, $query) or die( mysqli_error($link) . '<br>Se linje <strong>' . __LINE__ . '</strong> i fil: <strong>' . __FILE__ . '</strong><br><pre><code>' . $query . '</code></pre>' );

	// Vis besked til brugeren om at nyheden blev slettet
	echo '<p>Nyheden blev slettet!</p>';
}

?>
<table width="50%" border="1" cellpadding="5" cellspacing="0">
	<thead>
	<tr>
		<th>Oprettet</th>
		<th>Titel</th>
		<th>Forfatter</th>
		<th></th>
		<th><a href="opret_nyhed.php" title="Opret nyhed">Opret</a></th>
	</tr>
	</thead>

	<tbody>
	<?php
	// Forespørgsel til at hente alle nyheder fra databasen og sortere dem efter dato med nyeste først
	$query 	=
	"SELECT 
		nyhed_id, nyhed_dato, nyhed_overskrift, nyhed_forfatternavn 
	FROM 
		nyheder 
	ORDER BY 
		nyhed_dato DESC";

	// Send forespørgslen til databasen og gem resultat i variablen $result. Hvis der er fejl i forespørgslen udskrives den sammen med aktuel linje, fil og forespørgsel
	$result	= mysqli_query($link, $query) or die( mysqli_error($link) . '<br>Se linje <strong>' . __LINE__ . '</strong> i fil: <strong>' . __FILE__ . '</strong><br><pre><code>' . $query . '</code></pre>' );

	// Gem resultat fra databasen som et assoc array i variablen $row (hvor databasens kolonnenavne bruges som keys) og brug while-løkke til at løbe igennem alle rækker i databasen
	while ( $row = mysqli_fetch_assoc($result) )
	{
		?>
		<tr>
			<td><?php echo $row['nyhed_dato'] // Udskriv dato fra databasen ?></td>
			<td><?php echo $row['nyhed_overskrift'] // Udskriv overskrift fra databasen ?></td>
			<td><?php echo $row['nyhed_forfatternavn'] // Udskriv forfatternavn fra databasen ?></td>
			<td><a href="rediger_nyhed.php?nyhed_id=<?php echo $row['nyhed_id'] // Udskriv id fra databasen ?>" title="Rediger nyhed">Rediger</a></td>
			<td><a href="index.php?nyhed_id=<?php echo $row['nyhed_id'] // Udskriv id fra databasen ?>" onClick="return confirm('Er du sikker på du vil slette nyheden?')" title="Slet nyhed">Slet</a></td>
		</tr>
		<?php
	}
	?>
	</tbody>

</table>

</body>
</html>
<?php
// Lukker forbindelsen til databasen
mysqli_close($link);