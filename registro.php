<?php
    $pagina = 'Registro';
    $orden = 5;
?>
<!DOCTYPE html>
<html lang="es">
<?php
    include 'includes/head.php';
?>
<body id="page-top">
    <?php
        include 'includes/header.php';
    ?>   
    <section class="page-section bg-light" id="registro">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <form action="registrar.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre de usuario" name="username" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Contraseña</span>
                            </div>
                            <input type="password" class="form-control" placeholder="Ingrese su clave" name="clave" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Nombres</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombres" name="nombres" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Apellidos</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Correo</span>
                            </div>
                            <input type="email" class="form-control" placeholder="Correo electrónico" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center">Iniciar Sesión</h3>
                            <form action="login.php" method="POST">
                                <!-- Usuario -->
                                <div class="form-group mb-3">
                                    <label for="loggin-email" class="form-label">Correo electrónico</label>
                                    <input type="email" name="loggin-email" id="username" class="form-control" placeholder="Correo electrónico" required>
                                </div>
                                
                                <!-- Contraseña -->
                                <div class="form-group mb-3">
                                    <label for="loggin-password" class="form-label">Contraseña</label>
                                    <input type="password" name="loggin-password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                                </div>
                                
                                <!-- Botón de Iniciar Sesión -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark">Iniciar Sesión</button>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php    
        include 'includes/footer.php';
        include 'includes/scripts.php';
    ?>
</body>
</html>