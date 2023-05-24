let chatReturnLink = document.querySelector('.chat_return');
let chat = document.querySelector('.chat');
let sidebar = document.querySelector('.sidebar');

chatReturnLink.addEventListener('click', () => {
    chat.style.display = 'none';
    sidebar.style.display = 'block';
});


let listContacts = document.querySelectorAll('ul');

listContacts.forEach((item) => {
    item.addEventListener('click', () => {
        if (window.innerWidth < 1024) {
            chat.style.display = 'flex';
            sidebar.style.display = 'none';
        } else {
            chat.style.display = 'flex';
        }
    });
});


// fonctions pour les boutons modifier et supprimer pour les messages
let buttons = document.querySelectorAll('.edit-button');
let menus = document.querySelectorAll('.menu2');

buttons.forEach((button, index) => {
    let menu = menus[index];
    let isMenuVisible = false;

    button.addEventListener('click', (event) => {
        event.stopPropagation();

        if (isMenuVisible) {
            hideMenu();
        } else {
            hideAllMenus(); // Masquer tous les menus
            showMenu();
        }
    });

    function showMenu() {
        menu.style.display = 'flex';
        isMenuVisible = true;
        document.addEventListener('click', handleOutsideClick);
    }

    function hideMenu() {
        menu.style.display = 'none';
        isMenuVisible = false;
        document.removeEventListener('click', handleOutsideClick);
    }

    function handleOutsideClick(event) {
        if (!menu.contains(event.target) && event.target !== button) {
            hideMenu();
        }
    }
});

function hideAllMenus() {
    menus.forEach((menu) => {
        menu.style.display = 'none';
    });
}
