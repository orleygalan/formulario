<?php
require './molde/usuario_molde.php';

function register_molde($nombre, $edad, $password)
{

    $resultado = Registro_usuario($nombre, $edad, $password);

    if ($resultado) {
        echo $resultado;
    } else {
        echo 'Error en el registro';
    }
}

function Login_controlador($nombre, $pass)
{

    $resultado = Login_molde($nombre, $pass);

    if ($resultado) {
        echo json_encode($resultado);
    } else {
        echo json_encode([
            'status' => 'Error',
            'mensaje' => 'Credencial incorrecta .'
        ]);
    }
}

?>