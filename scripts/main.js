let toastSignup = document.querySelector(".toast-signup");
if (toastSignup) {
    setTimeout(() => {
        toastSignup.style.opacity = 0;
    }, 5000);
}

// document.addEventListener("DOMContentLoaded", function () {
//     const modal = document.querySelector("#hs-basic-modal");
//     const deleteButtons = document.querySelectorAll(".delete");
//     let productIdToDelete;

//     if (modal && deleteButtons) {
//         deleteButtons.forEach((button) => {
//             button.addEventListener("click", () => {
//                 productIdToDelete = button.getAttribute("data-id");
//                 modal.style.opacity = 1;
//                 modal.style.display = "block";
//             });
//         });

//         // close modal
//         const closeModalButtons =
//             document.querySelectorAll("[data-hs-overlay]");
//         closeModalButtons.forEach((button) => {
//             button.addEventListener("click", () => {
//                 modal.style.opacity = 0;
//                 modal.style.pointerEvents = "none";
//                 modal.style.display = "none";
//             });
//         });

//         // handle delete confirmation
//         const confirmDeleteButton = modal.querySelector(".confirm-delete");
//         confirmDeleteButton.addEventListener("click", () => {
//             if (productIdToDelete) {
//                 window.location.href = `./product.php?deleteid=${productIdToDelete}`;
//             }
//         });
//     }
// });

function togglePassword() {
    let password = document.querySelector("#password");
    let showPassword = document.querySelector("#show");

    // toggle password visibility
    if (showPassword) {
        showPassword.addEventListener("change", function () {
            if (this.checked) {
                password.setAttribute("type", "text");
            } else {
                password.setAttribute("type", "password");
            }
        });
    }
}
