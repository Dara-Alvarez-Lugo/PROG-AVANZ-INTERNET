<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
</head>
<body>
    <canvas id="mycanvas" width=1160 height=1160>
        <!-- Si el texto aparece es porque tu navegador no soporta canvas -->
        Tu navegador no soporta canvas
    </canvas>

    <script type="text/javascript">


        var cv = null;
        var ctx = null;

        var coordinateX = null;
        var coordinateY = null;

        var maze = new Array();
        var arrayWall = new Array();
        var arrayFloor = new Array();
        var arrayRoute = new Array();

        var game = true;
        var pause = false;

        var sq = null;

        var player = null;
        var finish = null;
        
        var direction = '';
        var speed = 2;
        
        var mario = new Image();
        var coin = new Image();
        var block = new Image();
        var side = new Image();
    
        var coinSound = new Audio();
        var themeSong = new Audio();

        var pauseTime = false;

        var hours = 0;
        var minutes = 0;
        var seconds = 0;

        var timeHours = '';
        var timeMinutes = '';
        var timeSeconds = '';
        var time = '00:00:00';


        function createMaze()
        {
            // 1-Wall   2-Floor   3-Road
            maze = [
                ["1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"],
                ["1","1","1","1","1","1","1","1","1","1","2","2","2","2","2","2","2","2","2","2","1","2","2","2","2","2","2","2","1"],
                ["1","3","3","3","1","2","2","2","2","2","2","2","1","1","1","1","1","1","1","2","1","2","1","1","1","1","1","2","1"],
                ["1","3","1","3","1","1","2","1","1","1","1","1","1","1","1","1","1","2","1","2","1","2","1","1","1","1","1","1","1"],
                ["1","3","1","3","1","1","2","1","2","2","1","1","3","3","3","1","1","2","1","1","1","2","2","2","2","2","2","1","1"],
                ["1","3","1","3","2","2","2","1","1","2","1","1","3","1","3","1","1","2","2","2","1","1","1","1","1","1","2","1","1"],
                ["1","3","1","3","1","1","1","1","1","2","1","1","3","1","3","1","1","1","1","2","1","1","1","1","1","1","2","1","1"],
                ["1","3","1","3","1","1","1","2","2","2","2","2","3","1","3","3","3","1","1","2","1","1","1","1","1","2","2","1","1"],
                ["1","3","1","3","1","1","1","2","1","1","1","1","3","1","1","1","3","1","1","3","3","3","3","3","3","3","1","1","1"],
                ["1","3","1","3","1","2","1","1","1","1","1","1","3","1","1","1","3","1","1","3","1","1","1","1","1","3","1","1","1"], //10
                ["1","3","1","3","1","2","1","1","1","1","1","1","3","1","1","3","3","1","1","3","1","1","1","1","1","3","3","3","3"],
                ["1","3","1","3","1","2","1","1","1","3","3","3","3","1","1","3","1","1","1","3","1","1","1","1","1","1","1","1","1"],
                ["1","3","1","3","3","3","3","3","1","3","1","1","1","1","1","3","1","1","1","3","1","3","3","3","3","1","1","1","1"],
                ["1","3","1","1","1","1","1","3","3","3","1","1","1","1","1","3","3","3","1","3","3","3","1","1","3","1","1","1","1"],
                ["1","3","3","3","3","1","1","3","1","1","1","3","3","3","1","1","1","3","1","1","1","1","1","1","3","3","3","1","1"],
                ["1","1","1","1","3","1","3","3","1","1","1","3","1","3","1","1","1","3","3","3","3","3","3","1","1","1","3","1","1"],
                ["1","1","3","3","3","1","3","1","1","1","1","3","1","3","3","3","1","1","1","1","1","1","3","1","1","1","3","1","1"],
                ["3","3","3","1","1","1","3","1","1","1","1","3","1","1","1","3","3","3","3","1","1","1","3","3","3","3","3","1","1"],
                ["1","1","1","1","2","2","3","1","1","2","1","3","1","1","1","1","1","1","3","3","3","1","1","1","1","1","3","1","1"],
                ["1","1","1","1","2","1","3","1","1","2","1","3","1","1","2","2","1","1","2","1","3","1","1","1","1","1","3","1","1"],
                ["1","1","1","1","2","1","3","1","1","2","1","3","3","1","2","1","1","1","2","1","3","1","1","3","3","3","3","1","1"],
                ["1","1","2","2","2","1","3","1","1","2","1","1","3","1","2","1","2","2","2","1","3","3","1","3","1","1","1","1","1"],
                ["1","1","1","1","1","1","3","3","3","3","3","3","3","1","2","2","2","1","1","1","1","3","3","3","1","1","1","1","1"],
                ["1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"]
            ];

        }

        function fillArrays()
        {
            createMaze();

            for(var i = 0; i < 24; i++)
            {
                for(var j = 0; j < 29; j++)
                {

                    coordinateX = i * 40;
                    coordinateY = j * 40;


                    if(maze[i][j] == 1){

                        sq = new Square(coordinateX,coordinateY, 40, 40,'red');
                        arrayWall.push(sq);


                    }else if(maze[i][j] == 2){

                        sq = new Square(coordinateX,coordinateY, 40, 40, 'white');
                        arrayFloor.push(sq);

                    }else if(maze[i][j] == 3){
                        
                        sq = new Square(coordinateX,coordinateY, 40, 40, 'white');
                        arrayRoute.push(sq);
                        
                    }

                }


            }

        }
        


        window.setInterval(() => 
        {
            if(!pauseTime)
            {
                seconds++;            

                if(seconds >= 60){
                    seconds = 0;
                    minutes++;
                }

                if(minutes >= 60){
                    minutes = 0;
                    hours++;
                }


                // Formato a los numeros
                if(hours < 10){
                    timeHours = '0' + hours; 
                } else{
                    timeHours = hours;
                }

                if(minutes < 10){
                    timeMinutes = '0' + minutes; 
                } else{
                    timeMinutes = minutes; 
                }

                if(seconds < 10){ 
                    timeSeconds = '0' + seconds; 
                } else{
                    timeSeconds = seconds;
                }
            
                // Variable con la hora y formatos correctos
                time = timeHours +":"+ timeMinutes +":"+ timeSeconds;


            }
            
            
            
        }, 1000);



        function start()
        {
            cv = document.getElementById('mycanvas');
            ctx = cv.getContext('2d');
            ctx.strokeRect(0, 0, cv.width, cv.height);

            fillArrays();

            player = new Square((17.5*40)-(35/2), 0, 35, 35, 'red');
            finish = new Square((10.5*40)-(30/2), (27.2*40)+(30), 30, 35, 'pink');


            mario.src = 'img/mario.png';
            block.src = 'img/block.png';
            coin.src = 'img/coin.png';
            side.src = 'img/side.png';

            coinSound.src = 'sound/coinSound.mp3';
            themeSong.src = 'sound/themeSong.mp3';



            paint();
        }
        


        function paint()
        {
            window.requestAnimationFrame(paint);


            // Mostrar laberinto
            for(i in arrayWall){
                ctx.drawImage(block, arrayWall[i].x, arrayWall[i].y);
            }

            for(i in arrayFloor){
                arrayFloor[i].draw(ctx);
            }

            for(i in arrayRoute){
                arrayRoute[i].draw(ctx);
            }

            // Mostrar lateral
            ctx.drawImage(side, 960, 0, 200, 1160);
            
            ctx.fillStyle = "white";
            ctx.font = "30px Arial";
            ctx.fillText('T I M E', 960+50, 100);


            // Mostrar tiempo
            ctx.fillStyle = "white";
            ctx.font = "20px Arial";
            ctx.fillText(time, 960+60, 150);
            
            // Mostrar controles
            ctx.fillStyle = "white";
            ctx.font = "20px Arial";
            ctx.fillText('CONTROLS', 960+40, 290);
            ctx.fillStyle = "white";
            
            ctx.font = "15px Arial";
            ctx.fillText('W = UP', 960+40, 330);
            ctx.fillText('A = LEFT', 960+40, 360);
            ctx.fillText('S = DOWN', 960+40, 390);
            ctx.fillText('D = RIGHT', 960+40, 420);
            ctx.fillText('R = HELP', 960+40, 450);
            ctx.fillText('SPACE = PAUSE', 960+40, 480);

            
            // Mostrar jugador
            ctx.drawImage(mario, player.x, player.y);

            // Mostrar final
            ctx.drawImage(coin, finish.x, finish.y);
            
            
        
            if (pause){ // Realizar pausa
                ctx.fillStyle = "rgba(0,0,0,0.5)";
                ctx.fillRect(0, 0, cv.width, cv.height);

                ctx.fillStyle = "white";
                ctx.font = "bold 60px Arial";
                ctx.fillText('P A U S E', (cv.width/2)-140, cv.height/2);

                pauseTime = true;

            } else if(!game){ // Finalizar juego
                // Cubrir moneda
                ctx.fillStyle = "white)";
                ctx.fillRect(finish.x, finish.y, 30, 35);

                ctx.fillStyle = "rgba(0,0,0,0.5)";
                ctx.fillRect(0, 0, cv.width, cv.height);

                ctx.fillStyle = "white";
                ctx.font = "bold 60px Arial";
                ctx.fillText('W I N', (cv.width/2)-80, cv.height/2);

                pauseTime = true;

                
            }else{
                update();
                pauseTime = false;
            }

            
        }

        




        function update()
        {
            
            // Sonido de fondo
            themeSong.play();
            themeSong.loop = true;


            if(direction == 'rigth')
            {   
                player.x += speed;
                if(player.x > cv.width){
                    player.x = 0;
                }
            }

            if(direction == 'left')
            {
                player.x -= speed;
                if(player.x < 0){
                    player.x = 0;
                }
            }


            if(direction == 'down')
            {
                player.y += speed;
                if(player.y > cv.height){
                    player.y = 0;
                }
            }

            if(direction == 'up')
            {
                player.y -= speed;
                if(player.y < 0){
                    player.y = 0;
                }
            }



            // Validar colisiones
            for(i in arrayWall){
                if(player.checkCollision(arrayWall[i]))
                {
                    if (direction == 'rigth') {
                        player.x -= speed;
                    }   

                    if (direction == 'left') {
                        player.x += speed;
                    }

                    if (direction == 'down') {
                        player.y -= speed;
                    }

                    if (direction == 'up') {
                        player.y += speed;
                    }
                }
            }

            // Validar fin del juego
            if(player.checkCollision(finish)){
                game = false;
                
                // Sonido
                coinSound.play();
                themeSong.loop = false;

            }
            

        }






        document.addEventListener('keydown', function(e)
        {
            // Arriba
            if(e.keyCode == 87 || e.keyCode == 38){
                speed = 2;
                direction = 'up'; 
            }

            // Abajo
            if(e.keyCode == 83 || e.keyCode == 40){
                speed = 2;
                direction = 'down';
            }

            // Izquierda
            if(e.keyCode == 65 || e.keyCode == 37){
                speed = 2;
                direction = 'left';
            }

            // Derecha
            if(e.keyCode == 68 || e.keyCode == 39){
                speed = 2;
                direction = 'rigth';
            }

            
            // Pausa
            if(e.keyCode == 32){
                pause = (pause) ? false : true;
            }


            // Ruta
            if(e.keyCode == 82){
                for(i in arrayRoute){
                    arrayRoute[i].c = 'green';
                }
            }

        });



        document.addEventListener('keyup', function(e){
            console.log(e.keyCode);

            // Arriba
            if(e.keyCode == 87 || e.keyCode == 38){
                speed = 0;
            }

            // Abajo
            if(e.keyCode == 83 || e.keyCode == 40){
                speed = 0;
            }

            // Izquierda
            if(e.keyCode == 65 || e.keyCode == 37){
                speed = 0;
            }

            // Derecha
            if(e.keyCode == 68 || e.keyCode == 39){
                speed = 0;
            }

            if(e.keyCode == 82){
                for(i in arrayRoute){
                    arrayRoute[i].c = 'white';
                }
            }

            

        });





        function Square(x,y,w,h,c)
        {
            this.x = x;
            this.y = y;
            this.w = w;
            this.h = h;
            this.c = c;

            this.draw = function(ctx)
            {
                ctx.fillStyle = this.c;
                ctx.fillRect(this.x, this.y, this.w, this.h);
            }

            this.checkCollision = function (target)
            {
                if(this.x < target.x + target.w && //derecha a izquierda
                    this.x + this.w > target.x && //izquierda a derecha
                    this.y < target.y + target.h && // abajo a arriba
                    this.y + this.h > target.y){ //arriba a abajo
                    return true;  
                }

            };

        }


        
        window.addEventListener('load', start);


        window.requestAnimationFrame = (function () {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                function (callback) {
                    window.setTimeout(callback, 17);
                };
        }());




    </script>


</body>
</html>