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
