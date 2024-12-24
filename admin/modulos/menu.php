
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo -->
    <a href="dashboard" class="brand-link">

        <img src="images/plantilla/lapiz.jpg" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">
            TodoList
        </span>

    </a>

    <!-- Menu -->
    <div class="sidebar">

        <!-- Seccion del usuario -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">

                <a href="#" class="d-block">
                    <?php echo $_SESSION["usuario"] ?>
                </a>

            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">DASHBOARD</li>

                <?php 
                    echo '<li class="nav-item">
                        <a href="dashboard" class="nav-link">
                            <i class="nav-icon fas fa-cash-register"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>';
                ?>
                
                <li class="nav-header"><hr style="background:white;">CAT&Aacute;LOGOS</li>
                <li class="nav-header"> <hr style="background:white;"> SALIR</li>
            </ul>
        </nav>
    </div>
</aside>