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

        // createLinearGradient.(x0, y0, x1, y1)
        // x0 = La coordenada x del punto de inicio del gradiente
        // y0 = La coordenada y del punto de inicio del gradiente
        // x1 = La coordenada x del punto final del gradiente
        // y1 = La coordenada y del punto final del gradiente
        const gradient = ctx.createLinearGradient(0,0, 150,0);
        

        // Cantidad de color
        // addColorStop(offset, color)
        // offset = Posicion del color. Un número entre 0 y 1. 0 representa el inicio del gradiente y 1 representa el final
        // color = 'nombre del color'
        gradient.addColorStop(0.3, 'rgba(196,133,59)');
        gradient.addColorStop(0.7, 'rgba(154,51,87)');
        gradient.addColorStop(1, 'rgba(123,0,114)');


        ctx.fillStyle = gradient;
        ctx.fillRect(20, 20, 200, 100);


    </script>


</body>
</html>