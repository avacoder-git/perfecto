
<?php include("includes/header.php"); ?>


<?php
if (!$session->is_signed_in()){redirect("login.php");}


if ($session->current_user()->status() != "admin"){ redirect("users.php");}


if (empty($_GET['id']))
{
    redirect('users.php');
}

$user = User::find_by_id($_GET['id']);

if (isset($_POST['update']))
{

    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->status = $_POST['status'];

    $user->save();

    $session->message("{$user->username} muvaffaqiyatli o'zgartirildi");

    redirect("users.php");
}







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
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i>Edit a users
                    </li>
                </ol>


                <div class="col-lg-4">
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $user->username  ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $user->password  ?>">
                        </div>
                        <br>

                        <label for="status">Status</label>


                        <select name="status" class="dropdown" id="status">
                            <option value="2">User</option>
                            <option value="1">Admin</option>
                        </select>
                        <br>
                        <br>
                        <br>

                        <div class="form-group">

                            <input type="submit" name="update" class="btn-primary btn" value="Update">
                            <a href="delete_user.php?id=<?php echo $user->id ?>" class="btn btn-danger">Delete</a>

                        </div>

                    </form>

                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
