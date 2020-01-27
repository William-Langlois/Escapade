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
			$errMsg = 'Enter a secret pin number';

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

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <title>Inscription</title>
        <link rel="stylesheet" href="inscription.css" media="screen" type="text/css" />
    </head>
<body>

    <div id="container">
    <?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
            
            <form action="inscription.php" method="POST">
              
                <h1>Inscription</h1>
                
		    <label><b>Nom<b></label>
            <input type="text" placeholder="Entre votre nom" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom'] ?>" autocomplete="off" class="box">
            
            <label><b>Prenom<b></label>
            <input type="text" placeholder="Entrer votre prenom" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom'] ?>" autocomplete="off" class="box">
            
            <label><b>Ville<b></label>
            <input type="text" placeholder="Entrer votre ville de résidence" name="ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville'] ?>" autocomplete="off" class="box">
            
            <label><b>Email<b></label>
		    <input type="email" placeholder="Entrer l'adresse email" name="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" autocomplete="off" class="box">

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            
            <label><b>Confirmer Mot de passe</b></label>
            <input type="password" placeholder="Confirmer le mot de passe" name="password1" required>

            <input type="submit" id='submit' name='reg_user' value="S'inscrire" >
            <p>Déja membre ? <a href="connexion.php">Se connecter</a></p>
                
            </form>
    </div>
    </body>
</html>