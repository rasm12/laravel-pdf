<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
            body{ padding:20px;}

            .custom-file-upload input[type="file"] {
                display: none;
            }
            .custom-file-upload .custom-file-upload1 {
                border: 1px solid #ccc;
                display: inline-block;
                padding: 6px 12px;
                cursor: pointer;
            }
        </style>

        <script>
$(document).ready(function () {

    //$(".custom-file-input").on('change', function () {
    $("#formuploadajax").on("submit", function (e) {

        e.preventDefault();


        let formData = new FormData();
        formData.append('file', $('input[type=file]')[0].files[0]);


        $.ajax({
            url: 'https://evening-bayou-97579.herokuapp.com/uploadfile',
            data: formData,
            type: 'post',
            contentType: false,
            dataType: 'html',
            cache: false,
            processData: false,
            beforeSend: function () {
                $(".result").html('');
                $(".result").html('procesando, espere...');
            },
            success: function (respuesta) {
                $(".result").html(respuesta);
            },
            complete: function (xhr, textStatus) {
                console.log(xhr.status);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);

                $(".result").html(textStatus);
            }
        });
    });
});
        </script>

        <!-- Styles -->

    </head>
    <body>
        <form enctype="multipart/form-data" id="formuploadajax" method="post">
            <input  type="file" id="archivo1" name="archivo1"  accept="application/pdf"/>
            <div id="result"></div>
            <br />
            <input type="submit" value="Subir archivos"/>
        </form>

        <div class="contenedor">
            <div class="result"/>
        </div>


    </body>
</html>
