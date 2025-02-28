<?php

include '../component/connect.php';

session_start();

$message = ''; // Initialiser la variable message
if(isset($_POST['submit'])) {
   $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); // Échapper les caractères spéciaux
   $pass = sha1($_POST['pass']); // Hash du mot de passe

   // Connexion à la base de données
   $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $select_admin->execute([$name, $pass]);
   
   if($select_admin->rowCount() > 0) {
      $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
      $_SESSION['admin_id'] = $fetch_admin_id['ID'];
      header('location:admin.php');
   } else {
      $message = 'Nom d\'utilisateur ou mot de passe incorrect';
   }
}
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/style.css" />
      <link rel="stylesheet" href="../css/admin.css" />
      <link rel="icon" href="../images/iconeM.ico" type="image/x-icon"/>
      <title>Connexion</title>
   </head>
   <body>

      <section class="form-container">

         <form class="form-login" action="" method="POST">
            <h3>Se connecter</h3>
            <?php if (!empty($message) && $message !== '') { ?>
               <div class="error-message">
                  <?= $message ?>
               </div>
            <?php } ?>
            <input type="text" name="name" maxlength="20" required placeholder="nom d'utilisateur" class="boite" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="pass" required placeholder="mot de passe" class="boite" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="connexion" name="submit" class="btn" id="connect">
            <button class="btn" id="acceuil" onclick="redirectToPage()">Retour à l'acceuil</button>
         </form>
      </section>
      <script>
         function redirectToPage() {
            window.location.href = '../index.php'; // Remplacez par l'URL de la page vers laquelle vous voulez rediriger
         }
      </script>
   </body>
</html>