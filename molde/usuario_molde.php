<?php
require './conexion.php';

function Registro_usuario($nombre, $edad, $password)
{
    global $conn;

    $consult = 'SELECT * FROM usuarios WHERE nombre = ?';
    $stmt = mysqli_prepare($conn, $consult);
    mysqli_stmt_bind_param($stmt, 's', $nombre);
    mysqli_stmt_execute($stmt);

    // $result = mysqli_stmt_get_result($stmt);

    // if ($row = mysqli_fetch_assoc($result)) {
    //     return json_encode($row);
    // }

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode([
            'status' => 'Error',
            'mensaje' => 'El nombre ya existe , registra otro'
        ]);
        return false;
    }


    $encriptar = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO usuarios (nombre, edad, password) VALUES (?, ?, ?)';

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sis', $nombre, $edad, $encriptar );

    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }

}

function Login_molde($nombre, $pass)
{

    global $conn;

    $sql = 'SELECT * FROM usuarios WHERE nombre = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $nombre);
    mysqli_stmt_execute($stmt);

    $conciden = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($conciden) > 0) {
        $row = mysqli_fetch_assoc($conciden);

        if (password_verify($pass, $row['password'])) {
            return $row;
        }
    } else {
        return false;
    }


}
?>