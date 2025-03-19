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
  let type = document.getElementById("type" + id);
  let brand = document.getElementById("brand" + id);
  let model = document.getElementById("model" + id);
  let serialNumber = document.getElementById("serialNumber" + id);

  let idUpdate = document.getElementById("idUpdate");
  let nameUpdate = document.getElementById("nameUpdate");
  let typeUpdate = document.getElementById("typeUpdate");
  let brandUpdate = document.getElementById("brandUpdate");
  let modelUpdate = document.getElementById("modelUpdate");
  let serialNumberUpdate = document.getElementById("serialNumberUpdate");

    idUpdate.value = id;
    nameUpdate.value = name.textContent;
    typeUpdate.value= type.textContent;
    brandUpdate.value = brand.textContent;
    modelUpdate.value = model.textContent;
    serialNumberUpdate.value = serialNumber.textContent;
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