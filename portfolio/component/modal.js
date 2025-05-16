document.querySelectorAll('li.xp').forEach(el => {
        el.addEventListener('click', () => {
            const id = el.id;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../component/set_session.php?id=" + id, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Charger la modale après avoir défini la variable de session
                    loadModal('experience.php');
                    setTimeout(() => {
                        const modal = document.getElementById('modal');
                        if (modal) {
                            modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }, 100);
                    observerModaleEtInit();
                }
            };
            xhr.send();
        });
    });

    // Empêche les clics sur les liens dans .xp de déclencher l'ouverture de la modale
    document.querySelectorAll('.xp:not(.new) a').forEach(a => {
        a.addEventListener('click', e => e.stopPropagation());
    });

    document.querySelectorAll('li.ft').forEach(el => {
        el.addEventListener('click', () => {
            const id = el.id;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../component/set_session.php?id=" + id, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Charger la modale après avoir défini la variable de session
                    loadModal('formation.php');
                    setTimeout(() => {
                        const modal = document.getElementById('modal');
                        if (modal) {
                            modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }, 100);
                    observerModaleEtInit();
                }
            };
            xhr.send();
        });
    });

    // Empêche les clics sur les liens dans .ft de déclencher l'ouverture de la modale
    document.querySelectorAll('.ft:not(.new) a').forEach(a => {
        a.addEventListener('click', e => e.stopPropagation());
    });

    document.querySelectorAll('li.ci').forEach(el => {
        el.addEventListener('click', () => {
            const id = el.id;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../component/set_session.php?id=" + id, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Charger la modale après avoir défini la variable de session
                    loadModal('centreInteret.php');
                    setTimeout(() => {
                        const modal = document.getElementById('modal');
                        if (modal) {
                            modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }, 100);
                    observerModaleEtInit();
                }
            };
            xhr.send();
        });
    });

    // Empêche les clics sur les liens dans .ft de déclencher l'ouverture de la modale
    document.querySelectorAll('.ci:not(.new) a').forEach(a => {
        a.addEventListener('click', e => e.stopPropagation());
    });

    document.querySelectorAll('li.ct').forEach(el => {
        el.addEventListener('click', () => {
            const id = el.id;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../component/set_session.php?id=" + id, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Charger la modale après avoir défini la variable de session
                    loadModal('competence.php');
                    setTimeout(() => {
                        const modal = document.getElementById('modal');
                        if (modal) {
                            modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }, 100);
                    observerModaleEtInit();
                }
            };
            xhr.send();
        });
    });

    // Empêche les clics sur les liens dans .xp de déclencher l'ouverture de la modale
    document.querySelectorAll('.ct:not(.new) a').forEach(a => {
        a.addEventListener('click', e => e.stopPropagation());
    });

    document.querySelectorAll('a.cv-modal').forEach(el => {
        el.addEventListener('click', () => {
            const id = el.id;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../component/set_session.php?id=" + id, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Charger la modale après avoir défini la variable de session
                    loadModal('cv.php');
                    setTimeout(() => {
                        const modal = document.getElementById('modal');
                        if (modal) {
                            modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }, 100);
                    observerModaleEtInit();
                }
            };
            xhr.send();
        });
    });

    function initialiserFormulaireDates() {
        function majJours(selectId, monthInputId) {
            const select = document.getElementById(selectId);
            const monthInput = document.getElementById(monthInputId);
            if (!select || !monthInput) return;

            monthInput.addEventListener("change", () => {
                const [annee, mois] = monthInput.value.split("-");
                if (!annee || !mois) return;

                const nbJours = new Date(annee, mois, 0).getDate();
                const selectedValue = select.value;

                select.innerHTML = '<option value="">-- Aucun jour --</option>';
                for (let i = 1; i <= nbJours; i++) {
                    const option = document.createElement("option");
                    option.value = i;
                    option.textContent = i;
                    if (parseInt(selectedValue) === i) option.selected = true;
                    select.appendChild(option);
                }
            });

            // Initialisation immédiate
            monthInput.dispatchEvent(new Event("change"));
        }

        majJours("date_debut_jour", "date_debut_mois");
        majJours("date_fin_jour", "date_fin_mois");

        const checkbox = document.getElementById("encore_en_poste");
        const moisFin = document.getElementById("date_fin_mois");
        const jourFin = document.getElementById("date_fin_jour");

        if (checkbox && moisFin && jourFin) {
            function toggleFinFields() {
                const disabled = checkbox.checked;
                moisFin.disabled = disabled;
                jourFin.disabled = disabled;
            }

            checkbox.addEventListener("change", toggleFinFields);
            toggleFinFields(); // Initialisation au chargement
        }
    };

    // Fonction qui observe le container et initialise quand le formulaire est chargé
    function observerModaleEtInit() {
        const modalContainer = document.getElementById("modalContainer");
        if (!modalContainer) return;

        const observer = new MutationObserver((mutationsList, observer) => {
            for (const mutation of mutationsList) {
                if (mutation.type === "childList" && mutation.addedNodes.length > 0) {
                    const hasForm = [...mutation.addedNodes].some(node =>
                        node.nodeType === 1 && node.querySelector && node.querySelector("#date_debut_mois")
                    );
                    if (hasForm) {
                        setTimeout(() => {
                            initialiserFormulaireDates();
                            observer.disconnect(); // Stopper après initialisation
                        }, 50);
                        break;
                    }
                }
            }
        });

        observer.observe(modalContainer, { childList: true });
    };

    // Fonctions pour gérer les interactions
    function triggerFileInput(btn) {
        const container = btn.closest('.skill-image-container');
        if (container) {
            const fileInput = container.querySelector('input[type="file"]');
            if (fileInput) {
                fileInput.click();
            } else {
                console.error("Input file introuvable dans le conteneur");
            }
        } else {
            console.error("Conteneur d'image introuvable");
        }
    };

    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Trouver l'image dans le même conteneur que l'input
                const container = input.closest('.skill-image-container');
                if (container) {
                    const img = container.querySelector('img');
                    if (img) {
                        img.src = e.target.result;
                    }
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    };

    function decrementCounter(btn) {
        const input = btn.nextElementSibling;
        const currentValue = parseInt(input.value);
        if (currentValue > 1) {
            input.value = currentValue - 1;
        }
    };

    function incrementCounter(btn) {
        const input = btn.previousElementSibling;
        const currentValue = parseInt(input.value);
        if (currentValue < 10) {
            input.value = currentValue + 1;
        }
    };

    function removeSkill(skillId, skillName) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette compétence ?")) {
            // Envoi de la requête AJAX pour supprimer la compétence
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../component/delete-skill.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert("Compétence supprimée avec succès !");
                    location.reload(); // Actualise la page pour mettre à jour la liste
                } else {
                    alert("Erreur lors de la suppression de la compétence.");
                }
            };

            xhr.send("id=" + skillId + "&skill=" + skillName);
        }
    }

    // Fonction pour ajouter une nouvelle compétence (template)
    document.addEventListener('click', function(event) {
        const addSkillBtn = event.target.closest('#addSkillBtn');
        if (addSkillBtn) {
            // Trouver le parent le plus proche contenant les compétences
            const form = addSkillBtn.closest('form');
            const container = form.querySelector('.scrollable-skill') || form.querySelector('.full-width');
            
            if (container) {
                const newSkillId = 'new_' + Date.now();
                // Votre code HTML pour la nouvelle compétence
                const newSkillHtml = `
                    <div class="skill-item" data-skill-id="${newSkillId}">
                        <!-- Image modifiable avec aperçu -->
                        <div class="skill-image-container">
                            <img src="../images/logos-competences/logo_default.svg" 
                                alt="Nouvelle compétence" 
                                class="skill-image preview-image">
                            <input type="file" name="new_skill_image[${newSkillId}]" 
                                class="image-upload" accept="image/*" style="display:none;" 
                                onchange="previewImage(this)">
                            <button type="button" class="change-image-btn" onclick="triggerFileInput(this)">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                        
                        <!-- Label/input pour le nom de la compétence -->
                        <div class="skill-name">
                            <input type="text" name="new_skill_name[${newSkillId}]" 
                                placeholder="Nom de la compétence" required>
                        </div>
                        
                        <!-- Compteur de 1 à 10 -->
                        <div class="skill-rating">
                            <button type="button" class="counter-btn minus" onclick="decrementCounter(this)">-</button>
                            <input type="number" name="new_skill_rating[${newSkillId}]" 
                                value="5" min="1" max="10" class="rating-counter" readonly>
                            <button type="button" class="counter-btn plus" onclick="incrementCounter(this)">+</button>
                        </div>
                        
                        <!-- Bouton pour supprimer la compétence -->
                        <div class="skill-delete">
                            <button type="button" class="delete-skill-btn" onclick="removeSkill(this)">
                                &times;
                            </button>
                        </div>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', newSkillHtml);
            } else {
                console.error("Conteneur de compétences introuvable");
            }
        }
    });