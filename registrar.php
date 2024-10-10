<?php
    
    //Datos del formulario
    $username = $_POST["username"];
    $clave = $_POST["clave"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];

    //Datos de la base de datos
    $BDhost = "localhost";
    $BDuser = "root";
    $BDpassword = "";
    $BDName = "sistemaweb";
    $BDtable = "clientes";

    

    $registro = registrarCliente($username,$clave,$nombres,$apellidos,$email);

    if($registro){
        echo "Registro exitoso";
    }
    else{
        echo "El usuario o el correo ya se encuentran registrados en el sistema.";
    }



    //FUNCIONES DE PHP
    
    //FUNCIÓN QUE PERMITE EL REGISTRO DE CLIENTES
    function registrarCliente($username,$clave,$nombres,$apellidos,$email){
        
        global $BDhost, $BDuser, $BDpassword, $BDName, $BDtable;

        if(existeUsuario($username,$email)){
            return false;
        }
        else{
            //Conexión con la base de datos
            $conexion = new mysqli($BDhost, $BDuser, $BDpassword, $BDName);

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Preparar la sentencia SQL
            $sql = "INSERT INTO clientes (nombres, apellidos, usuario, clave, email) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            if ($stmt === false) {
                die("Error en la preparación: " . $conexion->error);
            }
            $stmt->bind_param("sssss", $nombres, $apellidos, $username, $clave, $email);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                $resultado = true;
            } 
            else {
                $resultado = false;
            }

            // Cerrar el statement y la conexión
            $stmt->close();
            $conexion->close();
            return $resultado;
        }

        
    }

    //ESTA FUNCIÓN SIRVE PARA VERFICIAR SI EXISTE UN USUARIO CON ESE USERNAME O CORREO
    function existeUsuario($username, $email) {
        
        global $BDhost, $BDuser, $BDpassword, $BDName, $BDtable;
        
        //Conexión con la base de datos
        $conexion = new mysqli($BDhost, $BDuser, $BDpassword, $BDName);
        
        // Verificar la conexión
        if ($conexion->connect_error) {
            return false; // O manejar la conexión fallida de forma apropiada
        }
        
        // Preparar la sentencia SQL para verificar si existe el usuario o el email
        $sql = "SELECT * FROM clientes WHERE usuario = ? OR email = ?";
        $stmt = $conexion->prepare($sql);
        if ($stmt === false) {
            return false; // O manejar el error de forma apropiada
        }
        $stmt->bind_param("ss", $username, $email);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado
        $resultado = $stmt->get_result();
        
        // Verificar si hay filas, lo que indica que ya existe un usuario con ese nombre o correo
        if ($resultado->num_rows > 0) {
            $stmt->close();
            $conexion->close();
            return true; // Ya existe el usuario o email
        }
        else {
            $stmt->close();
            $conexion->close();
            return false; // No existe el usuario ni el email
        }
    }
?>