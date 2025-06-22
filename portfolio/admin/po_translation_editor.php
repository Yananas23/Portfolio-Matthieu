<?php
$dossier_locales = '../locales/';
$fichier_template = '../locales/messages.pot';

// Langues disponibles/configurables (sans le français)
$langues_disponibles = [
    'en_US' => '🇺🇸 Anglais (États-Unis)',
    'es_ES' => '🇪🇸 Espagnol (Espagne)',
    'de_DE' => '🇩🇪 Allemand (Allemagne)',
    'pt_BR' => '🇧🇷 Portugais (Brésil)',
    'pt_PT' => '🇵🇹 Portugais (Portugal)',
    'it_IT' => '🇮🇹 Italien (Italie)',
    'ja_JP' => '🇯🇵 Japonais (Japon)',
    'zh_CN' => '🇨🇳 Chinois (Simplifié)',
    'zh_TW' => '🇹🇼 Chinois (Traditionnel)',
    'ru_RU' => '🇷🇺 Russe (Russie)',
    'ar_SA' => '🇸🇦 Arabe (Arabie Saoudite)',
    'ko_KR' => '🇰🇷 Coréen (Corée du Sud)',
    'nl_NL' => '🇳🇱 Néerlandais (Pays-Bas)',
    'sv_SE' => '🇸🇪 Suédois (Suède)',
    'pl_PL' => '🇵🇱 Polonais (Pologne)',
    'tr_TR' => '🇹🇷 Turc (Turquie)'
];

// Fonction pour lister les langues disponibles (dossiers existants)
function lister_langues_existantes($dossier_locales) {
    $langues = [];
    if (is_dir($dossier_locales)) {
        foreach (scandir($dossier_locales) as $item) {
            $chemin_langue = $dossier_locales . $item . '/LC_MESSAGES/';
            if ($item !== '.' && $item !== '..' && is_dir($chemin_langue)) {
                $fichier_po = $chemin_langue . 'messages.po';
                if (file_exists($fichier_po)) {
                    $langues[$item] = $fichier_po;
                }
            }
        }
    }
    return $langues;
}

// Fonction pour créer la structure de dossiers pour une langue
function creer_structure_langue($dossier_locales, $code_langue) {
    $chemin_complet = $dossier_locales . $code_langue . '/LC_MESSAGES/';
    if (!is_dir($chemin_complet)) {
        return mkdir($chemin_complet, 0755, true);
    }
    return true;
}

// Fonction pour parser un fichier .po/.pot
function parse_po_file($filepath) {
    $translations = [];
    if (!file_exists($filepath)) return $translations;
    
    $content = file_get_contents($filepath);
    $lines = explode("\n", $content);
    
    $current_msgid = '';
    $current_msgstr = '';
    $in_msgid = false;
    $in_msgstr = false;
    $header_passed = false;
    
    foreach ($lines as $line) {
        $line = trim($line);
        
        if (empty($line)) {
            if (!empty($current_msgid) && $header_passed) {
                $translations[] = [
                    'msgid' => $current_msgid,
                    'msgstr' => $current_msgstr
                ];
            }
            $current_msgid = '';
            $current_msgstr = '';
            $in_msgid = false;
            $in_msgstr = false;
            continue;
        }
        
        if (strpos($line, 'msgid ') === 0) {
            $current_msgid = substr($line, 7, -1);
            $in_msgid = true;
            $in_msgstr = false;
            if (!empty($current_msgid)) $header_passed = true;
        } elseif (strpos($line, 'msgstr ') === 0) {
            $current_msgstr = substr($line, 8, -1);
            $in_msgid = false;
            $in_msgstr = true;
        } elseif (isset($line[0]) && $line[0] === '"' && substr($line, -1) === '"') {
            $text = substr($line, 1, -1);
            if ($in_msgid) {
                $current_msgid .= $text;
            } elseif ($in_msgstr) {
                $current_msgstr .= $text;
            }
        }
    }
    
    if (!empty($current_msgid) && $header_passed) {
        $translations[] = [
            'msgid' => $current_msgid,
            'msgstr' => $current_msgstr
        ];
    }
    
    return $translations;
}

// Fonction pour générer le fichier .po avec header de langue
function generate_po_file($translations, $filepath, $langue_code = '') {
    $content = "# Fichier de traductions pour $langue_code\n";
    $content .= "msgid \"\"\n";
    $content .= "msgstr \"\"\n";
    $content .= "\"Content-Type: text/plain; charset=UTF-8\\n\"\n";
    $content .= "\"Content-Transfer-Encoding: 8bit\\n\"\n";
    if (!empty($langue_code)) {
        $content .= "\"Language: $langue_code\\n\"\n";
    }
    $content .= "\"MIME-Version: 1.0\\n\"\n";
    $content .= "\n";
    
    foreach ($translations as $translation) {
        // Échappement correct pour les fichiers PO
        $msgid = $translation['msgid'];
        $msgstr = $translation['msgstr'];
        
        $content .= "msgid \"$msgid\"\n";
        $content .= "msgstr \"$msgstr\"\n\n";
    }
    
    return file_put_contents($filepath, $content);
}

// Traitement création nouveau fichier
if (isset($_POST['action']) && $_POST['action'] === 'create_new') {
    $nouvelle_langue = $_POST['nouvelle_langue'];
    
    if (!empty($nouvelle_langue)) {
        // Créer la structure de dossiers
        if (creer_structure_langue($dossier_locales, $nouvelle_langue)) {
            $nouveau_fichier = $dossier_locales . $nouvelle_langue . '/LC_MESSAGES/messages.po';
            $template_translations = parse_po_file($fichier_template);
            
            // Vider les traductions pour le nouveau fichier
            foreach ($template_translations as &$translation) {
                $translation['msgstr'] = '';
            }
            
            if (generate_po_file($template_translations, $nouveau_fichier, $nouvelle_langue)) {
                $message = "✅ Nouveau fichier de traduction créé : $nouvelle_langue/LC_MESSAGES/messages.po";
            } else {
                $message = "❌ Erreur lors de la création du fichier";
            }
        } else {
            $message = "❌ Erreur lors de la création du dossier";
        }
    }
}

// Traitement sauvegarde traductions
if (isset($_POST['action']) && $_POST['action'] === 'save_translations') {
    $langue_code = $_POST['langue_code'];
    $fichier_po = $dossier_locales . $langue_code . '/LC_MESSAGES/messages.po';
    
    // Récupérer TOUTES les traductions existantes pour ne pas perdre celles non affichées par le filtre
    $toutes_translations_existantes = [];
    if (file_exists($fichier_po)) {
        $toutes_translations_existantes = parse_po_file($fichier_po);
    }
    
    // Créer un index des traductions par msgid pour faciliter la mise à jour
    $translations_par_msgid = [];
    foreach ($toutes_translations_existantes as $translation) {
        $translations_par_msgid[$translation['msgid']] = $translation;
    }
    
    // D'abord traiter les traductions du formulaire (ajouts/modifications)
    if (isset($_POST['translations'])) {
        foreach ($_POST['translations'] as $index => $data) {
            if (!empty($data['msgid'])) {
                // Mettre à jour ou ajouter la traduction (la déduplication se fait automatiquement par l'index msgid)
                $translations_par_msgid[$data['msgid']] = [
                    'msgid' => $data['msgid'],
                    'msgstr' => $data['msgstr'] ?? ''
                ];
            }
        }
    }
    
    // Ensuite traiter les suppressions
    if (isset($_POST['delete_translations'])) {
        foreach ($_POST['delete_translations'] as $msgid_to_delete) {
            unset($translations_par_msgid[$msgid_to_delete]);
        }
    }
    
    // Convertir le tableau associatif en tableau indexé
    $translations_finales = array_values($translations_par_msgid);
    
    if (generate_po_file($translations_finales, $fichier_po, $langue_code)) {
        $message = "✅ Traductions sauvegardées pour $langue_code";
    } else {
        $message = "❌ Erreur lors de la sauvegarde";
    }
}

// Récupération des paramètres
$langue_selectionnee = $_GET['langue'] ?? $_POST['langue_selectionnee'] ?? '';
$filtre = $_GET['filtre'] ?? '';
$afficher_template = isset($_GET['template']) || (empty($langue_selectionnee) && file_exists($fichier_template));

$translations = [];
$fichier_po_actuel = '';
$is_template = false;

// Déterminer quel fichier afficher
if ($afficher_template && file_exists($fichier_template)) {
    $translations = parse_po_file($fichier_template);
    $fichier_po_actuel = $fichier_template;
    $is_template = true;
    // Pour le template, on simule des msgstr vides
    foreach ($translations as &$translation) {
        $translation['msgstr'] = '';
    }
} elseif (!empty($langue_selectionnee)) {
    $fichier_po_actuel = $dossier_locales . $langue_selectionnee . '/LC_MESSAGES/messages.po';
    if (file_exists($fichier_po_actuel)) {
        $translations = parse_po_file($fichier_po_actuel);
    }
}

// Appliquer le filtre si spécifié
$translations_filtrees = $translations;
if (!empty($filtre) && !empty($translations)) {
    switch ($filtre) {
        case 'traduites':
            $translations_filtrees = array_filter($translations, fn($t) => !empty($t['msgstr']));
            break;
        case 'manquantes':
            $translations_filtrees = array_filter($translations, fn($t) => empty($t['msgstr']));
            break;
    }
}

$langues_existantes = lister_langues_existantes($dossier_locales);
$template_existe = file_exists($fichier_template);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestionnaire de traductions gettext</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .message { padding: 15px; margin: 15px 0; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .warning { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }
        
        .controls { 
            background: #f8f9fa; 
            padding: 20px; 
            border-radius: 8px; 
            margin-bottom: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .control-section {
            background: white;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        
        .control-section h3 {
            margin-top: 0;
            color: #495057;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        select, input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary { background: #007bff; color: white; }
        .btn-success { background: #28a745; color: white; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-info { background: #17a2b8; color: white; }
        .btn-warning { background: #ffc107; color: #212529; }
        
        .translation-item { 
            border: 1px solid #ddd; 
            margin: 15px 0; 
            padding: 15px; 
            border-radius: 5px; 
            background: #fafafa; 
        }
        
        .msgid-label { font-weight: bold; color: #0066cc; margin-bottom: 5px; }
        .msgstr-label { font-weight: bold; color: #cc6600; margin-bottom: 5px; margin-top: 10px; }
        
        .msgid-text { 
            background: #e3f2fd; 
            padding: 8px; 
            border-radius: 4px; 
            font-family: monospace; 
            white-space: pre-wrap;
            border-left: 4px solid #2196f3;
            word-break: break-word;
        }
        
        .msgstr-input { 
            width: 100%; 
            min-height: 60px; 
            padding: 8px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            font-family: Arial, sans-serif;
            resize: vertical;
            box-sizing: border-box;
        }
        
        .stats { 
            background: #e9ecef; 
            padding: 15px; 
            border-radius: 5px; 
            margin-bottom: 20px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .stat-item { 
            display: flex; 
            align-items: center; 
            gap: 5px; 
        }
        
        .stat-clickable {
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.2s;
        }
        
        .stat-clickable:hover {
            background-color: #007bff;
            color: white;
        }
        
        .stat-active {
            background-color: #007bff;
            color: white;
        }
        
        .buttons-section { 
            text-align: center; 
            margin: 30px 0; 
            padding: 20px; 
            background: #f8f9fa; 
            border-radius: 5px; 
        }
        
        .file-info {
            background: #e7f3ff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border-left: 4px solid #007bff;
        }
        
        .template-info {
            background: #fff3e0;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border-left: 4px solid #ff9800;
        }
        
        .template-status {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            background: #f8f9fa;
            border-radius: 8px;
            margin: 20px 0;
        }
        
        .filter-info {
            background: #d1ecf1;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border-left: 4px solid #17a2b8;
        }
        
        .navigation-buttons {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .translation-item { 
            border: 1px solid #ddd; 
            margin: 15px 0; 
            padding: 15px; 
            border-radius: 5px; 
            background: #fafafa;
            position: relative; /* Ajouté pour positionner le bouton */
        }
        
        /* Nouveau style pour le bouton de suppression */
        .btn-delete {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 8px;
            cursor: pointer;
            font-size: 12px;
            font-weight: bold;
        }
        
        .btn-delete:hover {
            background: #c82333;
        }
        
        /* Animation pour masquer l'élément */
        .translation-item.removing {
            opacity: 0.5;
            transform: scale(0.98);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="margin-bottom: 20px;">
            <a href="./admin.php" class="btn btn-secondary" style="margin-bottom: 15px;">
                ← Retour sur le portfolio
            </a>
        </div>
        <h1>🌐 Gestionnaire de traductions gettext</h1>
        
        <?php if (isset($message)): ?>
            <div class="message <?= strpos($message, '✅') !== false ? 'success' : 'error' ?>"><?= $message ?></div>
        <?php endif; ?>
        
        <?php if (!$template_existe): ?>
            <div class="message warning">
                ⚠️ Fichier template non trouvé : <?= $fichier_template ?><br>
                Créez ce fichier pour pouvoir générer de nouvelles traductions.
            </div>
        <?php endif; ?>
        
        <div class="controls">
            <!-- Sélection de langue existante -->
            <div class="control-section">
                <h3>📂 Modifier une traduction</h3>
                <?php if (!empty($langues_existantes)): ?>
                    <form method="GET">
                        <select name="langue" onchange="this.form.submit()">
                            <option value="">-- Choisir une langue --</option>
                            <?php foreach ($langues_existantes as $code => $fichier): ?>
                                <option value="<?= $code ?>" <?= $code === $langue_selectionnee ? 'selected' : '' ?>>
                                    <?= isset($langues_disponibles[$code]) ? $langues_disponibles[$code] : "🏳️ $code" ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                    <small>📁 Structure : locales/[langue]/LC_MESSAGES/messages.po</small>
                <?php else: ?>
                    <p style="color: #6c757d;">Aucune traduction trouvée.</p>
                <?php endif; ?>
            </div>
            
            <!-- Création nouvelle langue -->
            <div class="control-section">
                <h3>➕ Créer une nouvelle langue</h3>
                <?php if ($template_existe): ?>
                    <form method="POST">
                        <input type="hidden" name="action" value="create_new">
                        
                        <label>Nouvelle langue :</label>
                        <select name="nouvelle_langue" required>
                            <option value="">-- Choisir la langue --</option>
                            <?php foreach ($langues_disponibles as $code => $nom): ?>
                                <?php if (!isset($langues_existantes[$code])): ?>
                                    <option value="<?= $code ?>"><?= $nom ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        
                        <button type="submit" class="btn btn-success">🆕 Créer depuis le template</button>
                    </form>
                    <small>📋 Template : <?= basename($fichier_template) ?></small>
                <?php else: ?>
                    <p style="color: #dc3545;">Template requis pour créer de nouvelles langues.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Boutons de navigation -->
        <div class="navigation-buttons">
            <?php if ($template_existe): ?>
                <a href="?template=1" class="btn <?= $is_template ? 'btn-warning' : 'btn-secondary' ?>">
                    📋 Voir le template
                </a>
            <?php endif; ?>
            
            <?php if (!empty($langue_selectionnee)): ?>
                <a href="?langue=<?= $langue_selectionnee ?>" class="btn <?= !$is_template ? 'btn-primary' : 'btn-secondary' ?>">
                    🔙 Retour à <?= isset($langues_disponibles[$langue_selectionnee]) ? $langues_disponibles[$langue_selectionnee] : $langue_selectionnee ?>
                </a>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($translations)): ?>
            <?php if ($is_template): ?>
                <div class="template-info">
                    <strong>📋 Template :</strong> <?= basename($fichier_template) ?><br>
                    <strong>📝 Description :</strong> Fichier de référence contenant tous les textes à traduire
                </div>
            <?php else: ?>
                <div class="file-info">
                    <strong>📄 Fichier :</strong> locales/<?= $langue_selectionnee ?>/LC_MESSAGES/messages.po<br>
                    <strong>🏷️ Langue :</strong> <?= isset($langues_disponibles[$langue_selectionnee]) ? $langues_disponibles[$langue_selectionnee] : $langue_selectionnee ?>
                </div>
            <?php endif; ?>
            
            <?php if (!$is_template): ?>
                <div class="stats">
                    <div class="stat-item">
                        <strong>📊 Total :</strong> <?= count($translations) ?> chaînes
                    </div>
                    <div class="stat-item stat-clickable <?= $filtre === 'traduites' ? 'stat-active' : '' ?>" 
                         onclick="window.location.href='?langue=<?= $langue_selectionnee ?>&filtre=traduites'">
                        <strong>✅ Traduites :</strong> <?= count(array_filter($translations, fn($t) => !empty($t['msgstr']))) ?>
                    </div>
                    <div class="stat-item stat-clickable <?= $filtre === 'manquantes' ? 'stat-active' : '' ?>" 
                         onclick="window.location.href='?langue=<?= $langue_selectionnee ?>&filtre=manquantes'">
                        <strong>❌ Manquantes :</strong> <?= count(array_filter($translations, fn($t) => empty($t['msgstr']))) ?>
                    </div>
                    <div class="stat-item">
                        <strong>📈 Progression :</strong> <?= count($translations) > 0 ? round((count(array_filter($translations, fn($t) => !empty($t['msgstr']))) / count($translations)) * 100, 1) : 0 ?>%
                    </div>
                    <?php if (!empty($filtre)): ?>
                        <div class="stat-item">
                            <a href="?langue=<?= $langue_selectionnee ?>" class="btn btn-info btn-sm">🔄 Voir tout</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($filtre)): ?>
                <div class="filter-info">
                    <strong>🔍 Filtre actif :</strong> 
                    <?= $filtre === 'traduites' ? 'Chaînes traduites' : 'Chaînes manquantes' ?>
                    (<?= count($translations_filtrees) ?> résultats)
                </div>
            <?php endif; ?>
            
            <?php if ($is_template): ?>
                <!-- Affichage du template (lecture seule) -->
                <?php foreach ($translations_filtrees as $index => $translation): ?>
                    <div class="translation-item">
                        <div class="msgid-label">📝 Texte original :</div>
                        <div class="msgid-text"><?= htmlspecialchars($translation['msgid']) ?></div>
                        <div class="msgstr-label">🌍 Traduction :</div>
                        <div style="padding: 8px; background: #f8f9fa; border-radius: 4px; color: #6c757d; font-style: italic;">
                            (À traduire)
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Formulaire d'édition -->
                <form method="POST">
                    <input type="hidden" name="action" value="save_translations">
                    <input type="hidden" name="langue_code" value="<?= $langue_selectionnee ?>">
                    
                    <?php 
                    foreach ($translations_filtrees as $index_filtre => $translation): 
                        // Trouver l'index réel dans le tableau complet
                        $index_reel = array_search($translation, $translations, true);
                    ?>
                        <div class="translation-item" id="translation-<?= $index_reel ?>">
                            <!-- Bouton de suppression -->
                            <button type="button" class="btn-delete" onclick="deleteTranslation(<?= $index_reel ?>)" title="Supprimer cette traduction">
                                🗑️
                            </button>
                            
                            <div class="msgid-label">📝 Texte original :</div>
                            <div class="msgid-text"><?= htmlspecialchars($translation['msgid']) ?></div>
                            <input type="hidden" name="translations[<?= $index_reel ?>][msgid]" value="<?= htmlspecialchars($translation['msgid']) ?>" id="msgid-<?= $index_reel ?>">
                            
                            <div class="msgstr-label">🌍 Traduction <?= isset($langues_disponibles[$langue_selectionnee]) ? explode(' ', $langues_disponibles[$langue_selectionnee])[1] : $langue_selectionnee ?> :</div>
                            <textarea name="translations[<?= $index_reel ?>][msgstr]" class="msgstr-input" placeholder="Saisir la traduction..." id="msgstr-<?= $index_reel ?>"><?= htmlspecialchars($translation['msgstr']) ?></textarea>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="buttons-section">
                        <button type="submit" class="btn btn-success">💾 Sauvegarder les traductions</button>
                        <a href="?" class="btn btn-secondary">↩️ Retour</a>
                    </div>
                </form>
            <?php endif; ?>
            
        <?php else: ?>
            <div class="empty-state">
                <h3>👆 Sélectionnez une langue à modifier ou créez une nouvelle traduction</h3>
                <p>Utilisez les options ci-dessus pour commencer.</p>
                <?php if ($template_existe): ?>
                    <a href="?template=1" class="btn btn-warning">📋 Voir le template</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div style="margin-top: 30px; padding: 15px; background: #f8f9fa; border-radius: 5px; font-size: 12px; color: #6c757d;">
            <strong>💡 Structure gettext :</strong><br>
            • <code>locales/messages.pot</code> : Template principal<br>
            • <code>locales/[langue]/LC_MESSAGES/messages.po</code> : Fichiers de traduction<br>
            • Compatible avec les outils gettext standard (msgfmt, etc.)
        </div>
    </div>
    
    <script>
        function updateStats() {
            // Compter seulement les éléments visibles (non supprimés)
            const visibleTranslations = document.querySelectorAll('.translation-item:not([style*="display: none"])');
            const totalVisible = visibleTranslations.length;
            
            let translatedCount = 0;
            let missingCount = 0;
            
            visibleTranslations.forEach(item => {
                const textarea = item.querySelector('textarea[name*="[msgstr]"]');
                if (textarea && textarea.value.trim() !== '') {
                    translatedCount++;
                } else {
                    missingCount++;
                }
            });
            
            const progressPercent = totalVisible > 0 ? Math.round((translatedCount / totalVisible) * 100 * 10) / 10 : 0;
            
            // Mettre à jour les éléments d'affichage des stats
            const totalElement = document.querySelector('.stats .stat-item:nth-child(1)');
            const translatedElement = document.querySelector('.stats .stat-item:nth-child(2)');
            const missingElement = document.querySelector('.stats .stat-item:nth-child(3)');
            const progressElement = document.querySelector('.stats .stat-item:nth-child(4)');
            
            if (totalElement) {
                totalElement.innerHTML = '<strong>📊 Total :</strong> ' + totalVisible + ' chaînes';
            }
            if (translatedElement) {
                translatedElement.innerHTML = '<strong>✅ Traduites :</strong> ' + translatedCount;
            }
            if (missingElement) {
                missingElement.innerHTML = '<strong>❌ Manquantes :</strong> ' + missingCount;
            }
            if (progressElement) {
                progressElement.innerHTML = '<strong>📈 Progression :</strong> ' + progressPercent + '%';
            }
        }

        function deleteTranslation(index) {
            const element = document.getElementById('translation-' + index);
            
            if (confirm('Êtes-vous sûr de vouloir supprimer cette traduction ?')) {
                // Animation de suppression
                element.classList.add('removing');
                
                // Suppression après l'animation
                setTimeout(() => {
                    // Récupérer le msgid avant de le vider pour pouvoir le marquer comme supprimé
                    const msgidInput = document.getElementById('msgid-' + index);
                    const msgstrInput = document.getElementById('msgstr-' + index);
                    
                    if (msgidInput && msgidInput.value) {
                        // Créer un champ caché pour marquer cette traduction comme à supprimer
                        const deleteInput = document.createElement('input');
                        deleteInput.type = 'hidden';
                        deleteInput.name = 'delete_translations[]';
                        deleteInput.value = msgidInput.value; // On stocke le msgid à supprimer
                        element.appendChild(deleteInput);
                    }
                    
                    // Vider les champs pour qu'ils ne soient pas traités comme des mises à jour
                    if (msgidInput) msgidInput.value = '';
                    if (msgstrInput) msgstrInput.value = '';
                    
                    // Masquer l'élément
                    element.style.display = 'none';
                    
                    // Mettre à jour les statistiques
                    updateStats();
                }, 300);
            }
        }
    </script>
</body>
</html>