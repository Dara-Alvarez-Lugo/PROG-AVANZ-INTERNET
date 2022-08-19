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
        var color = 'red';
        var figura = 'arc'; // arc = circulo rec = rectangulo
        var press = false;
        

        cv.addEventListener('click', function(e)
        {
            ctx.fillStyle = color;
            ctx.lineWidth = "3";

            if(figura == 'rec'){
                ctx.fillRect(e.offsetX-20, e.offsetY-20, 40, 40);
                ctx.strokeRect(e.offsetX-20, e.offsetY-20, 40, 40);

            } else{
                ctx.beginPath();
                ctx.arc(e.offsetX, e.offsetY, 40, 0, 2*Math.PI);
                ctx.stroke();
                ctx.fill();

            }

            
        });

        
        cv.addEventListener('mouseover', function(e)
        {
            color = random_rgba();
        });


        cv.addEventListener('mouseout', function(e)
        {
            figura = (figura == 'arc')?'rec':'arc';
        });


        cv.addEventListener('mousemove', function(e)
        {
            if(press){
                ctx.fillStyle =  random_rgba();
                ctx.fillRect(e.offsetX-5, e.offsetY-5, 10, 10);
                
            }
        });


        cv.addEventListener('mousedown', function(e)
        {
            press = true;
        });

        cv.addEventListener('mouseup', function(e)
        {
            press = false;
        });

        
        function random_rgba() {
            var o = Math.round, r = Math.random, s = 255;
            return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
        }

    </script>


</body>
</html>