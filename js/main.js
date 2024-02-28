const modal = document.querySelector(".modal");
const modalBg = document.querySelector(".modal-background");
function showAddForm(){
    modal.style.display = "block";
    modalBg.style.display = "block";
}
function addDirectory(){
    
}
function deleteDirectory(){

}
function editDirectory(){

}
document.querySelector(".add-button").addEventListener("click", (e) => {
    e.preventDefault();
    showAddForm();
})
document.querySelector(".edit-button").addEventListener("click", (e) => {
    e.preventDefault();
    editDirectory();
})
document.querySelector(".delete-button").addEventListener("click", (e) => {
    e.preventDefault();
    deleteDirectory();
})
document.querySelector(".submite-button").addEventListener("click", (e) => {
    e.preventDefault();
    addDirectory();
})