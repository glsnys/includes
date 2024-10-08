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
                <div class="col-md-12">
                    <form action="registrar.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre de usuario" name="username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Contraseña</span>
                            </div>
                            <input type="password" class="form-control" placeholder="Ingrese su clave" name="clave">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Nombres</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombres" name="nombres">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Apellidos</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Correo</span>
                            </div>
                            <input type="email" class="form-control" placeholder="Correo electrónico" name="email">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                    </form>
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