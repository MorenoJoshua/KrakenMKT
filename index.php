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
$logoGr = imgRatio(2166, 860, false, 300);
$logoCh = imgRatio(2166, 860, false, 220);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KRAKEN MKT STUDIO</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="custom.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300" rel="stylesheet">
</head>
<body class="p-0 m-0">

<video autoplay muted loop id="videoBG">
    <source src="demo_kraken_HQ.mp4" type="video/mp4">
</video>
<div class="content" id="content">
    <div class="fs d-flex justify-content-center align-items-center">
        <div class="row text-center">
            <div class="w-100">
                <div class="row d-block">
                    <img src="logo.png" alt="" class="mx-sm-0 mx-md-4 d-inline-block d-md-none"
                         style="width: <?= $logoCh['w'] ?>px; height: <?= $logoCh['h'] ?>px">
                    <img src="logo.png" alt="" class="mx-sm-0 mx-md-4 d-none d-md-inline-block"
                         style="width: <?= $logoGr['w'] ?>px; height: <?= $logoGr['h'] ?>px">
                </div>
                <div class="row display-2 d-none d-md-block">
                    <a href="https://www.facebook.com/Kraken-Mkt-Studio-978014658962325/" target="_blank"
                       class="text-white nodeco fa fa-facebook-square px-1"></a>
                    <a href="https://www.instagram.com/krakenmktstudio/" target="_blank" class="text-white nodeco fa fa-instagram px-1"></a>
                    <a href="#" target="_blank" class="text-white nodeco fa fa-vimeo px-1"></a>
                </div>
                <div class="row d-block display-4 d-block d-md-none">
                    <a href="https://www.facebook.com/Kraken-Mkt-Studio-978014658962325/" target="_blank"
                       class="text-white nodeco fa fa-facebook-square px-1"></a>
                    <a href="https://www.instagram.com/krakenmktstudio/" target="_blank" class="text-white nodeco fa fa-instagram px-1"></a>
                    <a href="#" target="_blank" class="text-white nodeco fa fa-vimeo px-1"></a>
                </div>
            </div>
        </div>
    </div>

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

<div id="scrollDown" class="text-white display-4">
    <a onclick="doScroll()" class=" fa fa-angle-down"></a>
</div>
<div id="demoReel" class="text-white h2">
    <a onclick="doDemo()" class=" fa fa-window-maximize"></a>
</div>


<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
<script async defer>
    // Initialize Firebase
    const config = {
        apiKey: "AIzaSyD8Z64OVg0AnfW7yUNs19e3bfbVcVSfSkM",
        authDomain: "sistia-cb29a.firebaseapp.com",
        databaseURL: "https://sistia-cb29a.firebaseio.com",
        projectId: "sistia-cb29a",
        storageBucket: "sistia-cb29a.appspot.com",
        messagingSenderId: "519370476705"
    };

    firebase.initializeApp(config);

    db = firebase.database().ref('kraken');
    const saveContacto = (e) => {
        e.preventDefault();
        e.stopPropagation();
        const nombre = document.querySelector('[name="nombre"]').value;
        const empresa = document.querySelector('[name="empresa"]').value;
        const telefono = document.querySelector('[name="telefono"]').value;
        const email = document.querySelector('[name="email"]').value;
        // const comentario = document.querySelector('[name="comentario"]').value;

        const data = {
            nombre, empresa, telefono, email,
            // comentario
        };

        console.log(data);
        db.push(data, e => console.log(e));
    };

    (() => {
        document.querySelector('form').addEventListener('submit', saveContacto, false);
    })();


    const doScroll = () => {
        document.querySelector('#contacto').scrollIntoView({
            behavior: 'smooth'
        });
    };

    const doDemo = () => {
        document.getElementById('content').classList.toggle('hidden');
        document.getElementById('scrollDown').classList.toggle('hidden');
    }

</script>

</body>
</html>