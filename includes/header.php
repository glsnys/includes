<!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php" title="Inicio"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item">
                        <?php
                        if ($orden == 2) {
                            ?>
                            <a class="nav-link" href="servicios.php" style="color:#FFC300;">Servicios</a>
                            <?php
                        } else {
                            ?>
                            <a class="nav-link" href="servicios.php">Servicios</a>
                            <?php
                        }
                        ?>
                            
                        </li>
                        <li class="nav-item">
                            <?php
                            if($orden==3){
                                echo '<a class="nav-link" style="color:#FFC300;" href="productos.php">Productos</a>';
                            }
                            else{
                                echo '<a class="nav-link" href="productos.php">Productos</a>';
                            }
                            ?>
                            
                        </li>
                        <li class="nav-item">
                        <?php
                            if($orden==4){
                                echo '<a class="nav-link" href="promociones.php" style="color:#FFC300;">Promociones</a>Productos</a>';
                            }
                            else{
                                echo '<a class="nav-link" href="promociones.php">Promociones</a>';
                            }
                            ?>
                            
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Equipo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>