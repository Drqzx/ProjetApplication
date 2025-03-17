// Récupérer les éléments de la popup et du bouton
let popup = document.getElementById("popup");
let btn = document.getElementById("ajouter-btn");
let close = document.getElementById("close");

// Ouvrir la popup lorsque le bouton est cliqué
btn.onclick = function() {
  popup.style.display = "block";
}

// Fermer la popup lorsque la croix est cliquée
close.onclick = function() {
  popup.style.display = "none";
}

let popupUpdate = document.getElementById("popupUpdate");
let closeUpdate = document.getElementById("closeUpdate");

// Ouvrir la popup lorsque le bouton est cliqué
function openUpdateContainer(id) {
  popupUpdate.style.display = "block";

  let name = document.getElementById("name" + id);
  let licence = document.getElementById("licence" + id);
  let version = document.getElementById("version" + id);

  let idUpdate = document.getElementById("idUpdate");
  let nameUpdate = document.getElementById("nameUpdate");
  let licenceUpdate = document.getElementById("licenceUpdate");
  let versionUpdate = document.getElementById("versionUpdate");

    idUpdate.value = id;
    nameUpdate.value = name.textContent;
    licenceUpdate.value = licence.textContent;
    versionUpdate.value = version.textContent;
}

// Fermer la popup lorsque la croix est cliquée
closeUpdate.onclick = function() {
  popupUpdate.style.display = "none";
}


// Fermer la popup si l'utilisateur clique en dehors de la popup
window.onclick = function(event) {
  if (event.target == popupUpdate) {
    popupUpdate.style.display = "none";
  }
  if (event.target == popup) {
    popup.style.display = "none";
  }
}