

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
        <img src="admin/image/community.png" class="" alt="">
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
            $universities = University::find_all();
            foreach ($universities as $university):

            ?>
                <div class="item">
                    <div class="card overflow-hidden m-0">
                        <img src="admin/<?php echo $university->picture_path() ?>" alt="">
                        <div class="card-body">
                            <div class="title-text text-center main-color"><?php echo $university->name ?></div>
                        </div>
                        <div class="card-footer pt-0 border-0 bg-transparent">
                            <a href="<?php echo $university->link ?>" class="more-btn form-control">Batafsil</a>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
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
