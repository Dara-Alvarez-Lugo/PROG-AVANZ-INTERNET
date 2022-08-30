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

        var sq = null;

        var game = true;
        var player = null;
        var finish = null;
        
        
        var direction = '';
        var speed = 1;
        var pause = false;

        var mario = new Image();
        var coin = new Image();
        var block = new Image();
        var side = new Image();

        var coinSound = new Audio();
        var themeSong = new Audio();


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
                //arrayWall[i].draw(ctx);
                ctx.drawImage(block, arrayWall[i].x, arrayWall[i].y);
            }

            for(i in arrayFloor){
                arrayFloor[i].draw(ctx);
            }

            for(i in arrayRoute){
                arrayRoute[i].draw(ctx);
            }

            // Mostrar lateral
            //player.draw(ctx);
            ctx.drawImage(side, 960, 0, 200, 1160);
            

            // Mostrar jugador
            //player.draw(ctx);
            ctx.drawImage(mario, player.x, player.y);

            // Mostrar final
            //finish.draw(ctx);
            ctx.drawImage(coin, finish.x, finish.y);
            
            
            // Realizar pausa
            if (pause){
                ctx.fillStyle = "rgba(0,0,0,0.5)";
                ctx.fillRect(0, 0, cv.width, cv.height);

            } else{
                update();
            }


            
        }




        // Mover jugador
        function update()
        {
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
                if(player.x > cv.width){
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
                if(player.y > cv.height){
                    player.y = 0;
                }
            }



            // Validar colisiones
            for(i in arrayWall){
                if(player.checkCollision(arrayWall[i])){
                    // pendiente
                }
            }

            // Validar fin del juego
            if(player.checkCollision(finish)){
                // game = false;
                // pendiente
                coinSound.play();
            }
            

        }




        document.addEventListener('keydown', function(e)
        {
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
                pause = (pause) ? false : true;
            }


            // Ruta
            if(e.keyCode == 82){
                for(i in arrayRoute){
                    arrayRoute[i].c = 'blue';
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
                // ctx.strokeRect(this.x, this.y, this.w, this.h);
            }

            this.checkCollision = function (target)
            { 
                if(this.x < target.x + target.w && 
                    this.x + this.w > target.x && 
                    this.y < target.y + target.h && 
                    this.y + this.h > target.y){
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