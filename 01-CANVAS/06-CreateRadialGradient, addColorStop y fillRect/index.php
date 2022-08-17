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

        // createRadialGradient(x0, y0, r0, x1, y1, r1)
        // x0 = La coordenada del eje x del círculo inicial
        // y0 = La coordenada del eje y del círculo inicial
        // r0 = El radio del círculo inicial. Debe ser no negativo y finito. Intensidad del circulo
        // x1 = La coordenada del eje x del círculo final
        // y1 = La coordenada del eje y del círculo final
        // r1 = El radio del círculo final. Debe ser no negativo y finito. Zoom del circulo
        const gradient = ctx.createRadialGradient(90, 50, 10, 120, 90, 150);
        

        // Cantidad de color
        // addColorStop(offset, color)
        // offset = Posicion del color. Un número entre 0 y 1. 0 representa el inicio del gradiente y 1 representa el final
        // color = 'nombre del color'
        gradient.addColorStop(0, 'red');
        gradient.addColorStop(1, 'white');


        ctx.fillStyle = gradient;
        ctx.fillRect(20, 20, 200, 100);


    </script>


</body>
</html>