
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
    <div onload="loadGalleryCarousel()" class="gallery-carousel Wallop Wallop--fade ">
        <div class="Wallop-list"  data-bind="foreach: images">
            <div class="Wallop-item">

                <figure>
                    <img data-bind="attr: {src:url}">
                </figure>

                <a class="close-gallery" onclick="closeGallery()"><i class="material-icons">close</i></a>
            </div>
        </div>

        <button class="Wallop-buttonPrevious prev"><i class="material-icons">navigate_before</i></button>
        <button class="Wallop-buttonNext next"><i class="material-icons">navigate_next</i></button>
    </div>

    <div class="gallery-header">
        <h2 data-bind="text: text"></h2>
    </div>



</script>
<script type="text/html" id="image-template" >

    <div  style="margin: auto;position: relative" data-bind="foreach: images">
        <figure>
            <img data-bind="attr: {src:url}">
        </figure>

        <a class="close-gallery" onclick="closeGallery()"><i class="material-icons">close</i></a>

    </div>

    <div class="gallery-header">
        <h2 data-bind="text: text"></h2>
        </div>

</script>

<script>

    function loadGalleryCarousel(elements) {
        document.body.classList.add("gallery");
        var wallopEl = elements[1];
        var slider = new Wallop(wallopEl);
    }

    var SelectedImage = function () {

        this.url = ko.observable(false);
        this.id = ko.observable(false);

    }

    var selectedGalleryImage = new SelectedImage();

    function closeGallery() {
        document.body.classList.remove("gallery");
        modal.opened(false);
    }

    function selectGalleryImage(image) {


        selectedGalleryImage.url(image.url);
        selectedGalleryImage.id(parseInt(image.id));


    }

    function openGallery(gallery) {

        selectGalleryImage(gallery.images[0]);
        var template ={data:gallery,name:"image-template",afterRender:function () {
            document.body.classList.add("gallery");
        }};

        if(gallery.images.length > 1)
        {
            template.afterRender=loadGalleryCarousel;
            template.name="gallery-template";
        }

        modal.template(template);
        modal.opened(true);

    }


</script>