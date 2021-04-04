<?php


include('security.php');
include ('database.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="image/website.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/index2.css">
    <link rel="stylesheet" href="style/index.css">

    <style>

        body{
            background: #2b5876;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #4e4376, #2b5876);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #4e4376, #2b5876); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        #carusel_image {
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg  navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#LogoutModal">Log Out</a>
            </li>
            <li class="nav-item active px-5">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#enteruserModal" >Edit Users</a>
            </li>

            <li class="nav-item active px-5">
                <a class="nav-link" href="show_clients.php">Mijozlardan Murojaatlar</a>
            </li>
        </ul>
    </div>
</nav>


<main>
    <div class="modal fade" id="enteruserModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <form action="users_enter.php" method="post">
                            <div class="card-header text-center text-secondary">
                                <h1>Login</h1>
                            </div>
                            <div class="card-body">
                                <input type="text" name="username" class="rounded-pill form-control login w-100" placeholder="username">
                                <input type="password" name="password" class="rounded-pill mt-3 form-control login w-100" placeholder="password">
                            </div>
                            <div class="card-footer">
                                <input type="submit" name="enter" value="Kirish" class="btn btn-info rounded-pill">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


<!--    Modal-->
    <div class="modal fade" id="LogoutModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Log Out?</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
<!--                <div class="modal-body"></div>-->
                <div class="modal-footer">

                    <form action="logout.php" method="post">
                        <button class="btn btn-primary" type="submit" name="logout">Logout</button>
                    </form>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <section class="gradient3" id="university">
        <div class="home-text mt-5 pt-5 text-center">Universitetlar</div>
        <div class="container">
            <?php
            if (isset($_SESSION['message_university'])):
                ?>

                <div class="alert  mt-3  alert-<?=$_SESSION['msg_type_university']?>">
                    <h3 class="text-center">
                        <?php
                        echo $_SESSION['message_university'];
                        unset($_SESSION['message_university']);
                        ?>
                    </h3>
                </div>

            <?php
            endif
            ?>
            <div class="row p-0 justify-content-center" >
                <?php
                require_once 'university.php';

                ?>
                <?php

                $result = $mysqli->query("select * from university") or die($mysqli->error);

                ?>

                <?php
                while ($row = $result->fetch_assoc()):
                ?>
                    <div class="col-lg-4  my-5">
                        <div class="card border-0 overflow-hidden">
                            <form action="university.php" method="post"  enctype="multipart/form-data">
                                <input type="hidden" name="university_id" value="<?php echo $row['university_id']?>">
                                <div class="card-header p-0  overflow-hidden p-0">
                                    <img src="uploads/<?php echo $row['university_image']?>" class="w-100 " height="240px" alt="" id="#replace_university_img">
                                </div>
                                <div class="card-body">
                                    <input type="text" name="university_name" class="form-control rounded-pill mb-2" placeholder="Universitet nomi" value="<?php echo $row['university_name']   ?>" disabled>
                                    <input type="text" name="university_link" class="form-control rounded-pill mb-2" placeholder="Universitet telegraph linki" value="<?php echo $row['university_link'] ?>" disabled>
                                </div>
                                <div class="card-footer ">
                                    <a href="dashboard.php?edit_university=<?php echo $row['university_id']?>" class="btn btn-primary mx-auto" name="update_tutor">Edit</a>
                                    <a href="university.php?delete_university=<?php echo $row['university_id']?>" class="btn btn-danger">Delete</a>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
                <div class="col-lg-4  my-5">
                    <div class="card border-0 overflow-hidden">
                        <form action="university.php" method="post"  enctype="multipart/form-data">
                            <input type="hidden" name="university_id" value="<?php echo $university_id?>">
                            <div class="card-header p-0  overflow-hidden p-0">
                                <img src="uploads/<?php echo $university_image?>" id="#replace_university_img" class="w-100 replace_university_img" height="240px" alt="" >
                                <label for="university_image" class="university-label row justify-content-center align-content-center">
                                    <img src="image/photo-camera.svg" width="100px" class="mx-auto">
                                </label>
                                <input type="file" id="university_image" name="university_image" class="d-none" required>
                            </div>
                            <div class="card-body">
                                <input type="text" name="university_name" class="form-control rounded-pill mb-2" placeholder="Universitet nomi" value="<?php echo $university_name ?>" required>
                                <input type="text" name="university_link" class="form-control rounded-pill mb-2" placeholder="Universitet telegraph linki" value="<?php echo $university_link ?>" required>
                           </div>
                            <div class="card-footer ">
                                <?php
                                if($update_university == true){
                                ?>
                                <button type="submit" class="btn btn-primary mx-auto" name="update_university">Update</button>
<!--                                <button type="submit" class="btn btn-danger mx-auto" name="clear_tutor">Clear</button>-->
                                    <a href="dashboard.php" class="btn btn-danger">Clear</a>
                                <?php  }
                                else{
                                ?>
                                <input type="submit" name="save_university" class="form-control rounded-pill btn btn-success" value="Save">
                                <?php
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="gradient3" id="students">
        <div class="home-text mt-5 pt-5 text-center">Talabalardan sharhlar</div>

        <?php
        if (isset($_SESSION['message_student'])):
            ?>

            <div class="alert  mt-3  alert-<?=$_SESSION['msg_type_student']?>">
                <h3 class="text-center">
                    <?php
                    echo $_SESSION['message_student'];
                    unset($_SESSION['message_student']);
                    ?>
                </h3>
            </div>

        <?php
        endif
        ?>
        <div class="container">
            <?php
            if (isset($_SESSION['message_tutor'])):
                ?>

                <div class="alert  mt-3  alert-<?=$_SESSION['msg_type_tutor']?>">
                    <h3 class="text-center">
                        <?php
                        echo $_SESSION['message_tutor'];
                        unset($_SESSION['message_tutor']);
                        ?>
                    </h3>
                </div>

            <?php
            endif
            ?>
            <div class="row p-0 justify-content-center" >
                <?php
                require_once 'students.php';

                ?>
                <?php

                $result = $mysqli->query("select * from students") or die($mysqli->error);

                ?>

                <?php
                while ($row = $result->fetch_assoc()):
                    ?>
                    <div class="col-lg-4  my-5">
                        <div class="card border-0 overflow-hidden">
                            <form action="students.php" method="post"  enctype="multipart/form-data">
                                <input type="hidden" name="student_id" value="<?php echo $row['university_id']?>">
                                <div class="card-header student_avatar mx-auto mt-3 rounded-circle  p-0">
                                    <img src="uploads/<?php echo $row['student_image']?>" class="w-100 " height="240px" alt="" id="#replace_university_img">
                                </div>
                                <div class="card-body">
                                    <input type="text" name="student_name" class="form-control rounded-pill mb-2" value="<?php echo $row['student_name']   ?>" disabled>
                                    <textarea type="text" name="student_link" class="form-control rounded-pill mb-2"  value="" disabled><?php echo $row['student_link'] ?></textarea>
                                    <input type="text" name="student_university" class="form-control rounded-pill mb-2"  value="<?php echo $row['student_university'] ?>" disabled>
                                </div>
                                <div class="card-footer ">
                                    <a href="dashboard.php?edit_student=<?php echo $row['student_id']?>" class="btn btn-primary mx-auto" name="update_tutor">Edit</a>
                                    <a href="students.php?delete_student=<?php echo $row['student_id']?>" class="btn btn-danger">Delete</a>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
                <div class="col-lg-4  my-5">
                    <div class="card border-0 overflow-hidden">
                        <form action="students.php" method="post"  enctype="multipart/form-data">
                            <input type="hidden" name="student_id" value="<?php echo $student_id?>">
                            <div class="card-header  rounded-circle student_avatar mx-auto mt-3 p-0">
                                <img src="uploads/<?php echo $student_image?>" id="#replace_student_img" class="w-100 replace_student_img" height="240px" alt="" >
                                <label for="student_image" class="university-label row justify-content-center align-content-center">
                                    <img src="image/photo-camera.svg" width="100px" class="mx-auto">
                                </label>
                                <input type="file" id="student_image" name="student_image" class="d-none" required>
                            </div>
                            <div class="card-body">
                                <input type="text" name="student_name" class="form-control rounded-pill mb-2" placeholder="Talaba nomi" value="<?php echo $student_name?>" required>
                                <textarea type="text" name="student_link" class="form-control rounded-pill mb-2" placeholder="YouTube linki" value="" required><?php echo $student_link ?></textarea>
                                <input type="text" name="student_university" class="form-control rounded-pill mb-2" placeholder="Universiteti" value="<?php echo $student_university ?>" required>
                            </div>
                            <div class="card-footer ">
                                <?php
                                if($update_student == true){
                                    ?>
                                    <button type="submit" class="btn btn-primary mx-auto" name="update_student">Update</button>
                                    <a href="dashboard.php#students" class="btn btn-danger">Clear</a>
                                <?php  }
                                else{
                                    ?>
                                    <input type="submit" name="save_student" class="form-control rounded-pill btn btn-success" value="Save">
                                    <?php
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once 'carusel.php';

    ?>

    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel" >
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

            <?php
            require_once 'carusel.php';

            ?>
            <?php

            $result = $mysqli->query("select * from carusel") or die($mysqli->error);

            ?>

            <?php
            while ($row = $result->fetch_assoc()):
                ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php  echo $row['carusel_id']   ?>"></li>.

            <?php
            endwhile;
            ?>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item position-relative active">
                <img class="d-block w-100" src="image/turkey.jpg" alt="First slide">
                <!--                <div class="position-absolute h-100 w-100 bg-dark over"></div>-->
                <div class="mx-auto h-75 w-50 carousel-caption align-items-center d-md-block">
                    <div class="text-large">Turkiya</div>
                    <p class="main-text carousel-text mt-5">
                        Ta'lim olish bilan bir vaqtda dunyoning eng jozibador Yevropa va Sharq madaniyati uyg'unlashgan mamlakatda sayohat qilish imkoniyati mavjud.</p>
                </div>
            </div>

            <?php

            $result = $mysqli->query("select * from carusel") or die($mysqli->error);

            ?>

            <?php
            while ($row = $result->fetch_assoc()):
                ?>
                    <div class="carousel-item position-relative">
                        <img class="d-block w-100" src="uploads/<?php  echo $row['carusel_image']   ?>" alt="First slide">
                        <div class="mx-auto h-75 w-50 carousel-caption align-items-center d-md-block">
                            <div class="text-large"><?php  echo $row['country_name']   ?></div>
                            <p class="main-text carousel-text mt-5"><?php  echo $row['description']   ?></p>
                            <form action="carusel.php" class="form" method="post">
                                <a href="dashboard.php?edit_carusel=<?php  echo $row['carusel_id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="carusel.php?delete_carusel=<?php  echo $row['carusel_id'] ?>" class="btn btn-danger">Delete</a>
                            </form>
                        </div>

                    </div>
            <?php
            endwhile;
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <img src="image/prev.png" alt="">
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <img src="image/next.png" alt="">
            <span class="sr-only">Next</span>
        </a>
    </div>

    <?php
    if (isset($_SESSION['message_carusel'])):
        ?>

        <div class="alert  mt-3  alert-<?=$_SESSION['msg_type_carusel']?>">
            <h3 class="text-center">
                <?php
                echo $_SESSION['message_carusel'];
                unset($_SESSION['message_carusel']);
                ?>
            </h3>
        </div>

    <?php
    endif
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center py-5">
            <div class="col-4">
                <div class="card border-0 overflow-hidden">
                    <form action="carusel.php" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="carusel_id" value="<?php echo $carusel_id?>">
                        <div class="card-header p-0  overflow-hidden p-0">
                            <img src="uploads/<?php echo $carusel_image?>" id="#replace_carusel_img" class="w-100 replace_carsuel_img" height="240px" alt="" >
                            <label for="carusel_image" class="university-label row justify-content-center align-content-center">
                                <img src="image/photo-camera.svg" width="100px" class="mx-auto">
                            </label>
                            <input type="file" id="carusel_image" name="image" class="d-none" required>
                            <p class="text-center">(1500x540)</p>
                        </div>
                        <div class="card-body">
                            <input type="text" name="country_name" class="form-control rounded-pill mb-2" placeholder="Mamlakat nomi" value="<?php echo $country_name ?>" required>
                            <textarea type="text" name="description" class="form-control rounded-pill mb-2" placeholder="20 ta so'zlik izoh" value="" required><?php echo $description ?></textarea>
                        </div>
                        <div class="card-footer ">
                            <?php
                            if($update_carusel == true){
                                ?>
                                <button type="submit" class="btn btn-primary mx-auto" name="update_carusel">Update</button>
                                <a href="dashboard.php" class="btn btn-danger">Clear</a>
                            <?php  }
                            else{
                                ?>
                                <input type="submit" name="save_carusel" class="form-control rounded-pill btn btn-success" value="Save">
                                <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</main>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script>
    $(document).ready(function (){
        var university_image = $('#university_image');
        input = university_image;
        var replace = $('.replace_university_img');
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    replace.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(input).change(function() {
            readURL(this);
            // alert("heasdfasd");
        });

        input1 = $('#student_image')
        var replace1 = $('.replace_student_img');
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    replace1.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(input1).change(function() {
            readURL1(this);
            // alert("heasdfasd");
        });
        input2 = $('#carusel_image')
        var replace2 = $('.replace_carsuel_img');
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    replace2.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(input2).change(function() {
            readURL2(this);
            // alert("heasdfasd");
        });

    });

</script>


</html>