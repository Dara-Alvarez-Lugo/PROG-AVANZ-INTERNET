<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
</head>
<body>
    <canvas id="mycanvas" width=650 height=700>
        <!-- Si el texto aparece es porque tu navegador no soporta canvas -->
        Tu navegador no soporta canvas
    </canvas>

    <script type="text/javascript">

        var cv = document.getElementById('mycanvas');
        var ctx = cv.getContext('2d');

        // Relleno del canvas
        ctx.fillStyle = ("rgba(116,174,215)");
        ctx.fillRect(0, 0, cv.width, cv.height);


        // Casa
        ctx.fillStyle = ("rgba(242,220,85)");
        ctx.fillRect(70, 700-220, 280, 220);

        // Techo
        ctx.beginPath();
        ctx.fillStyle = ("rgba(90,28,24)");
        ctx.moveTo((280/2)+70 , 340);
        ctx.lineTo(70, 700-220);
        ctx.lineTo(280+70, 700-220);
        ctx.fill();

        // Ventana
        ctx.strokeStyle = ("rgba(67,130,118)");
        ctx.lineWidth = "3";
        ctx.strokeRect(70+30, 520, 70, 70);

        ctx.beginPath();
        ctx.strokeStyle = ("rgba(67,130,118)");
        ctx.lineWidth = "3";
        ctx.moveTo(70+30+(70/2), 520);
        ctx.lineTo(70+30+(70/2), 520+70);
        ctx.stroke();

        ctx.beginPath();
        ctx.strokeStyle = ("rgba(67,130,118)");
        ctx.lineWidth = "3";
        ctx.moveTo(70+30, 520+35);
        ctx.lineTo(70+100, 520+35);
        ctx.stroke();


        // Puerta
        ctx.strokeStyle = ("rgba(125,69,35)");
        ctx.lineWidth = "3";
        ctx.strokeRect(250, 700-70, 70, 70);

        ctx.beginPath();
        ctx.strokeStyle = ("rgba(125,69,35)");
        ctx.lineWidth = "3";
        ctx.moveTo(70+215, 630);
        ctx.lineTo(70+215, 700);
        ctx.stroke();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(169,44,54)");
        ctx.arc(70+200, 665, 5.5, 0, 2*Math.PI);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(169,44,54)");
        ctx.arc(70+230, 665, 5.5, 0, 2*Math.PI);
        ctx.fill();


        // Arbol

            // Tronco
        ctx.fillStyle = ("rgba(93,58,39)");
        ctx.fillRect(650-100, 700-300, 100, 300);

        ctx.beginPath();
        ctx.fillStyle = ("rgba(93,58,39)");
        ctx.moveTo(550, 640);
        ctx.lineTo(530, 700);
        ctx.lineTo(550, 700);
        ctx.fill();

            // Hojas
        ctx.beginPath();
        ctx.fillStyle = ("rgba(49,74,34)");
        ctx.arc(600, 270, 240, 0, 2*Math.PI);
        ctx.fill();

            // Manzanas
        ctx.beginPath();
        ctx.fillStyle = ("rgba(241,74,34)");
        ctx.arc(455, 280, 20, 0, 2*Math.PI);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(241,74,34)");
        ctx.arc(560, 390, 20, 0, 2*Math.PI);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(241,74,34)");
        ctx.arc(580, 150, 20, 0, 2*Math.PI);
        ctx.fill();


        // Nube
        ctx.beginPath();
        ctx.fillStyle = ("rgba(255,255,255)");
        ctx.arc(100, 120, 40, 0, 2*Math.PI);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(255,255,255)");
        ctx.arc(100+(40*2), 120, 40, 0, 2*Math.PI);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(255,255,255)");
        ctx.arc(90+(40*4), 120, 40, 0, 2*Math.PI);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(255,255,255)");
        ctx.arc(100+40, 120-40, 40, 0, 2*Math.PI);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(255,255,255)");
        ctx.arc(80+(40*3), 95, 40, 0, 2*Math.PI);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(255,255,255)");
        ctx.arc(90+(40*3), 150, 40+5, 0, 2*Math.PI);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(255,255,255)");
        ctx.arc(140, 150, 40, 0, 2*Math.PI);
        ctx.fill();


    </script>


</body>
</html>