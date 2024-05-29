function updateFileName() {
    const input = document.getElementById("productimage");
    const fileName = input.files[0] ? input.files[0].name : "Not Chosen";
    document.getElementById("file-chosen").textContent = fileName;
}

function updateAvatar() {
    const input = document.getElementById("avatar");
    const fileName = input.files[0] ? input.files[0].name : "Not Chosen";
    document.getElementById("file-chosen").textContent = fileName;
}

function updateProductImage() {
    const input = document.getElementById("product-image");
    const fileName = input.files[0] ? input.files[0].name : "Not Chosen";
    document.getElementById("file-chosen").textContent = fileName;
}
