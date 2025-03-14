// Récupérer les éléments de la popup et du bouton
var popup = document.getElementById("popup");
var btn = document.getElementById("ajouter-btn");
var close = document.getElementById("close");

// Ouvrir la popup lorsque le bouton est cliqué
btn.onclick = function() {
  popup.style.display = "block";
}

// Fermer la popup lorsque la croix est cliquée
close.onclick = function() {
  popup.style.display = "none";
}

// Fermer la popup si l'utilisateur clique en dehors de la popup
window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.display = "none";
  }
}
