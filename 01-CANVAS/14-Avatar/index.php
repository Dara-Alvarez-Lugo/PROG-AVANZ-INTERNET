<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
</head>
<body>
    <canvas id="mycanvas" width=500 height=600>
        <!-- Si el texto aparece es porque tu navegador no soporta canvas -->
        Tu navegador no soporta canvas
    </canvas>

    <script type="text/javascript">

        var cv = document.getElementById('mycanvas');
        var ctx = cv.getContext('2d');

        // Contorno para el canvas
        // ctx.strokeRect(0, 0, cv.width, cv.height);


        // Cabello
        ctx.beginPath();
        ctx.fillStyle = ("rgba(93, 59, 41)"); 
        ctx.arc(250,95,90,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();


        // Cabeza
        ctx.beginPath();
        ctx.fillStyle = ("rgba(233, 196, 161)");
        ctx.arc(250,90,60,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();


        // Cuello
        ctx.fillStyle = ("rgba(233, 196, 161)");
        ctx.fillRect(225,145,50,20);


        // Cabello
        ctx.beginPath();
        ctx.fillStyle = ("rgba(93, 59, 41)");
        ctx.strokeStyle = ("rgba(81, 37, 14)");
        ctx.lineWidth = "3";
        ctx.moveTo(270,34);
        ctx.lineTo(200,20);
        ctx.lineTo(150,150);
        ctx.fill();
        ctx.stroke();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(93, 59, 41)");
        ctx.strokeStyle = ("rgba(81, 37, 14)");
        ctx.lineWidth = "3";
        ctx.moveTo(270,32);
        ctx.lineTo(310,60);
        ctx.lineTo(310,150);
        ctx.fill();
        ctx.stroke();


        // Cara

            // Ojos
        ctx.beginPath();
        ctx.fillStyle = ("rgba(0, 0, 0)");
        ctx.arc(230,90,6,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(0, 0, 0)");
        ctx.arc(270,90,6,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();

            // Boca
        ctx.beginPath();
        ctx.strokeStyle = ("rgba(0,0,0)");
        ctx.lineWidth = "2"; // Define el contorno de la linea
        ctx.arc(250,110,10,0,1*Math.PI);
        ctx.stroke();


        // Pantalon
        ctx.fillStyle = ("rgba(30, 53, 89)");
        ctx.fillRect(175,305,150,10);
        
        ctx.beginPath();
        ctx.fillStyle = ("rgba(30, 53, 89)"); 
        ctx.moveTo(175,315);
        ctx.lineTo(175,500);
        ctx.lineTo(210,500);
        ctx.lineTo(260,315);
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(30, 53, 89)");
        ctx.moveTo(325,315);
        ctx.lineTo(325,500);
        ctx.lineTo(290,500);
        ctx.lineTo(240,315);
        ctx.fill();


        // Brazos
        ctx.fillStyle = ("rgba(233, 196, 161)");
        ctx.fillRect(145,175,30,120);
        ctx.fillRect(325,175,30,120);


        // Hombros
        ctx.beginPath();
        ctx.fillStyle = ("rgba(233, 196, 161)");
        ctx.arc(165,180,20,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(233, 196, 161)");
        ctx.arc(335,180,20,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();


        // Camisa
        ctx.fillStyle = ("rgba(0, 0, 0)");
        ctx.fillRect(175,160,150,145);

        ctx.fillStyle = ("rgba(255,255,255)");
        ctx.font = "10px Arial";
        ctx.fillText("Adidas",270,200);
        

        // Manos
        ctx.beginPath();
        ctx.fillStyle = ("rgba(233, 196, 161)");
        ctx.arc(160,300,20,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();

        ctx.beginPath();
        ctx.fillStyle = ("rgba(233, 196, 161)");
        ctx.arc(340,300,20,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();


        // Tenis

            // Teni
        ctx.fillStyle = ("rgba(0, 0, 0)");
        ctx.fillRect(175,500,35,20);
        ctx.fillRect(155,520,55,30);

        ctx.beginPath();
        ctx.fillStyle = ("rgba(0, 0, 0)");
        ctx.arc(160,535,15,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();

                // Lineas
        ctx.beginPath();
        ctx.strokeStyle = ("rgba(255,255,255)");
        ctx.lineWidth = "3";
        ctx.moveTo(175,530);
        ctx.lineTo(210,530);
        ctx.stroke();

        ctx.beginPath();
        ctx.strokeStyle = ("rgba(255,255,255)");
        ctx.lineWidth = "3";
        ctx.moveTo(155,545);
        ctx.lineTo(176,530);
        ctx.stroke();


            // Teni
        ctx.fillStyle = ("rgba(0, 0, 0)");
        ctx.fillRect(290,500,35,20);
        ctx.fillRect(271,520,54,30);

        ctx.beginPath();
        ctx.fillStyle = ("rgba(0, 0, 0)");
        ctx.arc(275,535,15,0,2*Math.PI); //(x, y, radio, angulo inicial, angulo final)
        ctx.fill();

                //Lineas
        ctx.beginPath();
        ctx.strokeStyle = ("rgba(255,255,255)");
        ctx.lineWidth = "3";
        ctx.moveTo(325,530);
        ctx.lineTo(290,530);
        ctx.stroke();

        ctx.beginPath();
        ctx.strokeStyle = ("rgba(255,255,255)");
        ctx.lineWidth = "3";
        ctx.moveTo(270,545);
        ctx.lineTo(291,530);
        ctx.stroke();


    </script>


</body>
</html>