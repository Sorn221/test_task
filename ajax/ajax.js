document.addEventListener("DOMContentLoaded", function(event) {
    document.querySelector('.add-button').addEventListener('click', (e) => {
        document.querySelector('.modal').style.display="block"
        
    });

    document.querySelector('.edit-button').addEventListener('click', (e) => {
        document.querySelector('.modal').style.display="block"
        
    });

    // Запись
    document.querySelector('.submite-button').addEventListener('click', (e) => {
        // formData или по name собираешь name
        var type = "add";
        $.ajax({
            url: '/ajax/index.php',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {type: type},
            success: function(data){
                console.log(data) //написать замену полей в таблице
            }
        });

        modal.style.display = "none";
        modalBg.style.display = "none";
    });

    // Удаление
    document.querySelector('.delete-button').addEventListener('click', (e) => {
        
        var id = $(this).data('id');
        var type = "delete";
            $.ajax({
                url: '/ajax/delete.php',
                type: 'POST',
                data: {id: id, type: type},
                success: function() {
                    alert('Запись успешно удалена');
                    $(this).closest('tr').remove();
                }
            });
    });

    // Редактировать
    document.querySelector('.submite-button').addEventListener('click', (e) => {
        // formData или по name собираешь name
        // var data = name, number, description + type = 'edit'
        var type = "edit";
        $.ajax({
            url: '/ajax/index.php',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {type: type},
            success: function(data){
                console.log(data)
            }
        });

        document.querySelector('.modal').style.display="none"
    });
});
