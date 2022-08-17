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

        
        ctx.fillStyle = ("rgba(200,0,0)"); //Define el color
        ctx.fillRect(10,10,70,70); // Define la ubicaicon y tamaño (x, y, width, height)


    
        ctx.fillStyle = ("rgba(0,0,200,0.5)");
        ctx.fillRect(30,30,70,70);

        ctx.fillStyle = ("rgba(0,200,0,0.5)");
        ctx.fillRect(60,60,70,70);

    </script>


</body>
</html>