let removeButton = document.querySelector('.remove_btn');

document.getElementById("custom-img-btn").addEventListener("click", function () {
    let fileInput = document.createElement("input");
    fileInput.type = "file";
    fileInput.accept = "image/*";
    fileInput.multiple = false;

    fileInput.addEventListener("change", function (e) {
        let div_image = document.getElementById('publication_image');
        let image = div_image.querySelector('img');

        let files = e.target.files;
        let file = files[0];
        let reader = new FileReader();

        reader.onload = function (e) {
            if (image) {
                image.src = e.target.result;
            } else {
                image = document.createElement("img");
                image.src = e.target.result;
                div_image.appendChild(image);
            }
            removeButton.style.display = "block";
        }

        reader.readAsDataURL(file);
    });

    fileInput.click();
});



// Script pour importer une video lors de la publication d'un post

// document.getElementById("custom-video-btn").addEventListener("click", function() {
//   let fileInput = document.createElement("input");
//   fileInput.type = "file";
//   fileInput.accept = "video/*";
//   fileInput.multiple = true;

//   fileInput.addEventListener("change", function(e) {
//     let files = e.target.files;
//     if (files && files.length > 0) {
//       for (let i = 0; i < files.length; i++) {
//         let file = files[i];

//         console.log("Nom du fichier sélectionné :", file.name);
//       }
//     }
//   });

//   fileInput.click();
// });


function removeFunction() {
    let div_image = document.getElementById('publication_image');

    let imageToRemove = div_image.querySelector('img');

    if (imageToRemove) {
        div_image.removeChild(imageToRemove);
    }

    removeButton.style.display = "none";
}

removeButton.addEventListener('click', removeFunction);