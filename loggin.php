<?php
    //Datos del formulario
    $email = $_POST["loggin-email"];
    $password = $_POST["loggin-password"];

    //Datos de la base de datos
    $BDhost = "localhost";
    $BDuser = "root";
    $BDpassword = "";
    $BDName = "sistemaweb";
    $BDtable = "clientes";

    $respuesta = iniciarSesion($email,$password);

    if($respuesta){
        echo "Inicio de sesión exitoso";
    }
    else{
        echo "Correo o clave incorrectos";
    }

    function iniciarSesion($email, $password) {
        // Datos de la base de datos
        global $BDhost, $BDuser, $BDpassword, $BDName, $BDtable;
    
        // Crear la conexión a la base de datos
        $conexion = new mysqli($BDhost, $BDuser, $BDpassword, $BDName);
    
        // Verificar la conexión
        if ($conexion->connect_error) {
            return false; // Fallo de conexión
        }
    
        // Preparar la consulta SQL para verificar si el email y la contraseña coinciden
        $sql = "SELECT clave FROM $BDtable WHERE email = ? LIMIT 1";
        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            return false; // Fallo al preparar la consulta
        }
        $stmt->bind_param("s", $email);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener el resultado
        $resultado = $stmt->get_result();
    
        // Verificar si se encontró un usuario con el email
        if ($resultado->num_rows > 0) {
            // Obtener la fila del resultado
            $fila = $resultado->fetch_assoc();
            
            // Verificar si la contraseña proporcionada coincide con la almacenada (asumiendo que la contraseña está en texto plano, se recomienda usar hashing como password_hash)
            if ($password===$fila['clave']) { 
                // Contraseña correcta
                $stmt->close();
                $conexion->close();
                return true;
            } 
            else {
                // Contraseña incorrecta
                $stmt->close();
                $conexion->close();
                return false;
            }
        } else {
            // No se encontró un usuario con ese email
            $stmt->close();
            $conexion->close();
            return false;
        }
    }


?>