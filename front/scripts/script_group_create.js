// Liste des amis (exemple)
let friends = [
    "Ami Arthur",
    "Ami Bernard",
    "Ami Marc",
];

// Événement de recherche
document.getElementById("searchInput").addEventListener("input", function () {
    let searchQuery = this.value.toLowerCase();
    let searchResults = friends.filter(function (friend) {
        return friend.toLowerCase().includes(searchQuery);
    });

    displaySearchResults(searchResults);
});

// Afficher les résultats de la recherche
function displaySearchResults(results) {
    let searchResultsContainer = document.getElementById("searchResults");
    searchResultsContainer.innerHTML = "";

    results.forEach(function (result) {
        let group_tag_container = document.createElement("div");
        group_tag_container.classList.add("group_tag_container");

        let group_tag_friend_pp = document.createElement("img");
        group_tag_friend_pp.classList.add("group_friend_pp");
        group_tag_friend_pp.src = "./img/pp.png";
        group_tag_friend_pp.alt = "profile_picture";


        let group_tag_close_icons = document.createElement("span");
        group_tag_close_icons.classList.add("material-icons");
        group_tag_close_icons.textContent = "close";


        let tag = document.createElement("div");
        tag.classList.add("tag");
        tag.textContent = result;

        searchResultsContainer.appendChild(tag);

        group_tag_container.appendChild(group_tag_friend_pp);
        group_tag_container.appendChild(tag);
        group_tag_container.appendChild(group_tag_close_icons);
        searchResultsContainer.appendChild(group_tag_container);
    });
}