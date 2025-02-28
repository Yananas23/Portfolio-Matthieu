function deconnexion(){
    if (confirm('Vous allez être déconnecté.')) {
        // Si l'utilisateur clique sur "OK"
        fetch("../component/disconnect.php",{ // Appeler le fichier générique
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        }});
        window.location.href = 'admin-login.php';
    } else {
        // Si l'utilisateur clique sur "Annuler"
        console.log('Déconnexion annulée.');
    }
}

function updateTranslations() {
    fetch('../component/generate_po.php', { method: 'POST' })
        .then(response => {
            if (response.ok) {
                alert("Les fichiers de traduction ont été mis à jour !");
            } else {
                alert("Une erreur s'est produite lors de la mise à jour.");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            alert("Impossible de mettre à jour les fichiers de traduction.");
        });
}

function redirectToPage() {
    window.location.href = './admin-projets.php'; // Remplacez par l'URL de la page vers laquelle vous voulez rediriger
 }

 function ajouterEtape() {
    const container = document.getElementById(`etapes-container`);
    const div = document.createElement(`div`);
    div.className = `etape`;
    div.innerHTML = `
       <label for="etape_nom[]">Nom de l'étape :</label>
       <input type="text" name="etape_nom[]" required>
       <label for="etape_desc[]">description :</label>
       <textarea name="etape_desc[]"></textarea>
       <button id="suppr" type="button" class="supprimer" onclick="supprimerElement(this, 'etape')">Supprimer</button>
    `;
    container.appendChild(div);
 }

 function ajouterObjectif() {
    const container = document.getElementById(`objectifs-container`);
    const div = document.createElement(`div`);
    div.className = `objectif`;
    div.innerHTML = `
       <label for="objectif_nom[]">Nom de l'objectif :</label>
       <input type="text" name="objectif_nom[]" required>
       <label for="objectif_desc[]">description :</label>
       <textarea name="objectif_desc[]"></textarea>
       <button id="suppr" type="button" class="supprimer" onclick="supprimerElement(this, 'objectif')">Supprimer</button>
    `;
       container.appendChild(div);
 }

 function supprimerElement(button, type) {
    const elementDiv = button.parentElement; // Div contenant l'élément (etape ou objectif)
    const itemId = elementDiv.getAttribute('data-id'); // Récupère l'ID
    const pattern1 = /.*_nom\[\]/; // Pattern pour correspondre à *quelque-chose*_nom[]
    const pattern2 = /.*_desc\[\]/; // comme au dessus mais pour _desc[]

    const elements = elementDiv.querySelectorAll('input[name]');
    let elementFound = false;
    let isEmpty = true;

    elements.forEach(element => {
       if (pattern1.test(element.getAttribute('name')) || pattern2.test(element.getAttribute('name'))) {
             elementFound = true;
             console.error("found");
             if (element.value.trim() != '') {
                isEmpty = false;
             }
       }
    });

    if (elementFound && isEmpty) {
       elementDiv.remove();
    }


    fetch('../component/delete.php', { // Appeler le fichier générique
       method: 'POST',
       headers: {
             'Content-Type': 'application/json',
       },
       body: JSON.stringify({ id: itemId, type: type }), // Inclure l'ID et le type
    })
    .then((response) => response.text())
    .then((result) => {
       if (result === 'success') {
             elementDiv.remove(); // Supprimer l'élément de la page
       } else {
             console.error('Erreur :', result);
       }
    });
 }

 function shortSynopsis() {            
    document.getElementById(`short_synopsis`).classList.remove(`hidden`);

    // Cache le bouton "Ajouter une autre zone de texte"
    document.getElementById(`shortSB`).classList.add(`hidden`);
    document.getElementById(`RshortSB`).classList.remove(`hidden`);
}

// Fonction pour supprimer le deuxième textarea
function supprimerShortS() {
    document.getElementById(`short_synopsis`).classList.add(`hidden`);

    // Réaffiche le bouton "Ajouter une autre zone de texte"
    document.getElementById(`shortSB`).classList.remove(`hidden`);
    document.getElementById(`RshortSB`).classList.add(`hidden`);
}

function shortVueEnsemble() {
    document.getElementById(`short_resume`).classList.remove(`hidden`);

    // Cache le bouton "Ajouter une autre zone de texte"
    document.getElementById(`shortRB`).classList.add(`hidden`);
    document.getElementById(`RshortRB`).classList.remove(`hidden`);
}

// Fonction pour supprimer le deuxième textarea
function supprimerShortR() {
    document.getElementById(`short_resume`).classList.add(`hidden`);

    // Réaffiche le bouton "Ajouter une autre zone de texte"
    document.getElementById(`shortRB`).classList.remove(`hidden`);
    document.getElementById(`RshortRB`).classList.add(`hidden`);
}

window.addEventListener('DOMContentLoaded', function() {
    // Obtenez la hauteur de la div parente
    var superDiv = document.getElementById('super');
    var superHeight = superDiv.offsetHeight;

    // Obtenez la hauteur du h4
    var h4 = superDiv.querySelector('h4');
    var h4Height = h4.offsetHeight;

    // Calculez la hauteur restante pour le conteneur de la table
    var tableContainerHeight = (superHeight - h4Height) - 40;

    // Définissez la hauteur du conteneur de la table
    var adminTableContainer = document.querySelector('.admin-table-container');
    adminTableContainer.style.height = tableContainerHeight + 'px';
});

function loadModal(modalPath) {
    const path = "../admin/modal/" + modalPath;

    fetch(path)
        .then(response => response.text())
        .then(data => {
            const modalContainer = document.getElementById('modalContainer');
            modalContainer.innerHTML = data;

            // Affiche le modal si une classe .modal est présente
            const modal = modalContainer.querySelector('.modal');
            if (modal) modal.style.display = 'flex';

            // ✅ Intercepte tous les formulaires présents dans le modal
            const form = modalContainer.querySelector("form");
            if (form) {
                form.addEventListener("submit", handleModalFormSubmit);
            }
        })
        .catch(error => console.error('Erreur de chargement :', error));
}

// Fermer n'importe quel modal
function closeModal() {
    document.getElementById('modalContainer').innerHTML = '';
}

function handleModalFormSubmit(event) {
    event.preventDefault(); // ✅ Empêche le rechargement de la page

    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: form.method || 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        alert('Action réalisée avec succès !');

        // ✅ Ferme le modal après la soumission
        closeModal();

        // ✅ Rafraîchir la page si nécessaire
        if (form.hasAttribute('data-reload')) {
            window.location.href = './admin.php?success=1';
        }
    })
    .catch(error => {
        console.error('Erreur lors de l\'envoi :', error);
    });
}



function deleteAdmin(adminId) {
    if (confirm("Voulez-vous vraiment supprimer cet admin ?")) {
        // Envoi de la requête AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../component/delete-admin.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                alert("Admin supprimé avec succès !");
                location.reload(); // Actualise la page pour mettre à jour la liste
            } else {
                alert("Erreur lors de la suppression.");
            }
        };

        xhr.send("id=" + adminId);
    }
}
