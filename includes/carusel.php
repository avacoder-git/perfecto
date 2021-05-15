<div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel" >
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

                <?php
                    $countries = Country::find_all();

                    foreach ($countries as $country):


            ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo  $country->id   ?>"></li>.

        <?php
        endforeach;
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

        foreach ($countries as $country):

        ?>

            <div class="carousel-item">
                <img class="d-block h-100 w-100" src="admin/<?php  echo $country->picture_path()   ?>" alt="First slide">
                <div class="mx-auto h-75 w-50 carousel-caption align-items-center d-md-block">
                    <div class="text-large"><?php  echo $country->name  ?></div>
                    <p class="main-text carousel-text mt-5"><?php  echo $country->description   ?></p>
                </div>
            </div>

        <?php
        endforeach;
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
