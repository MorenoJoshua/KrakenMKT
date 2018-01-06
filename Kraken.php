<?php

class Kraken
{
    private $vistas;
    public $mailer;
    public $firebase;

    public function __construct()
    {
        $this->vistas = __DIR__ . '/vistas/';
        require_once __DIR__ . '/vendor/autoload.php';

//        email
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('joshua200128@gmail.com')
            ->setPassword('=CAMBIAR=');
        $this->mailer = new Swift_Mailer($transport);
//       /email


        //firebase
        define('DEFAULT_URL', 'https://sistia-cb29a.firebaseio.com');
        define('DEFAULT_TOKEN', '=CAMBIAR=');
        define('DEFAULT_PATH', '/kraken/contacto');
        $this->firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);
        ///firebase

    }

    /**
     * Inserta Info a db de firebase
     */
    public function contactoADB()
    {
        $dateTime = new DateTime();
        $dateTimeFormatted = $dateTime->format('c');
        $_POST['timestamp'] = $dateTimeFormatted;
        $_POST['status'] = 'nuevo';
        $this->firebase->push(DEFAULT_PATH, $_POST);
    }

    /**
     * Crea y envia un correo
     * @param String $subject Tema
     * @param String $to Recipiente
     * @param String $body Cuerpo (En HTML)
     * @param $from :Remitente
     * @return int
     */
    public function mail($subject, $to, $body, $from = ['hello@morenojoshua.com' => 'Contacto kraken'])
    {
        $message = (new Swift_Message($subject))->setFrom($from)->setTo($to)->addPart($body, 'text/html');
        return $this->mailer->send($message);

    }


    /**
     * Genera un cuerpo correcto en HTML para email
     * @param $html
     * @return string
     */
    public function email_body($html)
    {
        $css = file_get_contents(__DIR__ . '../assets/css/bootstrap-reboot.min.css');

        return <<<HTML
<html>
<head>
    <meta charset=utf-8>
    <style type="text/css">
    $css
    </style>
    $html
</head>
</html>
HTML;
    }


    /**
     * En contacto
     * @return bool
     */
    public function contacto()
    {
//        nombre empresa telefono correo

        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : die('Falta ' . 'nombre');
        $empresa = isset($_POST['empresa']) ? $_POST['empresa'] : die('Falta ' . 'empresa');
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : die('Falta ' . 'telefono');
        $correo = isset($_POST['correo']) ? $_POST['correo'] : die('Falta ' . 'correo');
        $email = $correo;


//        email kraken
        $html = <<<HTML
<div>
    <h2>Hay una nueva solicitud de contacto.</h2>
    <p>
        Nombre: $nombre<br>
        Empresa: $telefono<br>
        Telefono: $empresa<br>
        Correo: $correo<br>
    </p>
</div>

HTML;

        $bodykraken = $this->email_body($html);


//        email cliente
        $html = <<<HTML
<div>
    <p>
        <h2>Se recibio tu solicitud!</h2>
        <h3>Nos pondremos en contacto</h3>
        <a href="mailto:info@krakenmkt.mx">Contacto</a>
    </p>
</div>

HTML;

        $bodyContacto = $this->email_body($html);
//        A cliente
        $this->mail('Solicitud de contacto recibida', $email, $bodyContacto);
//        A kraken
        /** @noinspection PhpParamsInspection */
        $this->mail('Nueva solicitud de contacto', ['joshua200128+kraken@gmail.com', 'info@krakenmkt.mx'], $bodykraken);
        $this->contactoADB();

        return true;
    }

}