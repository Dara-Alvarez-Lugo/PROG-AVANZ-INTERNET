<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
</head>
<body>
    <canvas id="mycanvas" width=840 height=1015>
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
        var arrayRoad = new Array();

        var sq = null;

        var player = null;
        
        
        var direction = 'rigth';
        var speed = 1;
        var pause = false;


        function createMaze()
        {
            // 1-Wall   2-Floor   3-Road
            maze = [
                ["1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1","1"],
                ["1","1","1","1","1","1","1","1","1","1","2","2","2","2","2","2","2","2","2","2","1","2","2","2","2","2","2","2","1"],
                ["1","3","3","3","1","2","2","2","2","2","2","2","1","1","1","1","1","1","1","2","1","2","1","1","1","1","1","2","1"],
                ["1","3","1","3","1","1","2","1","1","1","1","1","1","1","1","1","1","2","1","2","1","2","1","1","1","1","1","1","1"],
                ["1","3","1","3","1","1","2","1","2","2","1","1","3","3","3","1","1","2","1","1","1","2","2","2","2","2","2","1","1"],
                ["1","3","1","3","2","2","2","1","1","2","1","1","3","1","3","1","1","1","1","2","1","1","1","1","1","1","2","1","1"],
                ["1","3","1","3","1","1","1","1","1","2","1","1","3","1","3","1","1","1","1","2","1","1","1","1","1","1","2","1","1"],
                ["1","3","1","3","1","1","1","1","1","2","1","1","3","1","3","1","1","1","1","2","1","1","1","1","1","1","2","1","1"],
                ["1","3","1","3","1","1","1","2","2","2","2","2","3","1","3","3","3","1","1","2","1","1","1","1","1","2","2","1","1"],
                ["1","3","1","3","1","1","1","2","1","1","1","1","3","1","1","1","3","1","1","3","3","3","3","3","3","3","1","1","1"]
    
            ];

        }

        function fillArrays()
        {

            createMaze();

            for(var i = 0; i < 9; i++)
            {
                for(var j = 0; j < 29; j++)
                {

                    coordinateX = i * 35;
                    coordinateY = j * 35;


                    if(maze[i][j] == 1){

                        sq = new Square(coordinateX,coordinateY, 35, 35,'red');
                        arrayWall.push(sq);


                    }else if(maze[i][j] == 2){

                        sq = new Square(coordinateX,coordinateY, 35, 35, 'white');
                        arrayFloor.push(sq);

                    }else if(maze[i][j] == 3){
                        
                        sq = new Square(coordinateX,coordinateY, 35, 35, 'green');
                        arrayRoad.push(sq);
                        
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

            player = new Square(200, 200, 15, 15, 'yellow');

            paint();
        }
        



        function paint()
        {
            window.requestAnimationFrame(paint);


            // Mostrar laberinto
            for(i in arrayWall){
                arrayWall[i].draw(ctx);
            }

            for(i in arrayFloor){
                arrayFloor[i].draw(ctx);
            }

            for(i in arrayRoad){
                arrayRoad[i].draw(ctx);
            }
            

            // Mostrar jugador
            // player.draw(ctx);
            
            
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
                ctx.strokeRect(this.x, this.y, this.w, this.h);
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