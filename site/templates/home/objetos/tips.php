<?php
$title="Algunos tips";
include "header.php";

$tips =
    [
        [
            "text"=>"Mantené los filtros de tu equipo limpios y realizá un mantenimiento periódico para que el aire trabaje en las condiciones adecuadas",
            "icon"=>"https://visualpharm.com/assets/802/Air%20Conditioner-595b40b75ba036ed117d5046.svg"
        ],
        [
            "text"=>"No pongas el aire a temperaturas menores de 24º. Cada grado suplementario que bajás, aumenta el consumo de energía un 7%",
            "icon"=>"https://www.shareicon.net/download/2016/04/06/745762_temperature.svg"
        ],
        [
            "text"=>"Colocá cortinas blancas o de colores claros, ya que no absorben la radiación solar y evitan que aumente la temperatura de la habitación",
            "icon"=>"https://image.flaticon.com/icons/svg/248/248208.svg"
        ]

    ];

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
