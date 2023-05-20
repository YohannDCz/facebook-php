let image = document.getElementById('image');
let menu = document.getElementById('menu');

let isMenuVisible = false;

image.addEventListener('click', () => {
  if (isMenuVisible) {
    hideMenu();
  } else {
    showMenu();
  }
});

function showMenu() {
  menu.style.display = 'flex';
  isMenuVisible = true;

  // Ajoutez un écouteur d'événements pour détecter les clics en dehors du menu
  document.addEventListener('click', handleOutsideClick);
}

function hideMenu() {
  menu.style.display = 'none';
  isMenuVisible = false;

  // Supprimez l'écouteur d'événements pour les clics en dehors du menu
  document.removeEventListener('click', handleOutsideClick);
}

function handleOutsideClick(event) {
  // Vérifiez si l'élément cliqué est en dehors du menu
  if (!menu.contains(event.target) && event.target !== image) {
    hideMenu();
  }
}
