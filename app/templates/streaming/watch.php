<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

<?php
$title="{$streaming->name}";
include TEMPLATE_PATH."/base/header.php";
?>


<div class="watch-video center flex" data-ng-controller="watchStreamingController">
   <!--
   <span class="streaming-not-ready">
        <i class="material-icons">&#xE0CE;</i>
    </span>
	-->



   <?php
   switch(UserAgentService::getOs())
   {
       case 'Mac':
       case 'iPhone':
       case 'iPad':

           ?>
       <video  autoplay  controls src='<?php echo $_ENV["website"]["url"]?>/static/hls/<?php echo $streaming["id"];?>/<?php echo $_ENV["hls"]["outFileName"]?>.m3u8' id="video"></video>

   <?php
           break;

       default:

           ?>
           <script>


           app.controller('watchStreamingController', function($scope,$rootScope,$http) {

               video = document.getElementById('video');
               video.onplay = function() {
                   //document.querySelector(".streaming-not-ready").style.display='none';
               };
               playHls(<?php echo $streaming["id"];?>);


               if(Hls.isSupported())
               {
                   setInterval(function () {


                       if(video.readyState == 0)
                       {
                           playHls(<?php echo $streaming["id"];?>);
                       }


                   },5000)
               }
               else
               {
                   $rootScope.openModal("<?php echo $_LANG['streaming.error.browserNotSupported']; ?>",'message','warning');

               }


               function playHls(id) {
                   console.log("intentado reproducir transmision...");


                   var hls = new Hls();
                   hls.loadSource('<?php echo $_ENV["website"]["url"]?>/static/hls/'+id+'/<?php echo $_ENV["hls"]["outFileName"]?>.m3u8');
                   hls.attachMedia(video);
                   hls.on(Hls.Events.MANIFEST_PARSED,function() {
                       video.play();

                   });

               }

               $rootScope.setFullscreen=function() {
                   var elem = document.getElementById("video");
                   if (elem.requestFullscreen) {
                       elem.requestFullscreen();
                   } else if (elem.mozRequestFullScreen) {
                       elem.mozRequestFullScreen();
                   } else if (elem.webkitRequestFullscreen) {
                       elem.webkitRequestFullscreen();
                   }
               }



           });




       </script>
           <video  autoplay  id="video"></video>
           <span data-ng-click="setFullscreen()" class="fullscreen">
        <i class="material-icons">&#xE5D0;</i>
           </span>
           <?php
           break;

   }
   ?>
</div>

