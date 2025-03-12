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
                $hashedPassword = sha1($password);
                $update = $conn->prepare("UPDATE `admin` SET name = ?, password = ? WHERE ID = ?");
                $update->execute([$username, $hashedPassword, $adminId]);
            } else {
                $update = $conn->prepare("UPDATE `admin` SET name = ? WHERE ID = ?");
                $update->execute([$username, $adminId]);
            }

            echo "Compte modifier avec succès.";
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
<div class="modal modif-admin" id="editAdminModal">
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
