<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>/o/ - oyeoyeoye</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../res/css_custom.css">
    <link rel="icon" size="16x16" href="../../favicon.ico">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="../../index.php">
                <img src="../../res/herfCube.png" alt="" class="img-fluid" style="width: 30%">
            </a>
        </nav>
    </div>

    <br>

    <div class="container text-center">
        <img src="../../res/banner/herf_colocolo.jpg" alt="" class="img-thumbnail" style="width: 25%;">
    </div>

    <br>

    <div class="container text-center">
        <h1>/o/ - oyeoyeoye</h1>
        <br>
    </div>
    
    <center><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#postear" aria-expanded="false" aria-controls="postear">Crear Nuevo Hilo</button></center>

    <br>

    <div class="collapse" id="postear">
        <div class="container border border-secondary">
            <form action="../../controller/crearThread.php" method="post">
                <div class="form-group">
                    <label for="usuario">Nombre:</label>
                    <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Herfino">
                </div>

                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input class="form-control" type="text" name="titulo" id="titulo">
                </div>

                <div class="form-group">
                    <label for="comentario">Comentario:</label>
                    <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
                </div>

                <input type="hidden" id="board" name="board" value="/o/">
                <input type="hidden" id="location" name="location" value="../view/o/index.php">
                
                <input class="btn btn-primary" type="submit" value="Postear" role="button" role="button" data-toggle="modal" data-target="#popOk">
            </form>
            <br>
        </div>
    </div>


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
        $threads = $d->verThread("/o/");


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
                                        echo "<form action='../../controller/crearPost.php' method='post'>";
                                            echo "<div class='form-group'>";
                                                echo "<label for='usuario'>Nombre:</label>";
                                                echo "<input class='form-control' type='text' name='usuario' id='usuario' placeholder='Herfino'>";
                                            echo "</div>";

                                            echo "<div class='form-group'>";
                                                echo "<label for='comentario'>Mensaje:</label>";
                                                echo "<textarea class='form-control' name='mensaje' id='mensaje' rows='3'></textarea>";
                                            echo "</div>";

                                            echo "<input type='hidden' id='board' name='board' value='/o/'>";
                                            echo "<input type='hidden' id='location' name='location' value='../view/o/index.php'>";
                                            echo "<input type='hidden' id='idThread' name='idThread' value=".$t[0].">";

                                            echo "<input class='btn btn-primary' type='submit' value='Postear' role='button'>";
                                        echo "</form>";
                                    echo "</div>";
                                echo "</div>";

                            echo "</div>";
                        echo "</div>";

                        echo "<p>";
                            echo "".$t[2];
                        echo "</p>";

                        $posts = $d->verPosts($t[0]);

                        foreach($posts as $p) {
                            echo "<div class='container'>";
                                echo "<div class='row'>";
                                    echo "<div class='col-sm border'>";
                                    echo "<h6 style='float: left' class='text-success'>".$p[4]."</h6>";
                                    echo "<h6>  No. ".$p[1]."</h6>";

                                        echo "<p>";
                                            echo "".$p[2];
                                        echo "</p>";
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