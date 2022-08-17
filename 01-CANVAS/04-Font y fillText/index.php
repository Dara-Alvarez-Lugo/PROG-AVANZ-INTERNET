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

    <script type="text/javascript">

        var cv = document.getElementById('mycanvas');
        var ctx = cv.getContext('2d');

        // Texto normal
        ctx.fillStyle = ("rgba(200,0,0)");
        ctx.font = "30px Arial"; // Define las propiedades del texto
        ctx.fillText("Dara Alvarez", 150, 80); //Escribir texto(texto, x, y)

        // Texto con solo bordes
        ctx.strokeStyle = ("rgba(200,0,0)");
        ctx.font = "30px Arial"; // Define las propiedades del texto
        ctx.strokeText("Elienai Lugo", 150, 120); //Escribir texto(texto, x, y)


    </script>


</body>
</html>