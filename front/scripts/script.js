// adapter le textarea en fonction du contenu
function autoResize(textarea) {
  textarea.style.height = 'auto'; // Réinitialisez d'abord la hauteur à 'auto' pour éviter le débordement initial
  textarea.style.height = textarea.scrollHeight + 'px'; // Ajuste la hauteur en fonction de la hauteur du contenu
}

if (!window.themeToggle) {
  let themeToggle = document.getElementById('theme-toggle');
  let bodyElement = document.body;

  // Fonction pour appliquer le thème
  function applyTheme(theme) {
    if (theme === 'dark') {
      bodyElement.classList.add('dark-theme');
      bodyElement.classList.remove('light-theme');
      if (themeToggle) {
        themeToggle.checked = true;
      }
    } else {
      bodyElement.classList.add('light-theme');
      bodyElement.classList.remove('dark-theme');
      if (themeToggle) {
        themeToggle.checked = false;
      }
    }
  }

  // Vérifier si le thème est déjà stocké
  let storedTheme = localStorage.getItem('theme');
  if (storedTheme) {
    applyTheme(storedTheme);
  } else {
    // Aucun thème stocké, appliquer le thème en fonction du préférences du système
    let systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    applyTheme(systemTheme);
  }

  // Gestionnaire d'événements pour le bouton de basculement du thème (si l'élément existe)
  if (themeToggle) {
    themeToggle.addEventListener('change', function () {
      let selectedTheme = themeToggle.checked ? 'dark' : 'light';
      applyTheme(selectedTheme);
      localStorage.setItem('theme', selectedTheme);
    });
  }
}