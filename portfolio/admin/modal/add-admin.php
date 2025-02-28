<?php
include '../../component/connect.php';

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

        } catch (PDOException $e) {
            echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
        }

    } else {
        echo "<p style='color: red;'>Les mots de passe ne correspondent pas.</p>";
    }
}
?>

<div class="modal" id="adminModal">
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

<style>
    h2 {
        margin-bottom: 10px ;
    }

    .modal {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: #dab200;
        border: solid 1px #181818;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 400px;
        margin: auto;
    }

    form .boite {
        display: flex;
        flex-direction: column;
    }

    form input {
        margin: 5px;
        
    }

    .accept{
        display: flex;
        flex-direction: row;
    }

    .accept button {
        margin: 10px;
        margin-bottom: 0;
    }
</style>