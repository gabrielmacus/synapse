
<?php

$title="¿Qué te ofrecemos?";
include "header.php";

$elements =
    [
        ["title"=>"Mantenimiento de heladeras y freezers","image"=>"http://mspoweruser.com/wp-content/uploads/2016/09/samsung-family-hub.jpg","text"=>"Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se"],
        ["title"=>"Colocación y reparación de aires acondicionados","image"=>"https://www.airconco.com/wp-content/uploads/2016/01/maintenance.jpg","text"=>"Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se"],
        ["title"=>"Asesoramiento profesional","image"=>"http://www.airproductsinc.com/wp-content/uploads/2016/03/Dealer-Handshake-Woman.jpg","text"=>"Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se"]
    ];

?>

<div class="col-s-1 col-m-1 col-l-3 col-xl-3 flex">

    <?php foreach($elements as $k=>$v)
    {
        ?>
        <div class="box  cl s-12 m-12 l-4 xl-4 " >

            <header class="front flex animated">


                <figure class="animated" >
                    <img src="<?php echo $v["image"]?>">
                </figure>

                <h3 ><?php echo $v["title"];?></h3>
            </header>

            <?php
            if(!empty($v["text"]))
            {
                ?>
                <div class="back animated">
                    <p>
                        <?php echo $v["text"]?>
                    </p>
                </div>

                <?php
            }
            ?>



        </div>
        <?php
    }?>

</div>

<?php

$elements =false;
?>