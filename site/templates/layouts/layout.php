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
<body class="<?php echo (!empty($bodyClass))?implode(" ",$bodyClass):"";?>" >

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


<footer>
</footer>
</body>
</html>