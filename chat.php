<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<title>Minichat en PHP</title>
	</head>
	<body>

		<div class="cadre">
			<h1 class="titre">Chater en toute Sécurité sur www.TheCamelGeek.com </h1>
			<form method="post" action="chat_post.php">

			<div class="form-group">
				<label for="pseudo" class="control-label">Votre Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" class="form-control">
			</div>

			<div class="form-group">
				<label for="message" class="control-label">Message</label>
				<input type="text" name="message" id="message" class="form-control">
			</div>

			<input type="submit" value="Envoyer" class="sendform" />
		</form>

			<div class="cadremessage">
				
			<?php

				$servername = "localhost";
				$dbname = "dbchat";
				$username = "root";
				$password = "";

				/* Connexion a la base dee donnée */
				try{

					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

					/*activation du mode erreur*/
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						/*Affichage des 10 messages recents*/
					$req = $conn->query("SELECT pseudo, message FROM minichat ORDER BY id DESC LIMIT 0, 10");
					while ($donnees = $req->fetch()) {
						echo "<p><strong class=\"pseudocolor\">" .$donnees['pseudo'] .": </strong> ";
						echo $donnees['message'] ."</p>";
					}

				} catch(Exception $e){

					die(" <h3> Erreur :  " .$e->getMessage() ."</h3>");

					}				

			?>

			</div>
		</div>

	</body>
</html>