<?php
$title="Contactanos";
include "header.php";

?>

<div class="contacto col-s-1 col-m-1 col-l-3 col-xl-3 flex">


    <div class="ubicacion  cl s-12 m-12 l-4 xl-4">

        <header class="direccion">
            <h3>Calle falsa 123, Paraná, Entre Ríos</h3>
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
                src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_ENV["siteEnv"]["maps"]["key"]?>&callback=initMap">
        </script>


    </div>

    <div class="cl fb s-12 m-12 l-4 xl-4 ">
        <div id="fb-root"></div>


        <div style="margin: auto" class="fb-page" data-href="https://www.facebook.com/Aut&#xe9;ntica-Moda-Femenina-1032665866833207/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Aut&#xe9;ntica-Moda-Femenina-1032665866833207/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Aut&#xe9;ntica-Moda-Femenina-1032665866833207/">Auténtica Moda Femenina</a></blockquote></div>

        <script>
            window.fbAsyncInit = function(){
                //FB.init({ status: false, cookie: true, xfbml: true });
                FB.Event.subscribe("xfbml.render", function(){
                    document.querySelector(".fb").style.display="flex";
                });
            };
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v<?php echo $_ENV["siteEnv"]["fb"]["v"]?>&appId=<?php echo $_ENV["siteEnv"]["fb"]["appId"]?>';
                fjs.parentNode.insertBefore(js, fjs);


            }(document, 'script', 'facebook-jssdk'));



        </script>

    </div>
    <div class=" cl form flex   s-12 m-12 l-4 xl-4">

        <form  data-bind="submit: contact.send">

            <div class="form-block">
                <label>Nombre</label>
                <input  data-bind="value: contact.name"  type="text">


            </div>

            <div class="form-block">
                <label>Asunto</label>
                <input  data-bind="value: contact.subject"  type="text">


            </div>


            <div class="form-block">
                <label>Mensaje</label>
                <textarea  data-bind="value: contact.message"  rows="4"></textarea>
                
            </div>

            <div class="form-block">

                <button type="submit">Enviar</button>

            </div>


        </form>



        <div class="loading">
            <?php include SITE_TEMPLATE_PATH."/svg/circle.php";?>
        </div>

            <script type="text/javascript">
            var Contact = function () {

                this.name = ko.observable("");

                this.subject= ko.observable("");

                this.message= ko.observable("");
                
                this.send=function (form) {
                    console.log(ko.toJSON(this));
                }



            }

            var contact= new Contact();

            ko.applyBindings(contact);


        </script>

    </div>
</div>
