<header class="header">
    <h2 class="title">¿Qué te ofrecemos?</h2>
    <span class="line"></span>
</header>

<?php

$elements =
    [
        ["title"=>"Mantenimiento de heladeras y freezers","image"=>"http://mspoweruser.com/wp-content/uploads/2016/09/samsung-family-hub.jpg","text"=>"Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum."],
        ["title"=>"Colocación y reparación de aires acondicionados","image"=>"http://mspoweruser.com/wp-content/uploads/2016/09/samsung-family-hub.jpg"],
        ["title"=>"Asesoramiento profesional","image"=>"http://mspoweruser.com/wp-content/uploads/2016/09/samsung-family-hub.jpg"]
    ];

?>

<div class="col-s-1 col-m-2 col-l-3 col-xl-3 flex">

    <?php foreach($elements as $k=>$v)
    {
        ?>
        <div class="box  cl s-12 m-6 l-4 xl-4 " >

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