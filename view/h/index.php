<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>/h/ - Herf</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../res/css_custom.css">
    <link rel="icon" size="16x16" href="../../favicon.ico">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF0DF;">
            <a href="../../index.php">
                <img src="../../res/herfCube.png" alt="" class="img-fluid" style="width: 30%">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Boards
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../h/index.php">/h/ - Herf</a>
                            <a class="dropdown-item" href="../o/index.php">/o/ - oyeoyeoye</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <br>

    <div class="container text-center">
        <img src="../../res/banner/herf.jpg" alt="" class="img-thumbnail" style="width: 25%;">
    </div>

    <br>

    <div class="container text-center">
        <h1>/h/ - Herf</h1>
        <br>
    </div>
    
    <center><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#crearThread" aria-expanded="false" aria-controls="crearThread">Crear Nuevo Hilo</button></center>

    <br>

    <div class="collapse" id="crearThread">
        <div class="container border border-secondary">
            <form action="../../controller/crearThread.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usuario">Nombre:</label>
                    <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Herfino" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input class="form-control" type="text" name="titulo" id="titulo" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="comentario">Comentario:</label>
                    <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
                </div>

                <input type="hidden" id="board" name="board" value="/h/">
                <input type="hidden" id="location" name="location" value="../view/h/index.php">
                <input type="file" class="form-control-file" id="imagen" name="imagen">
                <br>

                <input class="btn btn-primary" type="submit" name="submit" value="Postear" role="button" data-toggle="modal" data-target="#popOk">
            </form>
            <br>
        </div>
    </div>

    <br>

        <div class="modal fade" id="popOk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Éxito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                Post Hecho
            </div>
        </div>
    </div>
    </div>


    <?php
        require_once("../../model/Data.php");
        $d = new Data();
        $threads = $d->verThread("/h/");


        foreach($threads as $t) {
            echo "<div class='container'>";
                echo "<div class='row'>";
                    echo "<div class='col-sm border'>";
                        echo "<h6 style='float: left' class='font-weight-bold text-primary'>".$t[1]."  </h6>";
                        echo "<h6 style='float: left' class='text-success'>".$t[4]."</h6>";
                        echo "<h6>  No. ".$t[0]."  <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#threadOK".$t[0]."'>Responder</button>"."</h6>";

                        echo "<div class='modal fade' id='threadOK".$t[0]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                            echo "<div class='modal-dialog' role='document'>";
                                echo "<div class='modal-content'>";
                                    echo "<div class='modal-header'>";
                                        echo "<h5 class='modal-title' id='exampleModalLabel'>Responder</h5>";
                                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                                            echo "<span aria-hidden='true'>&times;</span>";
                                        echo "</button>";
                                    echo "</div>";

                                    echo "<div class='modal-body'>";
                                        echo "<form action='../../controller/crearPost.php' method='post' enctype='multipart/form-data'>";
                                            echo "<div class='form-group'>";
                                                echo "<label for='usuario'>Nombre:</label>";
                                                echo "<input class='form-control' type='text' name='usuario' id='usuario' placeholder='Herfino' autocomplete='off'>";
                                            echo "</div>";

                                            echo "<div class='form-group'>";
                                                echo "<label for='comentario'>Mensaje:</label>";
                                                echo "<textarea class='form-control' name='mensaje' id='mensaje' rows='3'></textarea>";
                                            echo "</div>";

                                            echo "<input type='hidden' id='board' name='board' value='/h/'>";
                                            echo "<input type='hidden' id='location' name='location' value='../view/h/index.php'>";
                                            echo "<input type='hidden' id='idThread' name='idThread' value=".$t[0].">";

                                            echo "<input type='file' class='form-control-file' id='imagen' name='imagen'>
                                            <br>";

                                            echo "<input class='btn btn-primary' type='submit' value='Postear' role='button'>";
                                        echo "</form>";
                                    echo "</div>";
                                echo "</div>";

                            echo "</div>";
                        echo "</div>";

                        echo "<p>";
                            if($t[5] != NULL) {
                                echo "<a data-toggle='modal' data-target='#img".$t[0]."' href='../../res/content/".$t[5]."'><img src='../../res/content/".$t[5]."' class='img-fluid' style='max-width: 10%'></a>";
                            }
                            echo "  ".$t[2];
                        echo "</p>";
                        
                        echo "<div class='modal fade' id='img".$t[0]."' tabindex='-1' role='dialog'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>".$t[5]."</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            <img src='../../res/content/".$t[5]."' class='img-fluid'>
                                        </div>
                                    </div>
                                </div>
                            </div>";

                        $posts = $d->verPosts($t[0]);

                        foreach($posts as $p) {
                            echo "<div class='container'>";
                                echo "<div class='row'>";
                                    echo "<div class='col-sm border'>";
                                    echo "<h6 style='float: left' class='text-success'>".$p[4]."</h6>";
                                    echo "<h6>  No. ".$p[1]."</h6>";

                                        echo "<p>";
                                            if($p[6] != NULL) {
                                                echo "<a data-toggle='modal' data-target='#img".$p[1]."' href='../../res/content/".$p[6]."'><img src='../../res/content/".$p[6]."' class='img-fluid' style='max-width: 10%'></a>";
                                            }
                                            echo "  ".$p[2];
                                        echo "</p>";

                                        echo "<div class='modal fade' id='img".$p[1]."' tabindex='-1' role='dialog'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title'>".$p[6]."</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <img src='../../res/content/".$p[6]."' class='img-fluid'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                    
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        }

                    echo "</div>";  
                echo "</div>";
            echo "</div>";
        }


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