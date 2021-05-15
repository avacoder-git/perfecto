<?php include("includes/header.php"); ?>




<?php
if (!$session->is_signed_in()) redirect("login.php");

$countries = Country::find_all();

?>
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
                    Mamlakatlar
                </h1>
                <div class="bg-success">
                    <?php echo $message  ?>
                </div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Mamlakatlar
                    </li>
                </ol>

                <div class="form-group">
                    <a href="add_country.php" class="btn btn-success">+</a>
                </div>
                <table class="table-hover table table-bordered">

                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Photo</td>
                        <td>Mamlakat nomi</td>
                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    foreach ($countries as $country) :
                    ?>
                    <tr>
                        <td width="30"><h4><?php echo $country->id ?></h4></td>
                        <td width="330"><img src="<?php echo $country->picture_path() ?>" width="300" height="150" alt=""></td>
                        <td><h4><?php echo $country->name ?>


                            <div class="pull-right">

                                <a href="edit_country.php?id=<?php echo $country->id ?>" class="btn btn-primary mx-3">Edit</a>
                                <a  href="delete_country.php?id=<?php echo $country->id ?>" class="btn btn-danger mx-3">Delete</a>
                            </div>
                            </h4>
                        </td>
                    </tr>


                    <?php
                    endforeach;
                    ?>
                    </tbody>


                </table>


                <?php
                Country::absent();
                ?>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
