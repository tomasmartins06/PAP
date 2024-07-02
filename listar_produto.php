<!doctype html>
<html class="fixed header-dark">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>FixElectro</title>
    <link rel="shortcut icon" href="img/faviicon.png" type="image/x-icon" />

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="vendor/morris/morris.css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="vendor/datatables/media/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="vendor/magnific-popup.css">
    <script src="vendor/jquery.min.js"></script>
    <script src="vendor/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Inclua jQuery antes do código Magnific Popup -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Inclua a biblioteca Magnific Popup -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>

</head>

<body>
    <?php include "DBConnection.php"; echo "<br>"; ?>

    <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
            <div class="sidebar-title">

            </div>
            <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html"
                data-fire-event="sidebar-left-toggle">
                <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <div class="nano">
            <div class="nano-content">
                <?php 
                // Inicia a sessão PHP
				SESSION_START();

				// Obtém o valor da variável de sessão 'iduser'
				$id = $_SESSION['iduser'];

				// Verifica o valor de $id para determinar qual menu incluir
				if ($id == 0) {
					// Se $id for igual a 0, inclui o menu de administração
					include("menuadmin.php");
				} else {
					// Se $id não for igual a 0, inclui o menu do utilizador
					include("menuuser.php");
				}
			?>

                <hr class="separator" />

            </div>

            <script>
                // Maintain Scroll Position
                if (typeof localStorage !== 'undefined') {
                    if (localStorage.getItem('sidebar-left-position') !== null) {
                        var initialPosition = localStorage.getItem('sidebar-left-position'),
                            sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                        sidebarLeft.scrollTop = initialPosition;
                    }
                }
            </script>

        </div>

    </aside>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="Admin.php" class="logo">
                    <img src="img/logo2.png" width="120" height="35" />
                </a>

                <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                    data-fire-event="sidebar-left-opened">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>

            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-bs-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="img/faviicon.png" alt="Joseph Doe" class="rounded-circle"
                                data-lock-picture="img/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                            <span class="name">Administrador</span>
                            <span class="role"></span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled mb-2">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i
                                        class="bx bx-user-circle"></i> My Profile</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i
                                        class="bx bx-lock"></i> Lock Screen</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="index.php"><i class="bx bx-power-off"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    

        <div class="inner-wrapper">
            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>Listar Eletrodomésticos</h2>

                    <div class="right-wrapper text-end">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="admin.html">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>

                            <li><span>Menu Eletrodomésticos</span></li>
                            <li><span>Listar Eletrodomésticos</span></li>

                        </ol>
 
                        <a class="sidebar-right-toggle" dclass="sidebar-right-wrapper">
                        <i class="fas fa-chevron-left"></i></a>
                    </div>
                </header>
                <?php include "DBConnection.php"; echo "<br>"; ?>
                <!-- start: page -->
                <section class="card">
                    <div class="card-body">
                        <div class="datatable-header">
                            <div class="row align-items-center mb-3">
                                <?php

                                     // Incluir a conexão com a base de dados
                                    include "DBConnection.php";

                                    // Consulta SQL padrão
                                    $query = "SELECT * FROM eletrodomesticos";

                                    // Se o filtro estiver definido, adiciona a condição WHERE na consulta SQL
                                    if(isset($_POST['filter-by']) && $_POST['filter-by'] != "" && $_POST['filter-by'] != "all") {
                                        $filtro = $_POST['filter-by'];
                                        $query .= " WHERE gama = '$filtro'";
                                    }

                                    // Adicione a cláusula ORDER BY para ordenar os resultados
                                    $query = "SELECT * FROM eletrodomesticos ORDER BY ide";

                                    // Executa a consulta SQL
                                    $result = mysqli_query($link, $query);


                                ?>

                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="filter-by" class="form-label">Filtrar por:</label>
                                        <select id="filter-by" class="form-control select-style-1 filter-by"
                                            name="filter-by">
                                            <option value="" disabled selected>Gama</option>
                                            <option value="all">Todos</option>
                                            <?php
                                                    // Consulta SQL para selecionar todos os estados distintos da tabela
                                                    $qry = "SELECT DISTINCT gama FROM eletrodomesticos";
                                                    // Executa a consulta SQL e armazena o resultado
                                                    $result_states = mysqli_query($link, $qry);
                                                    // Loop para exibir opções baseadas nos resultados da consulta
                                                    while ($row_state = mysqli_fetch_assoc($result_states)) {
                                                        $estado = htmlspecialchars($row_state['gama']);
                                                        // Opção do menu suspenso
                                                        echo "<option value='$estado'>$estado</option>";
                                                    }
                                                ?>
                                        </select>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Filtrar</button>
                                    </div>
                                    <br>
                                </form>

                                <table class="table table-bordered table-striped mb-0" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente</th>
                                            <th>Gama</th>
                                            <th>Eletrodoméstico</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Referência</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // Loop para exibir cada registo na tabela
                                            while ($row = mysqli_fetch_array($result)) {
                                          ?>
                                        <tr>
                                            <!-- Dados do eletrodoméstico -->
                                            <td>
                                                <?php echo $row['ide'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                    // Consulta para obter o nome do cliente
                                                    $idc = $row['idc'];
                                                    $query_nome = "SELECT nome FROM clientes WHERE idc = $idc";
                                                    $result_nome = mysqli_query($link, $query_nome);
                                                    $row_nome = mysqli_fetch_assoc($result_nome);
                                                    echo $row_nome ? $row_nome['nome'] : "Cliente não encontrado";
                                                ?>
                                            </td>
                                            <td><?php echo $row['gama'];?></td>
                                            <td><?php echo $row['eletrodomestico'] ?></td>
                                            <td><?php echo $row['marca'] ?></td>
                                            <td><?php echo $row['modelo'] ?></td>
                                            <td><?php echo $row['referencia'] ?></td>
                                            <td class="actions text-left">
                                                <!-- Link para edição -->
                                                <a href="editar_produto.php?id=<?php echo $row['ide']; ?>"
                                                    class="btn btn-sm btn-sm-custom" title="Editar">
                                                    <i class="fas fa-pencil-alt" style="color: black;"></i>
                                                </a>
                                                <!-- Formulário para exclusão com alerta de confirmação -->
                                                <form method="post" action="apagarproduto.php" style="display:inline;"
                                                    onsubmit="return confirm('Tem certeza que deseja apagar este registo?');">
                                                    <input type="hidden" name="id" value="<?php echo $row['ide']; ?>">
                                                    <button type="submit" class="btn btn-sm btn-sm-custom delete-btn"
                                                        title="Apagar">
                                                        <i class="fas fa-trash-alt" style="color: black;"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <?php
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                </section>
            </section>
        </div>

        <section role="main" class="content-body">
            <footer class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <h4><a class="logo">
                                    <img src="img/faviicon.png" width="35" height="35" />
                                </a>Visite-nos</h4>Travessa São Romão Nº7, Barracão, Cantanhede - Coimbra, Portugal
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <h4>Siga-nos</h4>
                            <ul class="social-icons">
                                <li><a href="https://www.facebook.com/tomas.duarte.7583992/" target="_blank"><i
                                            class="fab fa-facebook"></i></a> Facebook</li>
                                <li><a href="https://www.linkedin.com/in/tomás-duarte-2b0816294" target="_blank"><i
                                            class="fab fa-linkedin"></i></a> Linkedin</li>
                                <li><a href="https://www.instagram.com/_tomas.duarte_/" target="_blank"><i
                                            class="fab fa-instagram"></i></a> Instagram</li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <h4>Sobre Nós</h4>
                            <p>Uma empresa dedicada a fornecer soluções inovadoras para os clientes.</p>
                        </div>
                    </div>
                </div>

                <div class="bottom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <p>&copy; 2023 FixElectro. Todos os direitos reservados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </section>

        <!-- Vendor -->
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
        <script src="vendor/popper/umd/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="vendor/common/common.js"></script>
        <script src="vendor/nanoscroller/nanoscroller.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>

        <!-- Specific Page Vendor -->
        <script src="vendor/jquery-ui/jquery-ui.js"></script>
        <script src="vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
        <script src="vendor/jquery-appear/jquery.appear.js"></script>
        <script src="vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
        <script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
        <script src="vendor/flot/jquery.flot.js"></script>
        <script src="vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
        <script src="vendor/flot/jquery.flot.pie.js"></script>
        <script src="vendor/flot/jquery.flot.categories.js"></script>
        <script src="vendor/flot/jquery.flot.resize.js"></script>
        <script src="vendor/jquery-sparkline/jquery.sparkline.js"></script>
        <script src="vendor/raphael/raphael.js"></script>
        <script src="vendor/morris/morris.js"></script>
        <script src="vendor/gauge/gauge.js"></script>
        <script src="vendor/snap.svg/snap.svg.js"></script>
        <script src="vendor/liquid-meter/liquid.meter.js"></script>
        <script src="vendor/jqvmap/jquery.vmap.js"></script>
        <script src="vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
        <script src="vendor/jqvmap/maps/jquery.vmap.world.js"></script>
        <script src="vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
        <script src="vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
        <script src="vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
        <script src="vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
        <script src="vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
        <script src="vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="js/theme.js"></script>

        <!-- Theme Custom -->
        <script src="js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="js/theme.init.js"></script>

        <!-- Examples -->
        <script src="js/examples/examples.dashboard.js"></script>

</body>

</html>