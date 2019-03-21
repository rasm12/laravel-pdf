$(document).ready(function () {

$(".custom-file-input").on('change', function () {

let filePath = $(this).val();
        let settings = {
        'pathDocument' : filePath;
        };
        $.ajax(
                url: 'http://localhost:8888/read',
                data: settings,
                type: 'POST',
                beforeSend: function(){
                $(".result").html('procesando, espere...');
                },
                success: function(respuesta){
                $(".result").html(respuesta);
                });
        });
});