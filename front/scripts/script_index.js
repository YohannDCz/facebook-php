let index_menuburger = document.getElementById('index_menuburger');
let index_menuopen = document.getElementById('index_menuopen');

let isIndexMenuVisible = false;

index_menuburger.addEventListener('click', () => {
  if (isIndexMenuVisible) {
    hideIndexMenu();
  } else {
    showIndexMenu();
  }
});

function showIndexMenu() {
  index_menuopen.style.display = 'flex';
  isIndexMenuVisible = true;

  // Ajoutez un écouteur d'événements pour détecter les clics en dehors du index_menuopen
  document.addEventListener('click', handleOutsideClickIndexMenu);
}

function hideIndexMenu() {
  index_menuopen.style.display = 'none';
  isIndexMenuVisible = false;

  // Supprimez l'écouteur d'événements pour les clics en dehors du index_menuopen
  document.removeEventListener('click', handleOutsideClickIndexMenu);
}

function handleOutsideClickIndexMenu(event) {
  // Vérifiez si l'élément cliqué est en dehors du index_menuopen
  if (!index_menuopen.contains(event.target) && event.target !== index_menuburger) {
    hideIndexMenu();
  }
}
