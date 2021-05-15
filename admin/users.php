<?php include("includes/header.php"); ?>




<?php
if (!$session->is_signed_in()) redirect("login.php");

$users = User::find_all();

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
                    Users
                </h1>
                <div class="bg-success">
                    <?php echo $message  ?>
                </div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Users
                    </li>
                </ol>
                <?php if ($session->current_user()->status()=="admin") {  ?>


                <div class="form-group">
                    <a href="add_user.php" class="btn btn-success">Add User</a>
                </div>
                <?php  }  ?>


                <table class="table-hover table table-bordered">

                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>username</td>
                        <td>status</td>
                    </tr>
                    </thead>

                    <tbody>

                    <?php
                    foreach ($users as $user) :
                    ?>
                    <tr>
                        <td><h4><?php echo $user->id ?></h4></td>
                        <td><h4><?php echo $user->username ?>

                                <?php if ($session->current_user()->status()=="admin") {  ?>

                                <div class="pull-right">

                                    <a href="edit_user.php?id=<?php echo $user->id ?>" class="btn btn-primary mx-3">Edit</a>
                                    <a  href="delete_user.php?id=<?php echo $user->id ?>" class="btn btn-danger mx-3">Delete</a>
                                </div>
                                <?php }
                                ?>
                            </h4>
                        </td>
                        <td><?php echo $user->status() ?></td>
                    </tr>


                    <?php
                    endforeach;
                    ?>
                    </tbody>


                </table>
                <?php
                User::absent();
                ?>


            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
