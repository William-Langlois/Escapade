<?php
	require 'config.php';

	if(isset($_POST['inscription'])) {
		$errMsg = '';

		// Get data from FROM
		$user_prenom = $_POST['prenom'];
		$user_nom = $_POST['nom'];
		$user_password = $_POST['password'];
		$user_ville = $_POST['ville'];
		$user_email = $_POST['email'];

		if($user_prenom == '')
			$errMsg = 'Entrer votre prenom';
		if($user_nom == '')
			$errMsg = 'Entrer votre nom';
		if($user_password == '')
			$errMsg = 'Enter votre mot de passe';
			if($user_ville == '')
			$errMsg = 'Enter votre ville';
		if($user_email == '')
			$errMsg = 'Entrez votre email';

		if($errMsg == ''){
            try {
                $stmt = $connect->prepare('INSERT INTO pdo (USER_PRENOM, USER_NOM, USER_PASSWORD, USER_VILLE, USER_EMAIL) VALUES (:prenom, :nom, :password, :ville, :email)');
                $stmt->execute(array(
					':prenom' => $user_prenom,
					':nom' => $user_nom,
					':password' => $user_password,
					':ville' => $user_ville,
					':email' => $user_email,
					));
				header('Location: inscription.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Inscription reussie. Vous pouvez maintenant vous<a href="connexion.php">connecter</a>';
	}
?>
