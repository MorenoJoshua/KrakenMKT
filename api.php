<?php
require_once 'Kraken.php';

$kraken = new Kraken();
$kraken->contacto();

header('Location: ./');