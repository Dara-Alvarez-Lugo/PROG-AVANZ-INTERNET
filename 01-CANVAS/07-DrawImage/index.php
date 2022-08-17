<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
</head>
<body>
    <canvas id="mycanvas" width=500 height=500>
        <!-- Si el texto aparece es porque tu navegador no soporta canvas -->
        Tu navegador no soporta canvas
    </canvas>

    <img src="img.png" id="imagen" alt="">
    <script type="text/javascript">

        var cv = document.getElementById('mycanvas');
        var ctx = cv.getContext('2d');

        var img = document.getElementById('imagen');

        //ctx.drawImage(nombre de la variable, posicion x, posicion y, tamaño x, tamaño y);
        ctx.drawImage(img,0,0);


    </script>


</body>
</html>