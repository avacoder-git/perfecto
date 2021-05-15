<?php ob_start() ?>
<?php require_once ("includes/init.php");

if (!$session->is_signed_in()){redirect("login.php");}

$clients = Reference::find_all();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php require_once ("includes/top_nav.php")  ?>
    <?php require_once ("includes/side_nav.php")  ?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <!-- /.navbar-collapse -->

</nav>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">
                    Murojaatlar
                </h1>
                <div class="bg-success">
                    <?php echo $message  ?>
                </div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Murojaatlar
                    </li>

                    <li class=""> Jami:
                        <?php echo Reference::count_all()  ?>
                    </li>
                </ol>


                <form action="excel.php" method="post" class="form-group">
                    <input type="submit" name="export" value="Excel formatda yuklab olish" class="btn btn-success">
                    <input type="submit" name="clear" value="Tozalash" class="btn btn-danger">
                </form>

            </div>


            <div class="col-lg-12">

                <table class="table-bordered table table-hover">

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ismi Famiyasi</th>
                        <th scope="col">Telefon raqami</th>
                        <th scope="col">Mamlakati</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    foreach ($clients as $client):

                    ?>

                    <tr>

                        <th><?php echo $client->id  ?></th>
                        <th><?php echo $client->name  ?></th>
                        <th><?php echo $client->phone  ?></th>
                        <th><?php echo $client->target  ?></th>
                        <th><?php echo $client->date  ?></th>

                    </tr>

                    <?php
                    endforeach;
                    ?>


                    </tbody>
                </table>

                <?php
                    Reference::absent();
                    ?>


            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
