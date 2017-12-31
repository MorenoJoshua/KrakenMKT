<?php
function imgRatio($x, $y, $dh = false, $dw = false)
{
    $ratio = $x / $y;
    if ($dw !== false) {
        return ['w' => $dw, 'h' => round($dw / $ratio)];
    } elseif ($dh !== false) {
        return ['w' => round($dh * $ratio), 'h' => $dh];
    }
    return false;
}
$logoGr = imgRatio(2166, 860, false, 350);
$logoCh = imgRatio(2166, 860, false, 220);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KRAKEN</title>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="jquery.bcSwipe.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="v2.css">
</head>
<body class="p-0 m-0">
<video autoplay muted loop id="videoBG">
    <source src="demo_kraken_HQ.mp4" type="video/mp4">
</video>

<div id="content">
    <div id="indicadores" class="carousel slide" data-ride="carousel" data-interval="false" data-keyboard="true" data-wrap="false">
        <ol class="carousel-indicators">
            <li data-target="#indicadores" data-slide-to="0" class="active"></li>
            <li data-target="#indicadores" data-slide-to="1"></li>
            <li data-target="#indicadores" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div id="soc">
                    <div class="fs d-flex justify-content-center align-items-center">
                        <div class="row text-center">
                            <div class="w-100">
                                <div class="row d-block">
                                    <img src="logo.png" alt="" class="mx-sm-0 mx-md-4 d-inline-block d-md-none"
                                         style="width: <?= $logoCh['w'] ?>px; height: <?= $logoCh['h'] ?>px">
                                    <img src="logo.png" alt="" class="mx-sm-0 mx-md-4 d-none d-md-inline-block"
                                         style="width: <?= $logoGr['w'] ?>px; height: <?= $logoGr['h'] ?>px">
                                </div>
                                <div class="row display-3 d-none d-md-block mt-2">
                                    <a href="https://www.facebook.com/Kraken-Mkt-Studio-978014658962325/" target="_blank"
                                       class="text-white nodeco fa fa-facebook-square px-3"></a>
                                    <a href="https://www.instagram.com/krakenmktstudio/" target="_blank"
                                       class="text-white nodeco fa fa-instagram px-3"></a>
                                    <a href="#" target="_blank" class="text-white nodeco fa fa-vimeo px-3"></a>
                                </div>
                                <div class="row d-block logo-size mt-2 d-block d-md-none">
                                    <a href="https://www.facebook.com/Kraken-Mkt-Studio-978014658962325/" target="_blank"
                                       class="text-white nodeco fa fa-facebook-square px-1"></a>
                                    <a href="https://www.instagram.com/krakenmktstudio/" target="_blank"
                                       class="text-white nodeco fa fa-instagram px-1"></a>
                                    <a href="#" target="_blank" class="text-white nodeco fa fa-vimeo px-1"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item ">
                <div id="trabajo">
                    <div class="fs display-4 text-white d-none d-lg-flex">
                        <div class="w50 produccionAudiovisual">
                            <a href="https://vimeo.com/krakenmkt" class="text-white h-100 w-100 center-center text-center secc-dark">Producci&oacute;n<br>Audiovisual</a>
                        </div>
                        <div class="w50 marcadotecniaDigital">
                            <a href="https://www.facebook.com/Kraken-Mkt-Studio-978014658962325/" class="text-white h-100 w-100 center-center text-center secc-dark">Mercadotecnia<br>Digital</a>
                        </div>
                    </div>
                    <div class="fs h1 text-white flex-column d-flex d-lg-none">
                        <div class="h50 produccionAudiovisual">
                            <a href="https://vimeo.com/krakenmkt" class="h-100 w-100 center-center text-center secc-dark">Producci&oacute;n<br>Audiovisual</a>
                        </div>
                        <div class="h50 marcadotecniaDigital">
                            <a href="https://www.facebook.com/Kraken-Mkt-Studio-978014658962325/s" class="text-white h-100 w-100 center-center text-center secc-dark">Mercadotecnia<br>Digital</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div id="contacto">
                    <div class="fs d-flex justify-content-center align-items-center" id="contacto">
                        <!--                Nombre, empresa teléfono y correo electrónico-->
                        <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-4">
                            <form action="" id="formaContacto">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <input type="text" name="nombre" placeholder="Nombre" class="form-control">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="text" name="empresa" placeholder="Empresa" class="form-control">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="tel" name="telefono" placeholder="Telefono" class="form-control">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="email" name="email" placeholder="Email" class="form-control">
                                    </div>
                                    <!--                    <div class="col-12 mb-2">-->
                                    <!--                        <textarea name="comentario" id="comentario" cols="30" rows="10" class="form-control" placeholder="Comentario"></textarea>-->
                                    <!--                    </div>-->
                                    <div class="col-12 text-right mb-2">
                                        <input type="submit" class="btn btn-dark" value="Enviar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <a class="carousel-control-prev d-none d-md-inline-flex" href="#indicadores" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next  d-none d-md-inline-flex" href="#indicadores" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div id="demoReel" class="text-white h2">
    <a onclick="doDemo()" class=" fa fa-window-maximize"></a>
</div>
<script>
    function doDemo() {
        document.getElementById('content').classList.toggle('hidden');
    }

    $('.carousel').bcSwipe({threshold: 50});
</script>
</body>
</html>