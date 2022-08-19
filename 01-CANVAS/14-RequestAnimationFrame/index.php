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

        var cv = null;
        var ctx = null;
        var player1 = null;
        var super_x = 250;
        var super_y = 250;
        

        function start()
        {
            cv = document.getElementById('mycanvas');
            ctx = cv.getContext('2d');

            player1 = new Cuadrado(super_x, super_y, 40, 40, 'red');

            paint();
        }
        

        function paint()
        {
            window.requestAnimationFrame(paint);

            // Limpiar la pantalla
            ctx.fillStyle = "pink";
            ctx.fillRect(0,0,500,500);

            // Colocar el cuadrado
            // ctx.fillStyle = random_rgba();
            // ctx.fillRect(super_x,super_y,40,40);
            // ctx.strokeRect(super_x,super_y,40,40);

            player1.c = random_rgba();
            player1.dibujar(ctx);

            update(); // Se va a ejecutar cada que se actualiza el frame
        }


        // Se encarga de cambiar los valores
        function update()
        {
            player1.x += 10;
            if(player1.x > 500){
                player1.x = 0;
            }

            player1.y += 10;
            if(player1.y > 500){
                player1.y = 0;
            }

        }


        // Cuando la ventana termina de cargar se ejecuta la funcion start
        window.addEventListener('load', start);


        window.requestAnimationFrame = (function () {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                function (callback) {
                    //Se manda a llamar cada 17
                    window.setTimeout(callback, 17);
                };
        }());

        function Cuadrado(x,y,w,h,c)
        {
            this.x = x;
            this.y = y;
            this.w = w;
            this.h = h;
            this.c = c;

            this.dibujar = function(ctx){
                ctx.fillStyle = this.c;
                ctx.fillRect(this.x, this.y, this.w, this.h);
                ctx.strokeRect(this.x, this.y, this.w, this.h);
            }
        }

        function random_rgba() {
            var o = Math.round, r = Math.random, s = 255;
            return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
        }


    </script>


</body>
</html>