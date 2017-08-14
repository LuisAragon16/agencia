<?php

if (isset($_GET["accion"])) {
    $accion = $_GET["accion"];
} elseif (isset($_POST["accion"])) {
    $accion = $_POST["accion"];
}
$iAutobusID = $_POST["iAutobusID"];
$imagen = $_POST["imagen"];
if (strpos($imagen, "data:image/png") !== false) {
    echo 'El formato admitido de imagen es <b>JPGE</b>.</br>Seleccione un formato valido.';
    die();
}

function subirimagenA($imagen, $iAutobusID) {
    if (strpos($imagen, "data:image/png") !== false) {
        $function2 = 'imagepng';
        $function1 = 'imagecreatefrompng';
        $ext = ".png";
        $optimize = null;
    } else {
        $function2 = 'imagejpeg';
        $function1 = 'imagecreatefromjpeg';
        $ext = ".jpg";
        $optimize = 100;
    }
    if (strpos($imagen, "data:image/png") !== false) {
        imagealphablending($image, false);
        imagesavealpha($image, true);
    }
    $image = $function1($imagen);
    $direccion_imagen = '../../img/autobuses/' . $iAutobusID . $ext;
    $function2($image, $direccion_imagen, $optimize);
}

/* * ************************************************************************************ */
if ($accion == 1) {
    subirimagenA($imagen, $iAutobusID);
    echo 1;
}