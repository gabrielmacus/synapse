<?php
$title="Contactanos";
include "header.php";

?>

<div class="contacto col-s-1 col-m-1 col-l-3 col-xl-3 flex">

    <div class=" cl form flex   s-12 m-12 l-7 xl-7">

        <!-- ko if: !contact.success() -->

        <header class="direccion">
            <h3>Dejanos tu mensaje</h3>
        </header>

        <!-- /ko -->
        <?php include SITE_TEMPLATE_PATH."/utils/contact.php"; ?>


    </div>


    <div class="cl form flex line  s-12 m-12 l-1 xl-1">

    </div>


    <div class="ubicacion  cl s-12 m-12 l-4 xl-4">

        <header class="direccion">
            <h3><span class="find-us">Encontranos en</span> Calle falsa 123, Paraná, Entre Ríos <span class="find-us"><i class="material-icons">location_on</i></span></h3>
        </header>
        <div id="map"></div>
        <script>
            function initMap() {
                var uluru = {lat: -25.363, lng: 131.044};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_ENV["maps"]["key"]?>&callback=initMap">
        </script>


        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function(){
                //FB.init({ status: false, cookie: true, xfbml: true });
                FB.Event.subscribe("xfbml.render", function(){
                  /*  document.querySelector(".fb").style.display="flex";*/
                });
            };
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=<?php echo $_ENV["auth"]["fb"]["version"]?>&appId=<?php echo $_ENV["auth"]["fb"]["appId"]?>';
                fjs.parentNode.insertBefore(js, fjs);


            }(document, 'script', 'facebook-jssdk'));



        </script>
        <div class="fb-page" data-href="<?Php echo  $_ENV["siteEnv"]["fb"]["page"];?>" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?Php echo  $_ENV["siteEnv"]["fb"]["page"];?>" class="fb-xfbml-parse-ignore"><a href="<?Php echo  $_ENV["siteEnv"]["fb"]["page"];?>"></a></blockquote></div>




    </div>

    <div class="rate-it col-s-1 col-m-1 col-l-3 col-xl-3 fila">
        <?php include SITE_TEMPLATE_PATH."/svg/five-stars.php"?>
        <p>
            ¿Te gustó el servicio que te brindamos? ¿Tenés una opinión?
        </p>
        <a target="_blank" href="https://www.facebook.com/pg/<?php echo $_ENV["siteEnv"]["fb"]["pageId"];?>/reviews/">Queremos escucharte</a>
    </div>

</div>
