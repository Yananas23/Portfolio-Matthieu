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
?>

<link rel="stylesheet" href="../css/modal.css" />
<!-- Fenêtre modale -->
<div class="modal formation" id="formationModal">
    <div class="modal-content form-ft" id="modal">
        <span class="close" id="closeModalBtn">&times;</span>
        <h1 id="title-ft"><?= $title ?></h1>

            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($pid) ?>">
                
                

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
            </form>
    </div>
    
</div>

