<!doctype html>
<html lang="<?php echo $language;?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php
    include (SITE_TEMPLATE_PATH."/common/head.php");

    ?>
</head>
<body class="animated <?php echo (!empty($bodyClass))?implode(" ",$bodyClass):"";?>" >

<?php include SITE_TEMPLATE_PATH."/utils/modal.php";?>

<div class="nav-container">
    <?php include SITE_TEMPLATE_PATH."/common/navbar.php";?>

</div>
<div class="layout">


    <div class="container">
        <?php

        include ($incBody);
        ?>
    </div>

</div>


<footer >


        <div class="col col-s-1 col-m-2 col-l-2 col-xl-2">
             <span class=" cl  s-12  m-6 l-5 xl-3">



                 <figure class="logo-footer">
                     <img src="<?php echo $_ENV["siteEnv"]["logo"]["url"]?>">
                 </figure>

                    <div class="data-container">
                        <span class="address data">Calle Falsa 123, Paraná, Entre Rios</span>
                 <span class="tel data">Tel: <a>343414313</a></span>
                    </div>
             </span>

            <span class="copyright cl  s-12  m-6 l-7 xl-9">

                <span class="data">Desarrollado por &nbsp;<a class="gamaware">Gamaware &nbsp;<img src="http://www.gamaware.esy.es/img/logo.svg"></a></span>

            </span>




        </div>




</footer>
</body>
</html>