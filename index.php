<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Herfchan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="res/css_custom.css">
    <link rel="icon" size="16x16" href="favicon.ico">
</head>
<body>
    <div class="container">
        <center><img src="res/herf.png" alt="" class="img-fluid" style="width: 50%;"></center>
    </div>

    <div class="container">
        <div class="card" style="width: 70rem;">
            <div class="card-header">
                <h5 class="card-title text-center">¿Qué es Herf?</h5>
            </div>
            <div class="card-body">
                <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Aenean consectetur luctus mi, at mattis turpis. Sed est nisl, euismod quis tellus id, ultrices viverra diam. Pellentesque fringilla ultricies justo. Fusce sem ex, consectetur et eros non, convallis tempus sapien. Sed ornare urna quis rutrum dapibus. Proin vulputate magna sit amet lorem ullamcorper, at cursus purus dapibus. Aenean vehicula sapien odio, eget pharetra libero cursus eu.
                Sed volutpat pharetra ligula, et ullamcorper diam commodo id. 
                Proin sit amet lacus tempus, pharetra dui in, congue nibh. 
                Nulla non cursus risus. Aliquam tempor sagittis ipsum quis mollis. 
                Nam interdum justo enim, quis vulputate urna viverra eu. Morbi at gravida diam, ac lacinia risus. 
                Quisque massa nibh, malesuada sit amet eros facilisis, consequat tincidunt risus. 
                Ut pretium mollis lacus, sed euismod erat pulvinar in. Aenean ultricies lectus vitae ex rhoncus laoreet. 
                Proin tristique sed libero ac dapibus. </p>
            </div>
        </div>
    </div>

    <br>

        <div class="container text-right">
            <img src="res/herfito.jpg" alt="" class="img-thumbnail rounded float-right" style="width: 45%;">
        </div>

    <div class="container">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title text-center">General</h5>
                </div>
                <div class="card-body">
                <p class="card-text">
                        <a href="./view/h/index.php">► /h/ - Herf</a><br>
                        <a href="./view/o/index.php">► /o/ - oyeoyeoye</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>

    <?php
        require_once("model/Data.php");
        $d = new Data();
        $stats = $d->verStats("board");

        echo "<div class='container'>";
        echo "<div class='card' style='width: 18rem;'>";
            echo "<div class='card-header'>";
            echo "<h5 class='card-title text-center'>Estadísticas</h5>";
            echo "</div>";
            echo "<div class='card-body'>";
                
            echo "<p class='card-text'>";

            foreach($stats as $s) {
                echo "<h8> ► Cantidad de Boards: ".$s[0]." </h8>";
            }

            echo "<br>";

            $stats2 = $d->verStats("postUser");

            foreach($stats2 as $s2) {
                echo "<h8> ► Cantidad de Usuarios: ".$s2[0]." </h8>";
            }

            echo "<br>";

            $stats3 = $d->verStats("post");

            foreach($stats2 as $s2) {
                echo "<h8> ► Cantidad de Posts: ".$s2[0]." </h8>";
            }

            echo "<br>";

            $stats3 = $d->verStats("thread");

            foreach($stats3 as $s3) {
                echo "<h8> ► Cantidad de Threads: ".$s3[0]." </h8>";
            }

            echo "<br>";

            $stats4 = $d->verStats("reply");

            foreach($stats4 as $s4) {
                echo "<h8> ► Cantidad de Replies: ".$s4[0]." </h8>";
            }


        echo "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

    ?>

    <br>
    <br>
    <br>

    <center><p>Copyright © 2018 Herfchan community support LLC. All rights reserved. </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>