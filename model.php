<?php
    include_once 'includes/bd.php';

if($_POST['registro'] == "nuevo") {
    $nombre = $_POST['nombre_usuario'];
    $edad = $_POST['edad_usuario'];
    $sexo = $_POST['sexo_usuario'];
    $rol = $_POST['rol_usuario'];
    try {
    $stmt = $conn->prepare('INSERT INTO usuarios ( NOMBRE, EDAD, SEXO, ROLID ) VALUES ( ?, ?, ?, ?)');
    $stmt->bind_param('sisi', $nombre, $edad, $sexo, $rol );
    $stmt->execute();
    $id_insertado = $stmt->insert_id;
    if($stmt->affected_rows > 0) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_insertado' => $id_insertado
        );
    } else {
        $respuesta = array(
            'respuesta' => 'error'
        );
    }
    $stmt->close();
    $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
        
    }
    die(json_encode($respuesta));
}

if($_POST['registro'] == "actualizar") {

    $id = (int) $_POST['id_usuario'];
    $nombre = $_POST['nombre_usuario'];
    $edad = $_POST['edad_usuario'];
    $sexo = $_POST['sexo_usuario'];
    $rol = $_POST['rol_usuario'];
    try {
        $stmt = $conn->prepare("UPDATE usuarios SET NOMBRE = ?, EDAD = ?, SEXO = ?, ROLID = ? WHERE ID = ? ");
        $stmt->bind_param('sisii', $nombre, $edad, $sexo, $rol, $id );
        $stmt->execute();

        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id
            );
        }   else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            ); 
        }

    die(json_encode($respuesta));
}

if($_POST['registro'] == "eliminar") {
    
    $id = (int) $_POST['id'];

    try {
        $stmt = $conn->prepare('DELETE FROM usuarios WHERE ID = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
             if($stmt->affected_rows) {
                 $respuesta = array(
                     'respuesta' => 'exito',
                     'id' => $id
                 );
             } else {
                 $respuesta = array(
                     'respuesta' => 'error'
                 );
             }
        } catch (Exception $e) {
            $respuesta  = array(
                'respuesta' => $e->getMessage()
            );
        }
    die(json_encode($respuesta));
}