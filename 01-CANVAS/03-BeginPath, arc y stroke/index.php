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


        ctx.fillStyle = ("rgba(200,0,0)");
        ctx.beginPath();
        // Dibuja una curva en las coordenadas (x, y, radio, angulo inicial, angulo final, dirección)
        // Si el angulo final es 1 = Medio circulo
        // Si el angulo final es 2 = Circulo completo
        // Direccion es opcional
        ctx.arc(150,150,70,0,2*Math.PI);
        // ctx.stroke(); // Dibuja la linea ya definida
        ctx.fill(); // Dibuja el contorno ya definido

        ctx.strokeStyle = ("rgba(200,0,0)");
        ctx.lineWidth = "3"; // Define el contorno de la linea
        ctx.beginPath();
        ctx.arc(300,150,70,0,2*Math.PI);
        ctx.stroke();
    </script>


</body>
</html>