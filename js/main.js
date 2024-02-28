const modal = document.querySelector(".modal");
const modalBg = document.querySelector(".modal-background");
function showAddForm(){
    modal.style.display = "block";
    modalBg.style.display = "block";
}
document.querySelector(".add-button").addEventListener("click", (e) => {
    e.preventDefault();
    showAddForm();
  })