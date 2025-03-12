<?php
include '../../component/connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données avec les bons noms de champs
    $username = htmlspecialchars($_POST['name']);
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    if ($password === $cpassword) {
        $hashedPassword = sha1($password);

        try {
            // Préparation et exécution de la requête
            $insert_admin = $conn->prepare("INSERT INTO `admin` (name, password) VALUES (?, ?)");
            $insert_admin->execute([$username, $hashedPassword]);

            echo "Admin ajouté avec succès.";
            exit();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            exit();
        }

    } else {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }
}
?>

<link rel="stylesheet" href="../css/modal.css" />
<div class="modal add-admin" id="adminModal">
    <div class="modal-content">
        <h2>Ajouter un Admin</h2>
        <form id="adminForm" method="POST" action="./modal/add-admin.php" data-reload>

            <input class="boite" type="text" name="name" maxlength="20" required placeholder="Pseudo" oninput="this.value = this.value.replace(/\s/g, '')">
            <input class="boite" type="password" name="pass" maxlength="20" required placeholder="Mot de passe" oninput="this.value = this.value.replace(/\s/g, '')">
            <input class="boite" type="password" name="cpass" maxlength="20" required placeholder="Confirmer le mot de passe" oninput="this.value = this.value.replace(/\s/g, '')">

            <div class="accept">
                <button type="submit">Ajouter</button>
                <button type="button" onclick="closeModal()">Annuler</button>
            </div>
        </form>
    </div>
</div>
