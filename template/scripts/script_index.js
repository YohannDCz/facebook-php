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

// Fonction pour modifier une publication
function modifyText(index) {
  let currentText = document.querySelectorAll(".publication_text")[index];
  let areaText = document.querySelectorAll(".placenewText")[index];
  let textarea = document.createElement("textarea");

  textarea.value = currentText.innerHTML;
  currentText.innerHTML = "";
  textarea.setAttribute("oninput", "autoResize(this)");
  textarea.classList.add("publication_text_area");
  textarea.classList.add("newTextInput");

  // Création d'un bouton "Valider"
  let validateButton = document.createElement("button");
  validateButton.textContent = 'done';
  validateButton.classList.add("Submitbutton");
  validateButton.classList.add("material-icons-round");

  // Masque le bouton "Modifier"
  let modify_btns = document.querySelectorAll(".modifyButton");
  modify_btns[index].style.display = "none";

  // Insère le champ de saisie et le bouton "Valider" après le bouton "Modifier"
  modify_btns[index].insertAdjacentElement("afterend", validateButton);
  areaText.appendChild(textarea);

  validateButton.addEventListener("click", function () {
    let newTextElement = document.querySelectorAll(".newTextInput")[0].value;
    currentText.textContent = newTextElement;

    // Supprime le champ de saisie et le bouton "Valider"
    textarea.remove();
    validateButton.remove();

    // Affiche à nouveau le bouton "Modifier"
    modify_btns[index].style.display = "inline-block";
  });
}

let modify_btns = document.querySelectorAll(".modifyButton");
modify_btns.forEach((btn, index) => {
  btn.addEventListener("click", function () {
    modifyText(index);
  });
});
