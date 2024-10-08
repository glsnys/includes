<?php
    $pagina = 'Productos';
    $orden = 3;
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
    <!-- Productos-->
    <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">ESTOS SON NUESTROS PRODUCTOS</h2>
                    <h3 class="section-subheading text-muted">Selecciona lo mejor para ti</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Mouse Gamer <br>
                        <?php
                        if ($_SESSION["mouse"]) {
                            echo "EXISTE";
                        }
                        ?>
                        <form action="mouse.php" method="get">
                            <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        Producto 2
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