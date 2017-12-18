
<?php

$title="Portfolio";
include "header.php";

$w=319;
$h=230;

?>

<div class="col-s-1 col-m-2 col-l-3 col-xl-4 flex">

    <?php
    foreach ($portfolio as $k=>$v)
    {
        ?>

        <a onclick='openGallery(<?Php echo addcslashes(json_encode($v),"'")?>)' class="cl s-12 m-6 l-4 xl-3 portfolio-item">

            <figure>
                <img src="<?php echo reset($v["images"])["url"]."?w={$w}&h={$h}"?>">

                <?php
                if(!empty($v["text"]))
                {
                    ?>
                    <figcaption class="caption animated"><?php echo $v["text"]?></figcaption>
                    <?php
                }
                ?>

            </figure>

        </a>
        <?php
    }
    ?>


</div>

<script type="text/html" id="gallery-template">

<div class="gallery   col-s-1 col-m-1 col-l-2 col-xl-2">

    <figure class="selected-image cl s-12  m-7 l-7 xl-8">
        <img data-bind="attr: { src: selectedGalleryImage.url }">
    </figure>

    <a onclick="closeGallery()"><i  class="material-icons" >close</i></a>

    <div class="images cl s-12 m-5 l-5 xl-4   animated   col-s-2 col-m-2  col-l-2 col-xl-2" >


       <div class="images-wrapper" data-bind="foreach: images">
           <figure data-bind="click: selectGalleryImage.bind($data),css: {active: selectedGalleryImage.id() == $data.id}"  class="gallery-image cl  s-6 m-6 l-6 xl-6">
               <img data-bind="attr: {src:url}">



           </figure>

       </div>


    </div>


</div>


</script>

<script>
    var SelectedImage = function () {

        this.url = ko.observable(false);
        this.id = ko.observable(false);

    }

    var selectedGalleryImage = new SelectedImage();

    function closeGallery() {

        modal.opened(false);
    }

    function selectGalleryImage(image) {


        selectedGalleryImage.url(image.url);
        selectedGalleryImage.id(parseInt(image.id));


    }

    function openGallery(gallery) {

        selectGalleryImage(gallery.images[0]);



        modal.template({data:gallery,name:"gallery-template"});
        modal.opened(true);

    }


</script>