<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>/h/ - Herf</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../res/css_custom.css">
</head>
<body>
    <div class="container text-center">
        <h1>/h/ - Herf</h1>

        <br>
    </div>

    <div class="container border border-secondary">
        <center><h4>Crear un Nuevo Hilo:</h4></center>

        <form action="../../controller/crearPost.php" method="post">
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

            <input type="hidden" id="board" name="board" value="/h/">
            <input type="hidden" id="location" name="location" value="../view/h/index.php">
            
            <input class="btn btn-primary" type="submit" value="Postear" role="button">
        </form>
        <br>
    </div>
</body>
</html>