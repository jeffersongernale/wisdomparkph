<?php 
//setcookie('cross-site-cookie', 'name', ['samesite' => 'None', 'secure' => true]);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wisdom Park - Admin Panel</title>
    <link rel="apple-touch-icon" sizes="180x180" href="asset/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="asset/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="asset/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="asset/images/favicon/site.webmanifest">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- Custom styles for this template -->

    <?php
    foreach ($custom_css as $css) {
        echo $css;
    }
    ?>

    <link href="asset/css/simple-sidebar.css" rel="stylesheet">
    <link href="asset/node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="asset/css/custom.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">


        <?php echo $sidebar ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?php echo $navbar ?>

            <div class="container-fluid">
                <?php echo $page_content ?>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>



    <?php
    foreach ($custom_script as $script) {
        echo $script;
    }
    ?>
    <script>
      const _BASE_URL = "<?php echo base_url()?>";
    </script>
</body>

</html>