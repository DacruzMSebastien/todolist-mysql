<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=todo;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}



		$sanitize = filter_var($_POST['tache'], FILTER_SANITIZE_STRING);
		$reponse = $bdd->query('SELECT task FROM tasks');
		$donnees = $reponse->fetch();


		if (!empty($sanitize) && isset($sanitize) && $sanitize != $donnees['task']) {
			$bdd->query('INSERT INTO tasks(task, archives) VALUES ("'.$sanitize.'", "false")');
		}

		$archives = $bdd->query('SELECT task FROM tasks WHERE archives = "false"');
		if (isset($_POST['to_archive'])&& isset($_POST['case'])){
				for ($i = 0 ; $i < count($_POST['case']); $i++){
						$bdd->exec('UPDATE tasks SET archives = "true" WHERE task = "'.$_POST['case'][$i].'"');
					}
				}

				if(isset($_POST['clean']) &&  isset($_POST['test'])) {
		        for ($a = 0; $a < count($_POST['test']); $a++) {
		            $bdd->exec('DELETE FROM tasks WHERE task = "'.$_POST['test'][$a].'"');
		        }
		    }

		$tobedone = $bdd->query('SELECT task FROM tasks WHERE archives = "false"');
		$archived = $bdd->query('SELECT task FROM tasks WHERE archives = "true"');


?>


	<!DOCTYPE html>
	<html>

	<head>
		<title>To do list</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	</head>

	<body>
		<div>
			<section>
				<form method="POST">
					<h1>To Do List</h1>
					<input class="text" type="text" name="tache" placeholder="What do you want to do?" maxlength="50" required>
					<input type="submit" name="submit" class="button submitTask">
				</form>
			</section>
			<?php include 'contenu.php'; ?>
		</div>
	</body>

	</html>
