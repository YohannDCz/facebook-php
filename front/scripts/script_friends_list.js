let filter_friends = document.querySelector('.filter_friends');
let filter_pending = document.querySelector('.filter_pending');
let filter_add = document.querySelector('.filter_add');

let search_add = document.querySelector('.search_add');
let search_pending = document.querySelector('.search_pending');
let search_friends = document.querySelector('.search_friends');

filter_friends.classList.add('active');
search_add.style.display = 'none';
search_pending.style.display = 'none';

filter_friends.addEventListener('click', () => {
    updateSearchFilterActive(filter_friends);
    search_friends.style.display = 'flex';
    search_add.style.display = 'none';
    search_pending.style.display = 'none';
});

filter_pending.addEventListener('click', () => {
    updateSearchFilterActive(filter_pending);
    search_pending.style.display = 'flex';
    search_add.style.display = 'none';
    search_friends.style.display = 'none';
});

filter_add.addEventListener('click', () => {
    updateSearchFilterActive(filter_add);
    search_add.style.display = 'flex';
    search_pending.style.display = 'none';
    search_friends.style.display = 'none';
});

function updateSearchFilterActive(selectedFilter) {
    // Supprimer la classe active de tous les search_filter
    [filter_friends, filter_pending, filter_add].forEach(filter => {
        filter.classList.remove('active');
    });
    
    // Ajouter la classe active à l'élément sélectionné
    selectedFilter.classList.add('active');
}