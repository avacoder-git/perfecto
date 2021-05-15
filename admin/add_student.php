
<?php include("includes/header.php"); ?>


<?php

if (!$session->is_signed_in()){redirect("login.php");}

$student = new Comment();

if (isset($_POST['submit']))
{

    $student->name = $_POST['name'];
    $student->university = $_POST['university'];
    $student->link = $_POST['link'];
    $session->message("{$student->name} muvaffaqiyatli qo'shildi");

    $student->upload_file($_FILES['file_upload']);

    $student->save();
    redirect("comments.php");

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
                    Studentlar
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i>Edit a users
                    </li>
                </ol>



                <div class="col-lg-4  my-5">

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label for="file_upload">

                                <img src="<?php echo $student->picture_path() ?>" id="replace_img" width="200" height="200" class="btn hover" alt="">
                                
                            </label>

                            <input type="file" id="file_upload" name="file_upload" style="display: none">

                        </div>

                        <div class="form-group">
                            <label for="name">F.I.O</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="university">Universitet</label>
                            <input type="text" name="university" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label><br>
                            <textarea name="link" class="form-control"  id="link"  cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">

                            <input type="submit" name="submit" class="btn btn-primary" value="Add">
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
