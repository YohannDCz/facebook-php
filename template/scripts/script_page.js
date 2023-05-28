//   fonction pour la confirmation de supression de groupe
let buttonDeleteGroup = document.getElementById('buttonDeleteGroup');
let divDeleteGroup = document.getElementById('divDeleteGroup');

let isMenuDeleteVisible = false;

buttonDeleteGroup.addEventListener('click', () => {
  if (isMenuDeleteVisible) {
    hideMenuDelete();
  } else {
    showMenuDelete();
  }
});

function showMenuDelete() {
  divDeleteGroup.style.display = 'flex';
  isMenuDeleteVisible = true;

  // Ajoutez un écouteur d'événements pour détecter les clics en dehors du divDeleteGroup
  document.addEventListener('click', handleOutsideClickDelPage);
}

function hideMenuDelete() {
  divDeleteGroup.style.display = 'none';
  isMenuDeleteVisible = false;

  // Supprimez l'écouteur d'événements pour les clics en dehors du divDeleteGroup
  document.removeEventListener('click', handleOutsideClickDelPage);
}

function handleOutsideClickDelPage(event) {
  // Vérifiez si l'élément cliqué est en dehors du divDeleteGroup
  if (!divDeleteGroup.contains(event.target) && event.target !== buttonDeleteGroup) {
    hideMenuDelete();
  }
}
