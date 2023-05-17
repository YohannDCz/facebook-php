let search_filter_all = document.querySelector('.search_filter_all');
let search_filter_persons = document.querySelector('.search_filter_persons');
let search_filter_groups = document.querySelector('.search_filter_groups');
let search_filter_pages = document.querySelector('.search_filter_pages');

let search_persons = document.querySelector('.search_persons');
let search_groups = document.querySelector('.search_groups');
let search_pages = document.querySelector('.search_pages');

search_filter_all.classList.add('active');

search_filter_all.addEventListener('click', () => {
    updateSearchFilterActive(search_filter_all);
    search_persons.style.display = 'flex';
    search_groups.style.display = 'flex';
    search_pages.style.display = 'flex';
});

search_filter_persons.addEventListener('click', () => {
    updateSearchFilterActive(search_filter_persons);
    search_persons.style.display = 'flex';
    search_groups.style.display = 'none';
    search_pages.style.display = 'none';
});

search_filter_groups.addEventListener('click', () => {
    updateSearchFilterActive(search_filter_groups);
    search_persons.style.display = 'none';
    search_groups.style.display = 'flex';
    search_pages.style.display = 'none';
});

search_filter_pages.addEventListener('click', () => {
    updateSearchFilterActive(search_filter_pages);
    search_persons.style.display = 'none';
    search_groups.style.display = 'none';
    search_pages.style.display = 'flex';
});

function updateSearchFilterActive(selectedFilter) {
    // Supprimer la classe active de tous les search_filter
    [search_filter_all, search_filter_persons, search_filter_groups, search_filter_pages].forEach(filter => {
        filter.classList.remove('active');
    });
    
    // Ajouter la classe active à l'élément sélectionné
    selectedFilter.classList.add('active');
}