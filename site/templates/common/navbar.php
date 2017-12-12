
<nav id="main-navbar" class="main-navbar animated-2">
<a class="logo"></a>


<a class="scroll" data-section="inicio" href="#inicio">Inicio</a>
<a class="scroll" data-section="servicios" href="#servicios">Servicios</a>
<a class="scroll" data-section="tips" href="#tips">Tips</a>
<a class="scroll" data-section="contacto" href="#contacto">Contacto</a>
<a class="scroll" data-section="portfolio" href="#portfolio">Nuestros trabajos</a>

<span class="sn">
    <a class="facebook">
        <?php include SITE_TEMPLATE_PATH."/svg/facebook.php"?>
    </a>

    <a class="instagram">
       <?php include SITE_TEMPLATE_PATH."/svg/instagram.php"?>
    </a>

     <a class="twitter">
        <?php include SITE_TEMPLATE_PATH."/svg/twitter.php"?>
     </a>

</span>

</nav>

<script>

    document.addEventListener('DOMContentLoaded', function () {


        var navContainer = document.querySelector('.nav-container');
        var navbar =document.querySelector(".main-navbar");

        var sections =  document.querySelectorAll(".section");

       var observer = new IntersectionObserver(function (entries) {

           console.log(entries);

           for(var k in entries)
           {
               if(entries[k].target == navContainer)
               {
                   if(!entries[k].isIntersecting)
                   {
                       navbar.classList.add("pinned");
                      // navbar.style.position="fixed";
                   }
                   else
                   {
                       navbar.classList.remove("pinned");
                      // navbar.style.position="relative";
                   }

               }
               else if( entries[k].isIntersecting && entries[k].intersectionRatio  > 0.8)
               {


                   var sectionMenu = document.querySelector(".scroll[data-section='"+entries[k].target.id+"']");

                   entries[k].target.classList.add("active");

                   sectionMenu.classList.add("active");

               }
           }

      })

        observer.observe(navContainer);

       for(var i =0;i<sections.length;i++)
       {
           observer.observe(sections[i]);
       }
    });


</script>