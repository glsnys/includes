<?php
    // Datos de conexión
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $bd = "sistemaweb";

    // Crear la conexión
    $conexion = new mysqli($servidor, $usuario, $password, $bd);

    // Verificar si la conexión es exitosa
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Recibir los datos del formulario
    $username = $_POST["username"];
    $clave = $_POST["clave"];
    $nombre = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];

    // Asegurar que los datos ingresados no están vacíos
    if (!empty($username) && !empty($clave) && !empty($nombre) && !empty($apellidos) && !empty($email)) {

        // Verificar si el nombre de usuario o el email ya existen en la base de datos
        $sql_check = "SELECT * FROM clientes WHERE usuario = ? OR email = ?";
        $stmt_check = $conexion->prepare($sql_check);
        $stmt_check->bind_param("ss", $username, $email);
        $stmt_check->execute();
        $resultado = $stmt_check->get_result();

        if ($resultado->num_rows > 0) {
            // Si se encuentra un registro con el mismo usuario o email
            $fila = $resultado->fetch_assoc();
            if ($fila['usuario'] === $username) {
                echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
            } elseif ($fila['email'] === $email) {
                echo "El correo electrónico ya está registrado. Por favor, utiliza otro.";
            }
        } else {
            // Si no existe el usuario ni el email, procedemos a insertar el registro
            $clave_hashed = password_hash($clave, PASSWORD_DEFAULT); // Hashear la contraseña

            // Preparar la consulta SQL para insertar los datos
            $sql_insert = "INSERT INTO clientes (nombres, apellidos, usuario, clave, email) VALUES (?, ?, ?, ?, ?)";

            $stmt_insert = $conexion->prepare($sql_insert);
            $stmt_insert->bind_param("sssss", $nombre, $apellidos, $username, $clave_hashed, $email);

            if ($stmt_insert->execute()) {
                echo "Usuario registrado exitosamente.";
            } else {
                echo "Error al registrar el usuario: " . $stmt_insert->error;
            }

            // Cerrar la sentencia de inserción
            $stmt_insert->close();
        }

        // Cerrar la sentencia de verificación
        $stmt_check->close();
        
    } else {
        echo "Por favor, complete todos los campos.";
    }

    // Cerrar la conexión
    $conexion->close();
?>
