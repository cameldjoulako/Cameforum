<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Mini chat</title>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
	</head>
	<body>

		<?php  
	$servername = "localhost";
	$dbname = "dbchat";
	$username = "root";
	$password = "";

	/* Connexion à la base e donnée */
	 try {

	 	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	 	/* Activation du mode erreur PDO*/
	 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	
	 	if(isset($_POST['pseudo']) && $_POST['pseudo']!=""){

	 		if(isset($_POST['message']) && $_POST['message']!=""){

	 			$req = $conn->prepare("INSERT INTO minichat(pseudo, message)
	 									VALUES(:pseudo, :message)");
	 			$req->bindparam(':pseudo', $pseudo);
	 			$req->bindparam(':message', $message);
	 			$pseudo =htmlspecialchars($_POST['pseudo']);
	 			$message = htmlspecialchars($_POST['message']);
	 			$req->execute();

	 			$req->closeCursor();

	 			header("location: chat.php");
				
	 		
	 		}	else echo "Remplisser tous les champs S.V.P";

	 	}	else echo "Remplisser tous les champs S.V.P"; 	
	 	
	 } catch (Exception $e) {
	 	die(" <h3> Erreur :  " .$e->getMessage() ."</h3>");
	 	
	 }
?>

	</body>
</html>