let box_main = document.querySelector(".box_main");
let box_main_id = document.querySelector("#box_main");
let box_summary_friends = document.querySelector(".box_summary_friends");
let box_summary_photos = document.querySelector(".box_summary_photos");

let profileLinks = document.querySelectorAll('.summary-link');
let contentBoxes = document.querySelectorAll('.summary-content');

function resetContentBoxes() {
    contentBoxes.forEach(box => {
        box.classList.add('summary-content');
    });
}

// Afficher box_main par défaut
box_main.classList.remove('summary-content');

let box_return = document.querySelector('.box_return');

profileLinks.forEach(link => {
    link.addEventListener('click', function (event) {
        event.preventDefault();
        resetContentBoxes();
        let targetBoxClass = this.dataset.target;
        let targetBox = document.querySelector(`.${targetBoxClass}`);
        targetBox.classList.remove('summary-content');
        toggleResponsiveClass(); // Appel de la fonction après avoir mis à jour les classes
        profile_edit_none();
    });
});

let profile_friends_link = document.querySelector('.profile_friends_link');

profile_friends_link.addEventListener('click', function (event) {
    event.preventDefault();
    resetContentBoxes();
    box_summary_friends.classList.remove('summary-content');
    toggleResponsiveClass(); // Appel de la fonction après avoir mis à jour les classes
});

let profile_photos_link = document.querySelector('.profile_photos_link');

profile_photos_link.addEventListener('click', function (event) {
    event.preventDefault();
    resetContentBoxes();
    box_summary_photos.classList.remove('summary-content');
    toggleResponsiveClass(); // Appel de la fonction après avoir mis à jour les classes
});


function toggleResponsiveClass() {
    let windowWidth = window.innerWidth;

    if (windowWidth < 1024) {
        if (box_main_id.classList.contains('summary-content')) {
            box_return.classList.remove('summary-content');
            box_return.classList.add('summary-content-flex');
        } else {
            box_return.classList.add('summary-content');
        }
    } else {
        box_return.classList.add('summary-content');
    }
}

// Exécute la fonction initiale lors du chargement de la page
toggleResponsiveClass();

// Écoute l'événement de redimensionnement de la fenêtre
window.addEventListener('resize', toggleResponsiveClass);

let profile_edit = document.querySelectorAll('.profile_edit');
let profile_edit_form = document.querySelectorAll('.profile_edit_form');
let box_aboutus_info = document.querySelectorAll('.box_aboutus_info');

function profile_edit_none() {
    profile_edit_form.forEach(box => {
        box.style.display = "none";
    });
    box_aboutus_info.forEach(box => {
        box.style.display = "flex";
    });
}

profile_edit.forEach((button, index) => {
    button.addEventListener('click', function () {
        let targetBox = box_aboutus_info[index];
        targetBox.style.display = "none";

        profile_edit_form[index].style.display = "flex";
    });
});

profile_edit_none()

// pour les photos
window.addEventListener('load', function() {
    const photoContainers = document.querySelectorAll('.box_photos_photo');
  
    photoContainers.forEach(container => {
      const image = container.querySelector('img');
      image.addEventListener('load', function() {
        const containerWidth = container.offsetWidth;
        const containerHeight = containerWidth; // Assumer un ratio de 1:1
        container.style.height = `${containerHeight}px`;
      });
    });
  });
  