
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
            <div class="col-lg-4 align-items-center">
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
        <div class="row text-center my-4">
            <div class="col-lg-12">
                <a href="https:/www.t.me/avacoder_uz" class="text-light " style="text-decoration: none;">Designed and Developed by AVACODER</a>

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
<script type="text/javascript" src="http://www.youtube.com/player_api"></script>
<script>


    $('.modal').on('hide.bs.modal', function (e) {
        var videoURL = $('iframe').prop('src');
        videoURL = videoURL.replace("&autoplay=1", "");
        $('iframe').prop('src','');
        $('iframe').prop('src',videoURL);
    })


</script>

</html>