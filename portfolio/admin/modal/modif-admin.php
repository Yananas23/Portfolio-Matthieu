<?php
include '../../component/connect.php';
session_start();

$adminId = $_SESSION['admin_id'];
$admin = $conn->prepare("SELECT * FROM `admin` WHERE ID = ?");
$admin->execute([$adminId]);
$admin = $admin->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_id'])) {
    $adminId = intval($_POST['admin_id']);
    $username = htmlspecialchars($_POST['name']);
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    if ($password === $cpassword) {
        try {
            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $update = $conn->prepare("UPDATE `admin` SET name = ?, password = ? WHERE ID = ?");
                $update->execute([$username, $hashedPassword, $adminId]);
            } else {
                $update = $conn->prepare("UPDATE `admin` SET name = ? WHERE ID = ?");
                $update->execute([$username, $adminId]);
            }

            echo "success"; // ✅ Réponse AJAX
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}
?>


<div class="modal" id="editAdminModal">
    <div class="modal-content">
        <h2>Modifier mon compte</h2>

        <form id="editAdminForm" method="POST" action="./modal/modif-admin.php" data-reload>
            <input type="hidden" name="admin_id" value="<?= $admin['ID']; ?>">

            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($admin['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="pass">Nouveau mot de passe (optionnel) :</label>
                <input type="password" id="pass" name="pass">
            </div>

            <div class="form-group">
                <label for="cpass">Confirmer nouveau le mot de passe :</label>
                <input type="password" id="cpass" name="cpass">
            </div>

            <div class="accept">
                <button type="submit">Enregistrer</button>
                <button type="button" onclick="closeModal()">Annuler</button>
            </div>
        </form>
    </div>
</div>



<style>
    /* Style de la modale */
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
        padding: 20px;
        max-width: 400px;
        width: 100%;
    }

    /* Structure des champs label + input */
    .form-group {
        display: flex;
        flex-direction: column; /* Chaque label + input empilé verticalement */
        margin-bottom: 15px; /* Espacement entre chaque groupe */
    }

    .form-group label {
        font-weight: bold; /* Met en gras le titre (nom de la modif) */
        margin-bottom: 5px; /* Espacement entre le label et l'input */
    }

    .form-group input {
        padding: 8px;
        border: 1px solid #181818;
        border-radius: 5px;
        outline: none;
    }

    /* Boutons */
    .accept{
        display: flex;
        flex-direction: row;
    }

    .accept button {
        margin: 10px;
        margin-bottom: 0;
    }

</style>