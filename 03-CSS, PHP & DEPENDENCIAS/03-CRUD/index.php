<?php

include "app/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS, PHP & DEPENDENCIAS</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <style type="text/css">
        .registro{  
            min-height: 600px;
        }
    </style>
</head>
<body>

<div class="container recolor">

    <section>
        <div class="row registro justify-content-md-center align-items-center">
            <div class="col-md-6 col-sm-12 p-3 border">

                <form method="post" action="<?= BASE_PATH ?>auth">

                    <h1>Acceso al panel</h1>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati doloremque perferendis non esse veniam, officiis at, tempore quas corporis pariatur, ut sapiente doloribus nesciunt. Fugit voluptates ea cumque esse? Soluta.</p>

                    <label for="">Username</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input name="email" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <label for="">Password</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <button class="btn btn-primary col-12" type="submit">Acceder</button>


                    <input type="hidden" name="action" value="access">

                    <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">


                </form>

            </div>

        </div>
    </section>


</div>
    
</body>
</html>