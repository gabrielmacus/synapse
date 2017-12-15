<?php
$title="Algunos tips";
include "header.php";



?>

<ul class="list ">
   <?php
   foreach ($tips as $k=>$v)
   {
       ?>
       <li class="item fila  col-s-1 col-m-2  col-l-2 col-xl-2 flex">

           <i class="icon cl  s-4 m-2 l-1 xl-1" ><img src="<?php echo $v["icon"];?>"></i>

           <div class="text cl s-12 m-10  l-11 xl-11">
               <p><?php echo $v["text"];?></p>
           </div>

       </li>
       <?php
   }
   ?>
</ul>
