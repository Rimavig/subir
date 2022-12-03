<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sorteo</title>
</head>
<body>
    <img src="images/fondo-ganador.png" class="backgorund-image-employee" alt="" srcset="">
    <img src="images/confeti.gif?random=<?php echo(rand()); ?>" class="" style="position: absolute; width: 100%; height: 100%;" alt="" srcset="">
    <div class="d-flex flex-row margin-top-2 width-100 position-absolute margin-auto">
        <div class="d-flex flex-column width-100">
            <div class="d-flex flex-row padding-top-3">
              <div class="margin-auto">
                  <img src="images/logo_banco.png" class="logo_banco" alt="" srcset="">
              </div>
                <div class="margin-auto">
                    <button style="display: contents;" onclick="window.location.href='select-winner.html';" ><h1 class="winner-label">¡¡FELICIDADES!!</h1></button>

                </div>
                <div class="margin-auto">
                    <img src="images/logo_banco.png" class="logo_banco" alt="" srcset="">
                </div>
            </div>
            <div class="d-flex flex-column">
                <div class="border-1">
                    <div class="border-2">
                        <div class="content-image-winner d-flex margin-auto">
                            <img class="margin-auto" width="150" src="" id="pic-employee" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <div class="margin-top-1"></div>
                <h1 class="winner-name" id="names-winner">Nombre Apellido</h1>
                <div class="margin-top-1"></div>
                <h1 class="winner-label">GANADOR</h1>
            </div>
        </div>
        <script>
            var param = (new URL(document.location)).searchParams;
            document.getElementById('names-winner').innerHTML = param.get('name');
            document.getElementById('pic-employee').src = param.get('image');
        </script>
    </div>
</body>
</html>
