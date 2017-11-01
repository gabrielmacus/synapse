<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="<?php echo  $_ENV["website"]["url"]."/static/js/angular.min.js"?>"></script>

<script src="<?php echo  $_ENV["website"]["url"]."/static/js/angular-animate.js"?>"></script>
<script src="<?php echo  $_ENV["website"]["url"]."/static/js/jquery-param.min.js"?>"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<link href="<?php echo  $_ENV["website"]["url"]."/static/css/ng-animation.css"?>" rel="stylesheet">

<link rel="stylesheet" href="<?php echo  $_ENV["website"]["url"]."/static/css/styles.css"?>">

<?php
if(!empty($_ENV["auth"]["gp"]) && !empty($_ENV["auth"]["gp"]["active"]))
{
    ?>
    <meta name="google-signin-scope" content="<?php echo $_ENV["auth"]["gp"]["scope"]?>">
    <meta name="google-signin-client_id" content="<?php echo $_ENV["auth"]["gp"]["clientId"]; ?>">
    <script src="https://apis.google.com/js/platform.js" async defer></script>


    <?php
}
?>