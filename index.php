<!doctype html>
<html class="fixed">
<?php include 'DBConnection.php'; ?>

<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>FixElectro</title>
    <link rel="shortcut icon" href="img/faviicon.png" type="image/x-icon" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>

    <?php
// Inicia a sessão do php
	session_start(); ?>
    <script>
        < script >
            function avaliar(frm) {
                // Verifica se os campos de utilizador e palavra-passe estão vazios
                if (frm.user.value === "" || frm.pass.value === "") {
                    alert("É necessário preencher os campos!");
                    return false; // Impede a submissão do formulário se os campos estiverem vazios
                }
                // Verifica se os valores dos campos são diferentes dos valores PHP 
                if (frm.user.value !== "<?php $user ?>" || frm.pass.value !== "<?php $pass ?>") {
                    return false; // Impede a submissão do formulário se os valores não coincidirem
                }
                return true;
            }
    </script>
    </script>

</head>

<body>

    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="/" class="logo float-start">
                <img src="img/logo3.png" height="110" alt="" />
            </a>

            <div class="panel card-sign">
                <div class="card-title-sign mt-3 text-end">
                    <form name="Login" method="post" action="Autentica.php" onsubmit="return avaliar(this);">
                        <h2 class="title text-uppercase font-weight-bold m-0"><i
                                class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> Login</h2>
                </div>
                <div class="card-body">
                    <form action="index.html" method="post">

                        <div class="form-group mb-3">
                            <label>Utilizador</label>
                            <div class="input-group">
                                <input name="user" type="text" class="form-control form-control-lg" />
                                <span class="input-group-text">
                                    <i class="bx bx-user text-4"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div class="clearfix">
                                <label class="float-start">Palavra Passe</label>

                            </div>
                            <div class="input-group">
                                <input name="pass" type="password" class="form-control form-control-lg" />
                                <span class="input-group-text">
                                    <i class="bx bx-lock text-4"></i>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">

                                </div>
                            </div>
                            <div class="col-sm-4 text-end">
                                <button type="submit" class="btn btn-primary mt-2">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end: page -->

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

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>
</body>

</html>