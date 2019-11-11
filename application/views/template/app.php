<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wisdom Park - Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="asset/css/simple-sidebar.css" rel="stylesheet">

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
    <script src="asset/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>