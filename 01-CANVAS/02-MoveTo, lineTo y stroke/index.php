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

        ctx.moveTo(500,500); //Tamaño de la linea utilizando las coordenadas(x, y)
        ctx.lineTo(90,50); //Inicio de la linea utilizando las coordenadas(x, y)
        //ctx.strokeStyle = ("rgba(200,0,0)"); // Define el color
        ctx.stroke(); // Dibuja la linea ya definida

        ctx.fillStyle = ("rgba(200,0,0)");
        ctx.moveTo(60,400);
        ctx.lineTo(50,150);
        ctx.lineTo(200,500);
        ctx.fill();

    </script>
    
</body>
</html>