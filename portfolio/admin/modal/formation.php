<?php
include '../../component/connect.php';
session_start();

    $pid = $_SESSION['pid'];

    $ft = [
        'date_debut' => '',
        'date_fin' => '',
        'ville' => '',
        'etablissement' => '',
        'site' => '',
        'diplome' => '',
        'description' => '',
    ];
    $debut = [
        'mois' => '',
        'annee' => '',
        'complete' => '',
        'aujourdhui' => 0,
    ];
    $fin = [
        'mois' => '',
        'annee' => '',
        'complete' => '',
        'aujourdhui' => 0,
    ];
    $title = "Ajouter une formation";

    // Si ID > 0 on va chercher les données
    if ($pid > 0) {
        $title = "Modifier une formation";

        $select_ft = $conn->prepare("SELECT * FROM formations WHERE id = ?");
        $select_ft->execute([$pid]);
        $ft = $select_ft->fetch(PDO::FETCH_ASSOC);

        if (!$ft) {
            die("Formation introuvable.");
        }
        
        $select_debut = $conn->prepare("SELECT * FROM `date` WHERE id = ?");
        $select_debut->execute([$ft['debut']]);
        $debut = $select_debut->fetch(PDO::FETCH_ASSOC);

        $select_fin = $conn->prepare("SELECT * FROM `date` WHERE id = ?");
        $select_fin->execute([$ft['fin']]);
        $fin = $select_fin->fetch(PDO::FETCH_ASSOC);
    }

    // Tableau de conversion nom de mois → numéro (fr)
    $moisNoms = [
        'janvier' => '01',
        'février' => '02',
        'mars' => '03',
        'avril' => '04',
        'mai' => '05',
        'juin' => '06',
        'juillet' => '07',
        'août' => '08',
        'septembre' => '09',
        'octobre' => '10',
        'novembre' => '11',
        'décembre' => '12'
    ];

    // (Optionnel) Conversion inverse pour la sauvegarde
    $moisNumeriquesVersNoms = array_flip($moisNoms);

function exportDate($moisNumeriquesVersNoms, $moisAnnee, $jour = '') {
        $date = [
            "mois" => null, 
            "annee" => null, 
            "complete" => null];
        $annee = substr($moisAnnee, 0, 4);
        $mois = substr($moisAnnee, 5, 2);
        if (!$jour) {
            $moisNom = strtoupper($moisNumeriquesVersNoms[$mois]);
            $date["mois"] = $moisNom;
            $date["annee"] = $annee;
            return $date;
        }
        $jour = str_pad($jour, 2, "0", STR_PAD_LEFT);
        $complete = $annee . "-" . $mois . "-". $jour;
        $date["complete"] = $complete;
        return $date;
    }

    function findOrCreateDateId(PDO $conn, $date) {
    // 1. Chercher si l'entrée existe
    if (isset($date['mois'])){
        $stmt = $conn->prepare("SELECT id FROM `date` WHERE mois = ? AND annee = ?");
        $stmt->execute([$date['mois'], $date['annee']]);
    } else {
        $stmt = $conn->prepare("SELECT id FROM `date` WHERE complete = ?");
        $stmt->execute([$date['complete']]);
    }    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if ($result) {
        // L'entrée existe, on retourne l'ID
        return (int)$result['id'];
    }

    // 2. Sinon, l'insérer
    $insert = $conn->prepare("INSERT INTO `date` (`mois`, `annee`, `complete`, `aujourdhui`) VALUES (?, ?, ?, 0)");
    $insert->execute([$date['mois'], $date['annee'], $date['complete']]);

    // 3. Récupérer l'ID de l'entrée insérée
    return (int)$conn->lastInsertId();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['type'] ?? '';
    try {
        if ($action === 'supprimer' && $pid > 0) {
            $stmt = $conn->prepare("DELETE FROM formations WHERE id = ?");
            $stmt->execute([$pid]);
            echo "Formation supprimée avec succès.";
            exit();
        }
    
        $jourDebut = $_POST['date_debut_jour'];
        $moisAnneeDebut = $_POST['date_debut_mois'];
        if (!$jourDebut) {
            $dateDebut = exportDate($moisNumeriquesVersNoms, $moisAnneeDebut);
        } else {
            $dateDebut = exportDate($moisNumeriquesVersNoms, $moisAnneeDebut, $jourDebut);
        }
        $dateDebutId = findOrCreateDateId($conn, $dateDebut);

        
        $aujourdhui = $_POST['encore_en_poste'];
        if ($aujourdhui === '') {
            $jourFin = $_POST['date_fin_jour'];
            $moisAnneeFin = $_POST['date_fin_mois'];
            if (!$jourFin) {
                $dateFin = exportDate($moisNumeriquesVersNoms, $moisAnneeFin);
            } else {
                $dateFin = exportDate($moisNumeriquesVersNoms, $moisAnneeFin, $jourFin);
            }
            $dateFinId = findOrCreateDateId($conn, $dateFin);
        } else {
            $dateFinId = 1;
        }
    
        $etablissement = $_POST['etablissement'];
        $site = $_POST['site'];
        $ville = $_POST['ville'];
        $diplome = $_POST['diplome'];
        $description = $_POST['description'];
    
        if ($action === 'modifier' && $pid > 0) {
            $stmt = $conn->prepare("UPDATE formations SET `etablissement` = ?, `site` = ?, `ville` = ?, `diplome` = ?, `debut` = ?, `fin` = ?, `description` = ? WHERE id = ?");
            $stmt->execute([$etablissement, $site, $ville, $diplome, $dateDebutId, $dateFinId, $description, $pid]);
            echo "Formation mise à jour avec succès.";
        } elseif ($action === 'modifier') {
            $stmt = $conn->prepare("INSERT INTO formations (`etablissement`, `site`, `ville`, `diplome`, `debut`, `fin`, `description`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$etablissement, $site, $ville, $diplome, $dateDebutId, $dateFinId, $description]);
            echo "Formation ajoutée avec succès.";
        } else {
            echo "Action non reconnue ou ID manquant.";
        }
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        exit();
    }
}
?>

<link rel="stylesheet" href="../css/modal.css" />
<!-- Fenêtre modale -->
<div class="modal formation" id="formationModal">
    <div class="modal-content form-ft" id="modal">
        <span class="close" id="closeModalBtn">&times;</span>
        <h1 id="title-ft"><?= $title ?></h1>

            <form id="ft-form" method="POST" action="./modal/formation.php" data-reload>
                <input type="hidden" name="type" id="type" value="modifier">
                

                <div class="date-row">
                    <!-- Date de début -->
                    <label>Date de début :</label>
                    <?php
                    if (!empty($debut['complete'])) {
                        $anneeDebut = substr($debut['complete'], 0, 4);
                        $moisDebut = substr($debut['complete'], 5, 2);
                        $jourDebut = intval(substr($debut['complete'], 8, 2));
                    } else {
                        $anneeDebut = $debut['annee'] ?? '';
                        $moisDebutNom = strtolower($debut['mois'] ?? '');
                        $moisDebut = $moisNoms[$moisDebutNom] ?? '';
                        $jourDebut = '';
                    }

                    $valMoisDebut = ($anneeDebut && $moisDebut) ? htmlspecialchars($anneeDebut . '-' . $moisDebut) : '';
                    ?>
                    <input type="month" name="date_debut_mois" id="date_debut_mois" value="<?= $valMoisDebut ?>">

                    <select name="date_debut_jour" id="date_debut_jour">
                        <option value="">-- Aucun jour --</option>
                        <?php
                        if ($moisDebut && $anneeDebut) {
                            $nbJoursDebut = cal_days_in_month(CAL_GREGORIAN, intval($moisDebut), intval($anneeDebut));
                            for ($i = 1; $i <= $nbJoursDebut; $i++) {
                                $selected = ($i === intval($jourDebut)) ? 'selected' : '';
                                echo "<option value=\"$i\" $selected>$i</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="date-row">
                    <!-- Date de fin -->
                    <label>Date de fin :</label>
                    <?php
                    if (!empty($fin['complete'])) {
                        $anneeFin = substr($fin['complete'], 0, 4);
                        $moisFin = substr($fin['complete'], 5, 2);
                        $jourFin = intval(substr($fin['complete'], 8, 2));
                    } else {
                        $anneeFin = $fin['annee'] ?? '';
                        $moisFinNom = strtolower($fin['mois'] ?? '');
                        $moisFin = $moisNoms[$moisFinNom] ?? '';
                        $jourFin = '';
                    }

                    $valMoisFin = ($anneeFin && $moisFin) ? htmlspecialchars($anneeFin . '-' . $moisFin) : '';
                    ?>
                    <input type="month" name="date_fin_mois" id="date_fin_mois" value="<?= $valMoisFin ?>" <?= $fin['aujourdhui'] ? 'disabled' : '' ?>>

                    <select name="date_fin_jour" id="date_fin_jour" <?= $fin['aujourdhui'] ? 'disabled' : '' ?>>
                        <option value="">-- Aucun jour --</option>
                        <?php
                        if ($moisFin && $anneeFin) {
                            $nbJoursFin = cal_days_in_month(CAL_GREGORIAN, intval($moisFin), intval($anneeFin));
                            for ($i = 1; $i <= $nbJoursFin; $i++) {
                                $selected = ($i === intval($jourFin)) ? 'selected' : '';
                                echo "<option value=\"$i\" $selected>$i</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="checkbox-row">
                    <label>
                        <input type="checkbox" name="encore_en_poste" id="encore_en_poste" value="1" <?= $fin['aujourdhui'] ? 'checked' : '' ?>>
                        J'étudie ici actuellement
                    </label>
                </div>



                <div class="info-grid">
                    <!-- Lieu -->
                    <div>
                        <label>Lieu :</label>
                        <input type="text" name="ville" value="<?= htmlspecialchars($ft['ville']) ?>" required>
                    </div>

                    <!-- Poste -->
                    <div>
                        <label>Diplome :</label>
                        <input type="text" name="diplome" value="<?= htmlspecialchars($ft['diplome']) ?>" required>
                    </div>

                    <!-- Entreprise -->
                    <div>
                        <label>Etablissement :</label>
                        <input type="text" name="etablissement" value="<?= htmlspecialchars($ft['etablissement']) ?>" required>
                    </div>
                    
                    <!-- Site web -->
                    <div>
                        <label>Site web :</label>
                        <input type="url" name="site" value="<?= htmlspecialchars($ft['site']) ?>">
                    </div>

                    <!-- Description - Full width -->
                    <div class="full-width">
                        <label>Description :</label>
                        <textarea name="description" rows="10" required><?= htmlspecialchars($ft['description']) ?></textarea>
                    </div>
                </div>

                <button id="btn-mod" class="modaleBtn" name="formation" type="submit">Enregistrer</button>
                <?php if ($pid > 0): ?>
                    <button id="btn-del" class="modaleBtn" name="formation" type="submit" onclick="document.getElementById('type').value='supprimer';">Supprimer</button>
                <?php endif; ?>
            </form>

    </div>
</div>
