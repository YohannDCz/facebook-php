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
            hideAllMenus(menus); // Masquer tous les menus
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

function hideAllMenus(param) {
    param.forEach((menu) => {
        menu.style.display = 'none';
    });
}

let button_create_group = document.getElementById('button_create_group');
let chat_create_group = document.getElementById('chat_create_group');

let isMenuChatGroupVisible = false;

button_create_group.addEventListener('click', () => {
    if (isMenuChatGroupVisible) {
        hideMenuCreateGroup();
    } else {
        showMenuCreateGroup();
    }
});

function showMenuCreateGroup() {
    chat_create_group.style.display = 'flex';
    isMenuChatGroupVisible = true;
    document.addEventListener('click', handleOutsideClick);
}

function hideMenuCreateGroup() {
    chat_create_group.style.display = 'none';
    isMenuChatGroupVisible = false;
    document.removeEventListener('click', handleOutsideClick);
}

function handleOutsideClick(event) {
    if (!chat_create_group.contains(event.target) && event.target !== button_create_group) {
        hideMenuCreateGroup();
    }
}

// fonctions pour les boutons modifier et supprimer pour les conversations
let chat_conv_more = document.querySelectorAll('.chat_conv_more');
let chat_conv_menu = document.querySelectorAll('.chat_conv_menu');

chat_conv_more.forEach((button, index) => {
    let menu = chat_conv_menu[index];
    let isMenuVisible = false;

    button.addEventListener('click', (event) => {
        event.stopPropagation();

        if (isMenuVisible) {
            hideMenu();
        } else {
            hideAllMenus(chat_conv_menu); // Masquer tous les menus
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