
<?php include("includes/header.php"); ?>


<?php
if (!$session->is_signed_in()){redirect("login.php");}


if (empty($_GET['id']))
{
    redirect('universities.php');
}

$country = Country::find_by_id($_GET['id']);

if (isset($_POST['update']))
{

    $country->name = $_POST['name'];
    $country->description = $_POST['description'];

    $country->upload_file($_FILES['file_upload']);

    $country->save();

    $session->message("{$country->username} muvaffaqiyatli o'zgartirildi");

    redirect("countries.php");
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
                    Country
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i>Edit Country
                    </li>
                </ol>



                <div class="col-lg-4  my-5">

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label for="file_upload">

                                <img src="<?php echo $country->picture_path() ?>" id="replace_img" width="400" height="200" class="btn hover" alt="">
                                
                            </label>

                            <input type="file" id="file_upload" name="file_upload" style="display: none">

                        </div>

                        <div class="form-group">
                            <label for="name">F.I.O</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $country->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label><br>
                            <textarea name="description" class="form-control"  id="description"  cols="30" rows="10"><?php echo $country->description ?></textarea>
                        </div>
                        <div class="form-group">

                            <input type="submit" name="update" class="btn btn-primary" value="Update">
                            <a href="delete_student.php?id=<?php echo $country->id ?>" class="btn btn-danger">Delete</a>
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
