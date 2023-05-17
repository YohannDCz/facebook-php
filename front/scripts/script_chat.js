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
        chat.style.display = 'flex';
        sidebar.style.display = 'none';
    });
  });