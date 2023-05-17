// adapter le textarea en fonction du contenu
function autoResize(textarea) {
    textarea.style.height = 'auto'; // Réinitialisez d'abord la hauteur à 'auto' pour éviter le débordement initial
    textarea.style.height = textarea.scrollHeight + 'px'; // Ajuste la hauteur en fonction de la hauteur du contenu
  }