document.addEventListener("DOMContentLoaded", function(event) {
    document.querySelector('.add-button').addEventListener('click', (e) => {
        document.querySelector('.modal').style.display="block"

    });

    // Запись
    document.querySelector('.submite-button').addEventListener('click', (e) => {
        // formData или по name собираешь name
        var data = [name, phoneNumber, discription]

        $.ajax({
            url: '/ajax/index.php',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: data,
            success: function(data){
                console.log(data) //написать замену полей в таблице
            }
        });

        modal.style.display = "none";
        modalBg.style.display = "none";
    });

    // Удаление
    document.querySelector('.delete-button').addEventListener('click', (e) => {
        // formData или по name собираешь name
         var data = ID;

        $.ajax({
            url: '/ajax/index.php',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: data,
            success: function(data){
                console.log(data)
            }
        });
    });

    // Редактировать
    document.querySelector('.submite-button').addEventListener('click', (e) => {
        // formData или по name собираешь name
        // var data = name, number, description + type = 'edit'

        $.ajax({
            url: '/ajax/index.php',         /* Куда пойдет запрос */
            method: 'post',             /* Метод передачи (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: data,
            success: function(data){
                console.log(data)
            }
        });
    });
});
