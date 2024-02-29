
const modal = document.querySelector(".modal");
const modalBg = document.querySelector(".modal-background");

function showAddForm(){
    modal.style.display = "block";
    modalBg.style.display = "block";
}

function stopShowAddForm(){
    modal.style.display = "none";
    modalBg.style.display = "none";
}

document.querySelector(".add-button").addEventListener("click", (e) => {
    e.preventDefault();
    showAddForm();
})
document.querySelector(".submite-button").addEventListener("click", (e) => {
    e.preventDefault();
    stopShowAddForm();
})
