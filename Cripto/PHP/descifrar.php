<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="../JS/FileSaver.js"></script>
    <script src="../JS/descifrado.js"></script>

    <title>Descifrar</title>
</head>

<body background="#212121">
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
        <h1>Sistema de Cifrado Simétrico: <b>Descifra</b></h1>
        <div class="login-form">
            <br>
            <textarea id="contenido" cols="80" class="form-control" placeholder="Ingresa el mensaje a descifrar.."></textarea>
            <br>
            <input type="file" id="archivos" class="btn btn-primary" accept="application/pdf, text/plain, application/msword">
            <br>
            <br>
            <textarea id="clave" class="form-control" placeholder="Ingresa la contraseña establecida previamente..."></textarea>
            <br>
            <button type="submit" class="btn btn-danger" id="descifrado">¡Descifrar!</button>
            <br>
            <!-- <h4>Mensaje descifrado Hexadecimal</h4> -->
            <div>
                <input id="mensaje-descifrado-hex" hidden="true" class="control" cols="80" rows="4" readonly>
            </div>
            <br>
            <h4>Mensaje descifrado</h4>
            <textarea id="mensaje-descifrado" class="form-control" cols="80" rows="4" readonly></textarea>
            <br>
            <h4>Descargar Documento</h4>
            <button type="submit" class="btn btn-primary" id="descargar_txt">Archivo TXT</button>
            <!-- <button type="submit" class="btn btn-outline-primary" id="descargar_pdf">PDF</button>
            <button type="submit" class="btn btn-outline-primary" id="descargar_doc">DOC</button> -->
            <br><br>
        </div>
    </center>

    <script>
        $('#descargar_txt').click(function() {
            var cifrado = document.getElementById('mensaje-descifrado').value;
            if (cifrado == "") {
                alert("Se debe de descifrar un texto");
            } else {
                var blob = new Blob([cifrado], {
                    type: "text/plain;charset=utf-8"
                });
                saveAs(blob, "Mensaje_Descifrado.txt");
            }
        });
    </script>

    <!--
    <script>
        $('#descargar_doc').click(function() {
            var cifrado = document.getElementById('mensaje-descifrado').value;
            if (cifrado == "") {
                alert("Se debe de descifrar un texto");
            } else {
                var blob = new Blob([cifrado], {
                    type: "text/plain;charset=utf-8"
                });
                saveAs(blob, "Mensaje_Descifrado.doc");
            }
        });
        $('#descargar_pdf').click(function() {
            var cifrado = document.getElementById('mensaje-descifrado').value;
            if (cifrado == "") {
                alert("Se debe de descifrar un texto");
            } else {
                var blob = new Blob([cifrado], {
                    type: "text/plain;charset=utf-8"
                });
                saveAs(blob, "Mensaje_Descifrado.pdf");
            }
        });
    </script>
    -->

    <script>
        function abrirArchivos(evento) {
            let archivo = evento.target.files[0];
            if (archivo) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let contenido = e.target.result;
                    document.getElementById('contenido').value = contenido;
                };
                reader.readAsText(archivo);
            }
        }
        window.addEventListener('load', () => {
            document.getElementById('archivos').addEventListener('change', abrirArchivos);
        });
    </script>
</body>

</html>