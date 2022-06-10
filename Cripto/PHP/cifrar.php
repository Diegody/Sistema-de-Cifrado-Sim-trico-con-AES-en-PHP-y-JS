<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="../JS/FileSaver.js"></script>
    <script src="../JS/cifrado.js"></script>

    <title>Cifrar</title>
</head>

<body class="" background="https://www.teahub.io/photos/full/297-2979845_arte-abstracto-azul-degradado-amarillo-4k-ultra-hd.jpg">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img id="logo" class="logoc" src="https://cdn-icons-png.flaticon.com/512/2810/2810149.png">
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="cifrar.php">Cifrar</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="descifrar.php">Descifrar</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Chat</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="login.php">Salir</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <center>
        <h1>Sistema de Cifrado Simétrico: <b>Cifra</b></h1><br>
        <div class="login-form">
            <textarea class="form-control" placeholder="Ingresa el mensaje a cifrar..." id="mensaje"></textarea>
            <br>
            <textarea class="form-control" placeholder="Ingresa la contraseña numerica..." id="clave"></textarea>
            <br>
            <h4>Selecciona el tipo de cifrado</h4>
            <input class="form-check-input" type="radio" name="tipo-cifrado" id="AES-128" value="AES-128">Advanced Encryption Standard (AES)
            <br>
            <br>
            <!-- <input class="form-check-input" type="radio" name="tipo-cifrado" id="AES-192" value="AES-192">AES-192
            <br>
            <br>
            <input class="form-check-input" type="radio" name="tipo-cifrado" id="AES-256" value="AES-256">AES-256
            <br>
            <br> -->
            <button type="submit" class="btn btn-success" id="cifrado">¡Cifrar!</button>
            <br>
            <br>
            <h4>Mensaje cifrado</h4>
            <textarea class="form-control" cols="80" rows="4" id="mensaje-cifrado" readonly></textarea>
            <br>
            <h4>Descargar Documento</h4>
            <button type="submit" class="btn btn-primary" id="descargar_txt">Archivo TXT</button>
            <!-- <button type="submit" class="btn btn-outline-primary" id="descargar_pdf">PDF</button>
            <button type="submit" class="btn btn-outline-primary" id="descargar_doc">DOC</button> -->
            <br>
        </div>
    </center>
    <br>
    <br>
    <script>
        $('#descargar_txt').click(function() {
            var cifrado = document.getElementById('mensaje-cifrado').value;
            if (cifrado == "") {
                alert("Se debe de cifrar un texto");
            } else {
                var blob = new Blob([cifrado], {
                    type: "text/plain;charset=utf-8"
                });
                saveAs(blob, "Mensaje_Cifrado.txt");
            }
        });
    </script>
    <!--
    <script>   
        $('#descargar_doc').click(function() {
            var cifrado = document.getElementById('mensaje-cifrado').value;
            if (cifrado == "") {
                alert("Se debe de cifrar un texto");
            } else {
                var blob = new Blob([cifrado], {
                    type: "text/plain;charset=utf-8"
                });
                saveAs(blob, "Mensaje_Cifrado.doc");
            }
        });
        $('#descargar_pdf').click(function() {
            var cifrado = document.getElementById('mensaje-cifrado').value;
            if (cifrado == "") {
                alert("Se debe de cifrar un texto");
            } else {
                var blob = new Blob([cifrado], {
                    type: "text/plain;charset=utf-8"
                });
                saveAs(blob, "Mensaje_Cifrado.pdf");
            }
        }); 
    </script>
    -->

</body>

</html>