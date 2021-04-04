
<?php


include ('database.php');
include ('language.php');

if(!isset($_SESSION))
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Perfecto Consulting</title>
    <link rel="shortcut icon" href="image/website.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/index2.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body class="bg-light">
<!--<main>-->
<div class="back-blue overflow-hidden">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <img src="image/Group%2052.png" class="" width="100%" alt="">
        </div>
    </div>
</div>

<div class="margin1"></div>

<div class="loader">

    <div class="loader-anim">
        <div class="rect"></div>
    </div>

</div>

<?php
$show_modal = false;

if (isset($_GET['show_modal'])&&$_GET['show_modal']=="true"){
    $show_modal = true;
}

if(isset($_SESSION['formSubmitted']) && $_SESSION['formSubmitted'] === true) {
    echo "<script>$('#zayavka').modal('show')</script>";
    unset($_SESSION['formSubmitted']); // IMPORTANT - this will unset the value of $_SESSION['formSubmitted'] and will make the value equal to nul

    // Show modal
}
if ($show_modal==true)
{
    echo "<script type='text/javascript'>
    $(document).ready(function () {
        $('#zayavka').modal('show');
    });
</script>";
    $show_modal = false;
}


?>



<!-- Modal -->
<div class="modal fade" id="zayavka" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="clients.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php  echo $nav[$lang]['send']?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                        <?php
                        if (isset($_SESSION['message_client'])):
                            ?>

                            <div class="alert  mt-3  alert-<?=$_SESSION['msg_type_client']?>">
                                <h3 class="text-center">
                                    <?php
                                    echo "<script>$('#zayavka').modal('show')</script>";
                                    echo $_SESSION['message_client'];
                                    unset($_SESSION['message_client']);

                                    ?>
                                </h3>
                            </div>
                        <?php
                        endif
                        ?>
                    <div class="card-body">
                            <input type="text" class="form-control rounded-pill" name="name" placeholder="<?php  echo $nav[$lang]['name']?> " required>
                            <input type="tel" class="form-control mt-3 rounded-pill" name="telefon" placeholder="<?php  echo $nav[$lang]['tel']?> " required>
                            <select name="country" class="form-control mt-3" id="" required>
                                <option value="0"><?php  echo $nav[$lang]['country']?> </option>
                                <option value="Rossiya">Rossiya</option>
                                <option value="Turkiya">Turkiya</option>
                                <option value="Qozogiston">Qozog'iston</option>
                                <option value="Tojikiston">Tojikiston</option>
                                <option value="Avstriya">Avstriya</option>
                                <option value="Kipr">Kipr</option>
                                <option value="Boshqa">Boshqa</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php  echo $nav[$lang]['close']?> </button>
                    <button type="submit" name="send_data" class="btn btn-primary"><?php  echo $nav[$lang]['send']?> </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once 'university.php';
?>

<?php
$result = $mysqli->query("select * from students") or die($mysqli->error);

?>

<?php
while ($row = $result->fetch_assoc()):
    ?>


<div class="modal fade students bd-example-modal-lg" id="student_<?php echo $row['student_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <?php echo $row['student_link'] ?>
            </div>
        </div>
    </div>
</div>

<?php
endwhile;
?>
<nav class="navbar navbar1 navbar-expand-lg navbar-light" id="mainNavbar">
    <a class="navbar-brand" href="#"><img src="image/logo.png" height="40px" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><img src="image/list.svg" width="30px" alt=""> </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#about"><?php  echo $nav[$lang]['about']?><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#universities"><?php  echo $nav[$lang]['universities']?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#results"><?php  echo $nav[$lang]['results']?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#otziv"><?php  echo $nav[$lang]['otziv']?> <span class="sr-only">(current)</span></a>
            </li>

            <a class="nav-link murojaat nav-item"  data-toggle="modal" data-target="#zayavka" href="#"><?php  echo $nav[$lang]['send']?> <span class="sr-only">(current)</span></a>
            <li class="nav-item active">
                <div class="dropdown show">
                    <a class="btn bg-transparent  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php  echo $nav[$lang]['lang']?>
                    </a>

                    <div class="dropdown-menu bg-blue" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item translate" id="uz" href="?lang=uz">O'zbekcha</a>
                        <a class="dropdown-item translate" id="uz2"  href="?lang=eng">English</a>
                        <a class="dropdown-item translate" id="ru"  href="?lang=ru">Русский</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="yellow-round">
                <div class="round">
                    <img class="girl" src="image/surprised-schoolgirl-with-backpack-holds-spiral-notepad-red-textbook-shocked-have-session-week-wears-round-spectacles%20copy%201.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="rectangle">
                <div class="card border-0">
                    <img src="image/rudn.jpg" class="card-img" alt="">
                    <div class="card-img-overlay w-100 h-100 ">
                        <div class="container h-100">
                            <div class="row align-items-center">
                                <div class="easy-way text-center"><?php  echo $nav[$lang]['easy']?></div>
                            </div>
                            <div class="row align-items-center justify-content-center">
                                <a href="https://t.me/PERFECTO_GLOBAL"  data-toggle="modal" data-target="https://t.me/PERFECTO_GLOBAL" class="doc-btn title-text text-center"><?php  echo $nav[$lang]['wants']?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <a href="#about" class="downtarget"><img src="image/down.svg" alt=""></a>
    </div>
    <div id="about"></div>

</div>

<section class="container mt-5">
    <div class="row pt-5 justify-content-center">
        <div class="lowercase text-center main-color px-3"><b>PERFECTO CONSULTING - </b >  <b class="text-dark text-sm">
                <?php  echo $nav[$lang]['people']?>
            </b> </div>
    </div>
</section>
<img src="image/group%20of%20people.png" class="group-people" width="100%" alt="">

<section class="container mt-5" >
    <div class="row pt-5 justify-content-center" >
        <div class="home-text main-color font-weight-bold"><?php  echo $nav[$lang]['uchun']?></div>
    </div>
    <div class="row pt-5 justify-content-center">
        <div class="col-lg-4 mt-4">
            <div class="about">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <img src="image/Dollar.svg" class="mx-auto" alt="">
                    </div>
                    <div class="row align-items-center mt-3 h-100">
                        <div class="title-text text-center description"><?php  echo $nav[$lang]['free']?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-4">
            <div class="about">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <img src="image/university.svg" class="mx-auto" alt="">
                    </div>
                    <div class="row align-items-center mt-3 h-100">
                        <div class="title-text text-center description"><?php  echo $nav[$lang]['givinfo']?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-4">
            <div class="about">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <img src="image/doc.svg" class="mx-auto" alt="">
                    </div>
                    <div class="row align-items-center mt-3 h-100">
                        <div class="title-text text-center description"><?php  echo $nav[$lang]['docs']?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-4">
            <div class="about">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <img src="image/hat.svg" class="mx-auto" alt="">
                    </div>
                    <div class="row align-items-center mt-3 h-100">
                        <div class="title-text text-center description"><?php  echo $nav[$lang]['help']?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-4">
            <div class="about">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <img src="image/like.svg" class="mx-auto" alt="">
                    </div>
                    <div class="row align-items-center mt-3 h-100">
                        <div class="title-text text-center description"><?php  echo $nav[$lang]['service']?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid mt-5">
    <div class="row justify-content-center pt-5">
        <div class="home-text main-color text-center font-weight-bold"><?php  echo $nav[$lang]['strategiya']?></div>
    </div>
    <div class="row">
        <div class="col-lg-8 road-map offset-lg-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="road-map-img">
                            <img src="image/discuss.jpg" height="250px" width="250px" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 mt-4">
                        <div class="container h-100">
                            <div class="row h-100 justify-content-center  align-content-center">
                                <div class="road-map-txt">
                                    <div class="home-text text-dark"><?php  echo $nav[$lang]['murojaat']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8 road-map offset-lg-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="road-map-img">
                            <img src="image/bepul.jpg" height="250px" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 mt-4">
                        <div class="container h-100">
                            <div class="row h-100 justify-content-center  align-content-center">
                                <div class="road-map-txt">
                                    <div class="home-text  text-dark"><?php  echo $nav[$lang]['bepul']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-8 road-map offset-lg-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="road-map-img">
                            <img src="image/universitet.jpg" height="250px" width="250px" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 mt-4">
                        <div class="container h-100">
                            <div class="row h-100 justify-content-center  align-content-center">
                                <div class="road-map-txt">
                                    <div class="home-text text-dark"><?php  echo $nav[$lang]['choose']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8 road-map offset-lg-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="road-map-img">
                            <img src="image/applying.jpg" height="250px" width="250px" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 mt-4">
                        <div class="container h-100">
                            <div class="row h-100 justify-content-center  align-content-center">
                                <div class="road-map-txt">
                                    <div class="home-text text-dark"><?php  echo $nav[$lang]['apply']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-7 road-map offset-lg-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="road-map-img">
                            <img src="image/student.jpg" height="250px" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 mt-4">
                        <div class="container h-100">
                            <div class="row h-100 justify-content-center align-content-center">
                                <div class="road-map-txt">
                                    <div class="home-text text-dark"><?php  echo $nav[$lang]['bestudent']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel" >
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

<!--        --><?php
//        require_once 'carusel.php';
//
//        ?>
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
                    Ta'lim olish bilan bir vaqtda dunyoning eng jozibador  Yevropa
                    va Sharq madaniyati uyg'unlashgan mamlakatda sayohat qilish imkoniyati mavjud.

                </p>
            </div>
        </div>

        <?php

        $result = $mysqli->query("select * from carusel") or die($mysqli->error);

        ?>

        <?php
        while ($row = $result->fetch_assoc()):
        ?>

        <div class="carousel-item">
            <img class="d-block h-100 w-100" src="uploads/<?php  echo $row['carusel_image']   ?>" alt="First slide">
            <div class="mx-auto h-75 w-50 carousel-caption align-items-center d-md-block">
                <div class="text-large"><?php  echo $row['country_name']   ?></div>
                <p class="main-text carousel-text mt-5"><?php  echo $row['description']   ?></p>
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

<div class="margin">
</div>
<div class="position-relative" >

    <div class="container">
        <div class="row">
            <div class="col-5 motiv">
                <?php  echo $nav[$lang]['description']?>
            </div>
        </div>
    </div>

    <div class="position-absolute community">
        <img src="image/community.png" class="" alt="">
    </div>
</div>
<div  id="universities"></div>

<div class="margin ">
</div>
<div class="pt-5 container-fluid position-relative">

    <div class="row justify-content-center">
        <div class="home-text text-center main-color font-weight-bolder"><?php  echo $nav[$lang]['universities']?></div>
    </div>
    <div class="container p-0 w-100">
        <div class="owl-carousel  owl-theme p-0 m-0"  id="owl-demo">

            <?php
            require_once 'university.php';
            ?>
            <?php
            $result = $mysqli->query("select * from university") or die($mysqli->error);
            ?>
            <?php
            while ($row = $result->fetch_assoc()):
            ?>
            <div class="item">
                <div class="card overflow-hidden m-0">
                    <img src="uploads/<?php echo $row['university_image']?>" alt="">
                    <div class="card-body">
                        <div class="title-text text-center main-color"><?php echo $row['university_name']   ?></div>
                    </div>
                    <div class="card-footer pt-0 border-0 bg-transparent">
                        <a href="<?php echo $row['university_link'] ?>" class="more-btn form-control">Batafsil</a>
                    </div>
                </div>
            </div>

            <?php
            endwhile;
            ?>
        </div>
    </div></div>

<div class="overlay"  id="results">
    <div class="container-fluid p-0">
        <div class="container pt-5 h-100">
            <div class="row text-center justify-content-center home-text"><?php  echo $nav[$lang]['results']?></div>
            <div class="row align-items-center py-5">
                <div class="col-lg-3">
                    <div class="card anim">
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="result pt-2 px-5">4+</div>
                            <div class="title-text mx-5 text-center  px-3"><?php  echo $nav[$lang]['faoliyat']?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card anim">
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="result pt-2  px-5">11+</div>
                            <div class="title-text mx-5 px-3 text-center"><?php  echo $nav[$lang]['davlatlar']?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card anim">
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="result pt-2  px-5">25+</div>
                            <div class="title-text mx-5 text-center px-3"><?php  echo $nav[$lang]['universities']?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card anim">
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="result pt-2 px-5">7+</div>
                            <div class="title-text mx-5 text-center  px-5"><?php  echo $nav[$lang]['filiallar']?></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="my-5 container-fluid position-relative" id="otziv">

    <div class="row justify-content-center my-4">
        <div class="home-text text-center main-color font-weight-bold"><?php  echo $nav[$lang]['xursand']?></div>
    </div>
    <div class="container p-0  w-100">
        <div class="owl-carousel  owl-theme p-0 m-0"  id="owl-demo1">
            <?php

            $result = $mysqli->query("select * from students") or die($mysqli->error);

            ?>

            <?php
            while ($row = $result->fetch_assoc()):
            ?>
            <div class="item">
                <div class=" admitted pt-4">
                    <div class="rounded-circle align-items-center">
                        <img src="uploads/<?php echo $row['student_image'] ?>" class="card-img" height="100%" alt="">
                        <div class="card-img-overlay p-0">
                            <button type="button" data-toggle="modal" data-target="#student_<?php echo $row['student_id'] ?>">
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="title-text text-center t"><?php echo $row['student_name'] ?></div>
                        <div class="main-text text-center t"><?php echo $row['student_university'] ?></div>
                    </div>
                </div>
            </div>

            <?php
            endwhile;
            ?>
        </div>
    </div></div>

<div class="overlay-2">
    <div class="container-fluid p-0">
        <div class="container  h-100">
            <div class="row h-100 text-center justify-content-center home-text">
                <div class="home-text">
                    <?php  echo $nav[$lang]['bilimsiz']?>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid p-lg-2 bg-blue">
    <div class="container-fluid mx-auto ">
        <div class="row pt-5">
            <div class="col-lg-4">
                <div class="mx-auto w-75">
                    <img src="image/logo2%201.png" alt="">
                </div>
                <div class="title-text">
                    <?php  echo $nav[$lang]['kelajak']?>
                </div>
                <div class="container-fluid mt-5 p-0">
                    <div class="row ">
                        <div class="col-3">
                            <a href="https://t.me/joinchat/AAAAAFRRmy1ypcGDr2XXJg"><img src="image/telegram.svg"  alt=""></a>
                        </div>
                        <div class="col-3">
                            <a href="https://www.instagram.com/perfectoconsulting/"><img src="image/instagram.svg"  alt=""></a>
                        </div>
                        <div class="col-3">
                            <a href="https://www.youtube.com/channel/UCtdyutjzH0EGB1uq1M_Bq-Q"><img src="image/youtube.svg"  alt=""></a>
                        </div>
                        <div class="col-3">
                            <a href="https://www.facebook.com/perfectoconsultinguz/"><img src="image/facebook.svg"  alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="title-text mt-5"><?php  echo $nav[$lang]['aloqa']?></div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-3"><img src="image/location.svg" alt=""></div>
                        <div class="col-9 main-text color-white"><?php  echo $nav[$lang]['address']?></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3"><img src="image/orientir.svg" alt=""></div>
                        <div class="col-9 main-text color-white my-auto"><?php  echo $nav[$lang]['moljal']?></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3"><img src="image/phone.svg" alt=""></div>
                        <div class="col-9 main-text color-white mt-2">+99890 117 20 80</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3"><img src="image/web.svg" alt=""></div>
                        <div class="col-9 main-text color-white mt-2">perfectoconsulting.uz</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3 "><img src="image/info.svg" alt=""></div>
                        <div class="col-9 main-text color-white">perfecto <br> consult@gmail.com</div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="title-text mt-5">Instagram</div>

                <div class="row mt-3  mx-auto justify-content-center">
                    <div class="col-11">
                        <a class="mx-auto mt-3"  href="https://www.instagram.com/perfectoconsulting/"><img src="image/insta.jpg"width="100%" height="100px" alt=""></a>
                    </div>
                </div>
                <div class="title-text  mx-auto mt-5">Youtube</div>
                <div class="row py-3 justify-content-center">
                    <div class="col-11">
                        <a class="mx-auto mt-3 mx-auto"  href="https://www.youtube.com/channel/UCtdyutjzH0EGB1uq1M_Bq-Q"><img src="image/youtube.jpg"width="100%" height="100px" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="contact">
    <div class="instagram"><a href="https://www.instagram.com/perfectoconsulting/"><img src="image/instagram1.svg"  alt=""></a></div>
    <div class="telegram"><a href="https://t.me/joinchat/AAAAAFRRmy1ypcGDr2XXJg"><img src="image/telegram1.svg" alt=""></a></div>
    <div class="youtube"><a href="https://www.youtube.com/channel/UCtdyutjzH0EGB1uq1M_Bq-Q"><img src="image/youtube1.svg"  alt=""></a></div>
    <div class="phone"><a href="tel: +998901172080"><img src="image/phone2.svg" alt=""></a></div>
</div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script src="js/main.js"></script>


</html>