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
        var player2 = null;
        
        var super_x = 10;
        var super_y = 10;
        
        var direction = 'rigth';
        var score = 0;
        var speed = 5;
        var pause = false;

        var obstaculo1 = null;
        var obstaculo2 = null;
        var obstaculo3 = null;

        var abeja = new Image();
        var flor = new Image();
        var pared = new Image();

        var sonido1 = new Audio();
        


        function start()
        {
            cv = document.getElementById('mycanvas');
            ctx = cv.getContext('2d');

            player1 = new Cuadrado(super_x, super_y, 40, 40, 'red');
            player2 = new Cuadrado(generateRandomInteger(500), generateRandomInteger(500), 40, 40, 'yellow');

            obstaculo1 = new Cuadrado(70, 100, 40, 300, 'grey');
            obstaculo2 = new Cuadrado(390, 100, 40, 300, 'grey');
            obstaculo3 = new Cuadrado(250-(80/2), 250-(40/2), 80, 40, 'grey');


            abeja.src = 'abeja.png';
            flor.src = 'flor.png';
            pared.src = 'pared.png';

            sonido1.src = 'sonido.mp3';

            paint();
        }
        



        function paint()
        {
            window.requestAnimationFrame(paint);

            // Limpiar la pantalla
            ctx.fillStyle = "rgba(0,0,0)";
            ctx.fillRect(0,0,500,500);
            

            // Mostrar puntuacion
            ctx.fillStyle = "rgba(255,255,255)";
            ctx.font = "15px Arial";
            ctx.fillText('SCORE: '+score,20,30);


            // Mostrar jugador 1
            //player1.c = "rgba(36,20,247)";
            //player1.dibujar(ctx);
            ctx.drawImage(abeja, player1.x, player1.y);
            

            //Mostrar jugador 2
            //player2.dibujar(ctx);
            ctx.drawImage(flor, player2.x, player2.y);


            //Mostrar obstaculos
            // obstaculo1.dibujar(ctx);
            // obstaculo2.dibujar(ctx);
            // obstaculo3.dibujar(ctx);

            ctx.drawImage(pared, obstaculo1.x, obstaculo1.y, 40, 300);
            ctx.drawImage(pared,obstaculo2.x,obstaculo2.y, 40, 300);
            ctx.drawImage(pared,obstaculo3.x,obstaculo3.y, 80, 40);

            
            // Validar la pausa
            if (pause){
                ctx.fillStyle = "rgba(0,0,0,0.5)";
                ctx.fillRect(0,0,500,500);

                ctx.fillStyle = "rgba(255,255,255)";
                ctx.fillText('PAUSE',230,230);
            } else{
                update();
            }

            
        }




        // Se encarga de mover el cuadro con las coordenadas
        function update()
        {
            if(direction == 'rigth')
            {
                player1.x += speed;
                if(player1.x > 500){
                    player1.x = 0;
                }
            }

            if(direction == 'left')
            {
                player1.x -= speed;
                if(player1.x > 500){
                    player1.x = 0;
                }
            }

            if(direction == 'down')
            {
                player1.y += speed;
                if(player1.y > 500){
                    player1.y = 0;
                }
            }

            if(direction == 'up')
            {
                player1.y -= speed;
                if(player1.y > 500){
                    player1.y = 0;
                }
            }
            

            if(player1.se_tocan(player2)){
                player2.x = generateRandomInteger(500);
                player2.y = generateRandomInteger(500);

                score += 1;

                sonido1.play();
            }

            if(player1.se_tocan(obstaculo1) || player1.se_tocan(obstaculo2) || player1.se_tocan(obstaculo3)){
                speed = 0;

                
            }

        }




        document.addEventListener('keydown', function(e){
            console.log(e);

            // Arriba
            if(e.keyCode == 87 || e.keyCode == 38){
                direction = 'up'; 
            }

            // Abajo
            if(e.keyCode == 83 || e.keyCode == 40){
                direction = 'down';
            }

            // Izquierda
            if(e.keyCode == 65 || e.keyCode == 37){
                direction = 'left';
            }

            // Derecha
            if(e.keyCode == 68 || e.keyCode == 39){
                direction = 'rigth';
            }

            // Pausa
            if(e.keyCode == 32){
                pause = (pause)?false:true;
            }

        });





        // Cuando la ventana termina de cargar se ejecuta la funcion start
        window.addEventListener('load', start);




        window.requestAnimationFrame = (function () {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                function (callback) {
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

            this.dibujar = function(ctx)
            {
                ctx.fillStyle = this.c;
                ctx.fillRect(this.x, this.y, this.w, this.h);
                ctx.strokeRect(this.x, this.y, this.w, this.h);
            }

            this.se_tocan = function (target)
            { 
                if(this.x < target.x + target.w && 
                this.x + this.w > target.x && 
                this.y < target.y + target.h && 
                this.y + this.h > target.y)
                {
                    return true;  
                }  
            };

        }




        function random_rgba() {
            var o = Math.round, r = Math.random, s = 255;
            return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
        }

        function generateRandomInteger(max) {
            return Math.floor(Math.random() * max) + 1;
        }


    </script>


</body>
</html>