<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter un Admin</title>
    <meta charset="UTF-8">
    <script>
        function openModal() {
            document.getElementById('adminModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('adminModal').style.display = 'none';
        }
    </script>
    <style>
        .modal {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            display: none;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

    <button onclick="openModal()">Ajouter Admin</button>

    <div id="adminModal" class="modal">
        <div class="modal-content">
            <h2>Ajouter un Admin</h2>
            <form method="POST" action="">
                <label for="username">Username :</label>
                <input type="text" id="username" name="username" required><br><br>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required><br><br>

                <button type="submit">Valider</button>
                <button type="button" onclick="closeModal()">Annuler</button>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = htmlspecialchars($_POST['username']);
        $password = sha1($_POST['password']);

        echo "<p>Admin ajouté : $username</p>";
        echo "<p>Mot de passe haché : $password</p>";

    }
    ?>

</body>
</html>
