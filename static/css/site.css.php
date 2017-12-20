<?php
     header("Content-type: text/css; charset: UTF-8");
     $color_a="#0D47A1";
     $color_b="#FFA726";
     $color_c="white";
     $color_d="#EEEEEE";
     $color_e="#616161";
     $color_f="#E53935";
     $color_g="#4CAF50";
 ?>

@import url('https://fonts.googleapis.com/css?family=Muli:400,600,800');

body
{
    font-family: 'Muli', sans-serif;
    min-height: 100%;
    position: relative;
    float: left;
}


.layout,.nav-container
{
    width: 100%;
    float: left;
}
.nav-container
{
    height: 56px;
}
.main-navbar
{
    z-index: 1100;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    display: flex;
    position: fixed;
    width: 100%;
    background-color: <?php echo $color_a?>;
}
.main-navbar.pinned
{

  background-color: <?php echo $color_c?>;
}
.main-navbar.pinned a
{
    color: <?php echo $color_a?>;
}

.main-navbar.pinned .sn a.facebook svg
{

    fill: 		#3b5998;
}

.main-navbar.pinned .sn a.instagram svg
{
    fill:#d6249f;
}
.main-navbar.pinned .sn a.twitter svg
{

    fill:#1dcaff;

}

.main-navbar.pinned a:after
{
    background-color: <?php echo $color_a?>!important;
}


.main-navbar a
{
    padding: 20px;
    position: relative;
    align-items: center;
    color: <?php echo $color_c;?>;
    font-weight: 600;
}

a
{
cursor: pointer;
}
.main-navbar  a:not(.logo):after
{


    transition: all 200ms ease-in-out;


    content: '';
    opacity: 0;
    position: absolute;

    height: 3px;
    bottom: 10px;
    width: 0%;
    left: -50%;
    background-color: <?php echo $color_c;?>;

}
.main-navbar a:not(.logo):hover:after
{
    left: 25%;
    opacity: 1;
    width: 50%;
}
.main-navbar a.logo{
    padding:0;
}
.main-navbar a.logo img
{
    width: 70px;
    padding: 5px;
    object-fit: scale-down;
}
.section.inicio .css-slider
{
    height: 70vh;
    width: 100%;
    position: relative;

}
img
{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
figure
{    width: 100%;
    height: 100%;

}
.section.inicio .css-slider .css-slide
{
    width: 100%;
    height: 100%;

}
.css-slider
{
    border-bottom: 1px solid <?php echo $color_a;?>;
}
.css-slide figure
{

    position: relative;
}

.section.inicio .css-slider figcaption
{
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    position: absolute;
    top: 10%;
    right: 10%;
    line-height: 43px;
    font-size: 35px;
    background: rgba(255,255,255,0.8);
    padding: 20px;
}
.section:not(:first-child)
{
    width: 70%;
    margin: auto;
    float: left;
    overflow: hidden;
    left: 15%;
    position: relative;
    padding-top: 50px;
}

@media all and (max-width: 768px) {
    .section:not(:first-child)
    {
        width: 90%;
        left: 5%;
    }
}


.section > .header > .title
{
    font-weight: 600;
    color: <?php echo $color_a?>;
    font-size: 25px;
    margin-top: 20px;
    margin-bottom: 20px;
}
.section > .header > .line{
    width: 100%;
    height: 1px;
    opacity: 0.4;
    background: <?php echo $color_a?>;
    position: relative;
    display: block;
}
.section.servicios .box
{
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    margin-top: 20px;
    min-height: 200px;
    overflow: hidden;
    position: relative;
}
.section.servicios .box .front
{



    position: absolute;
    align-items: center;
    top:0;
    right:0;
    width: 100%;
    background-color: <?php echo $color_d;?>;
    height: 100%;
}
.section.servicios .box .front h3
{
    text-align: center;
    margin: auto;
    font-size: 18px;
    width: 65%;
    padding: 10px;
}
.section.servicios .box .front figure
{
    height: 100%;
    width: 35%;
}
.animated
{
    transition: all 250ms ease-out;
}
.animated-2
{
    transition: all 300ms linear;
}
.section.servicios .box .back
{
    position: absolute;
    top: 0;
display: flex;
    height: 100%;
    right: 100%;
    padding: 20px;
    width:100%;
    font-weight: 300;
    color: white;
    line-height: 20px;
}
.section.servicios .box .back p
{    background: rgba(0,0,0,0.8);
    padding: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,1);
}


.section.servicios .box:hover .front figure
{
    /*
    filter:blur(3px);*/
    width: 100%;
}

.section.servicios .box:hover .back
{
    right:0%;
}
.section.tips .list > .item
{
    margin-top: 20px;
    border: 1px solid black;
    padding: 20px;
}
.section.tips .list
{
    width: 100%;
    float: left;
}
.section.tips .list > .item .text
{
    display: flex;
    font-size: 18px;
    line-height: 24px;
    align-items: center;
}
@media all and (max-width: 700px)
{
    .section.inicio .css-slider figcaption
    {    line-height: 25px;
        font-size: 20px;
        padding: 10px;
    }
}
@media all and (max-width: 601px) {

    .section.tips .list > .item .icon
    {
        margin-bottom: 20px;
    }

    .section.inicio .css-slider
    {
        height: 40vh;

    }


}
.sn{
    margin-right: 20px;
    margin-left: auto;
}
.sn a svg
{
    height: 20px;
    width: auto;
    transition:all 150ms;
    fill: <?php echo $color_c ?>;
}
.sn a
{
    padding: 0;
    height: 100%;
    display: inline-flex;
    margin-right: 10px;
}
.sn a:last-child
{
    margin-right: 0;
}
.sn a:after
{
    display: none;
}
.sn a.facebook:hover svg
{

    fill: 	#8b9dc3;
}
.sn a.instagram:hover svg
{
    fill:#d6249f;
}
.sn a.twitter:hover svg
{

    fill:#1dcaff;

}
.sn a:hover svg
{
    transform:scale(1.2) rotate(-10deg);
}
#map
{
    width: 100%;
    height: calc(100% - 225px);
    position: relative;
    overflow: hidden;
    min-height: 20vh;
    margin-bottom: 25px;
}
.contacto
{
    margin-top: 20px;
}
.contacto .direccion
{
    margin-bottom: 20px;
    font-size: 15px;
    color: <?php echo $color_e?>;
}



.contacto form
{
    /*
    margin-top: 46px;*/
}

.form-block label,.form-block input,.form-block textarea
{
    width: 100%;
    outline: 0;


}

.form-block input,.form-block textarea

{    padding: 5px;
    float: left;
    margin-top: 10px;
    font-size: 18px;
    border: 0;
    color: <?php echo $color_e?>;
    border: 1px solid <?php echo $color_a?>;
}

.contacto .form-block:first-child
{
    margin-top: 0;
}

.form-block
{
    position: relative;
    margin-top: 10px;
    float: left;
    width: 100%;
    display: block;
}
.form-block label
{
    color: <?php echo $color_a?>;
}

.form-block button[type='submit']
{
    float: right;
    border: 0;
    padding: 10px;
    font-size: 15px;
    color: <?php echo $color_c?>;
    font-weight: 600;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    background: <?php echo $color_a?>;
}

.form-block button[type='submit']:hover
{

    color: <?php echo $color_c?>;
    background: <?php echo $color_a?>;
    opacity: 0.7;
}


.form-block button[type='submit']:active
{ outline: 0;
    color: <?php echo $color_a?>;
    background: <?php echo $color_c?>;

}

.portfolio-item
{

    margin-top: 1.5vw;
    position: relative;
    height: 25vh;
    min-height: 150px;
    max-height: 230px;
}
.portfolio-item .caption{
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    position: absolute;
    bottom: 0px;
    left: 0px;
    color: white;
    width: 100%;
    background: rgba(0,0,0,0.6);
    padding: 10px;
    opacity: 0.5;
}
.portfolio-item:hover .caption
{
    opacity: 1;
}

.contacto .form
{
    position: relative;
    align-items: center;
}

.contacto .form .loading
{


    margin: auto;
    display: none;
    align-items: center;
    position: absolute;
    background-color: <?php echo $color_c?>;
    width: 100%;
    margin-top: 46px;
    height: calc(100% - 46px);
    top:0;
    right: 0;
}
.contacto .form .loading > .loader
{

    transform: scale(0.5);
    color: <?php echo $color_a?>;
}
.contacto .form .error,.contacto .form .success
{
    width: 100%;
    float: left;
    padding: 15px;
    margin-top: 20px;
}

.contacto  .error-msg
{
    display: none;
    border: 1px solid <?php echo $color_f?>;
}
.contacto .success-msg
{
    display: none;
    border: 1px solid <?php echo $color_g?>;
}

.contacto  .success .success-msg,.contacto  .error .error-msg
{
    margin-top: 46px;
    height: calc(100% - 46px);
    width: 100%;
    position: absolute;
    top: 0;
    right: 0;
    display: flex;
    align-items: center;

}
.contacto .success form,.contacto .sending form,.contacto .error form
{
    display: none;
}
.contacto .sending .loading
{
    display: flex;
}

.contacto .form .success-msg p,.contacto  .error .error-msg p
{
    width: 90%;
    margin: auto;
    font-size: 20px;
    line-height: 25px;
    text-align: center;
    color: <?php echo $color_g?>;
}

.contacto .form .error-msg p
{
    color: <?php echo $color_f?>;

}





body > footer
{
    margin-top: 20px;
    background-color: <?php echo $color_a?>;

    width: 100%;
    float: left;
}
.contacto .line:after
{
    content: "";
    width: 1px;
    height: 80%;
    top:5%;
    position: relative;
    background-color: <?php echo $color_d;?>;
    margin: auto;
}
.contacto .find-us{
    font-weight: 600;
    color: #D32F2F
;
}


@media screen and (max-width: 768px)
{

    .ubicacion
    {
        margin-top: 20px;
    }
    #map
    {min-height: 180px;

        /*
        min-height: 25vh;*/
        margin-bottom: 20px;
    }

    .contacto form
    {
        margin-top: 0px;
    }

    .contacto .success,.contacto  .error
    {
        padding: 0px!important;
        margin-top: 0px!important;
        margin-bottom: 20px;
    }
    .contacto .success .success-msg,.contacto  .error .error-msg{
        position: relative;
        min-height: 20vh;
        margin-top: 0px;
    }

}

.modal{
    z-index: 1200;
    width: 100%;
    position: fixed;
    top:0;
    left:0;
    height: 100%;
    display: none;
    align-items: center;
    background-color: rgba(0,0,0,0.5);
}
.modal.open
{
    display: flex;
}
.modal-content
{
    margin: auto;
    background-color: <?php echo $color_c?>;
    width: 90%;
    display: flex;
    max-height: 80vh;
    overflow: hidden;
}

.gallery-carousel
{
    margin: auto;
}
.gallery-carousel .next,.gallery-carousel .prev
{
    padding: 0;
    position: absolute;

    margin: auto;
    z-index: 100;
    top:  50%;
    -webkit-transform: translate(0%,-50%);
    -ms-transform: translate(0%,-50%);
    transform: translate(0%,-50%);

    background: rgba(0,0,0,0.4);
    border: 0;
    outline: 0;
    color: <?php echo  $color_c;?>;
    cursor: pointer;
}

.gallery-carousel .next
{
    right: 0;
}
.gallery-carousel .prev{

}
.gallery-carousel .prev i,.gallery-carousel .next i
{
    font-size: 50px;
}

body.gallery .modal-content
{
    background-color: transparent;
}
body.gallery .layout,body.gallery .main-navbar
{
    filter: blur(6px);
}
.close-gallery
{
    background-color: rgba(0,0,0,0.5);
    color: <?php echo $color_c?>;
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 5px;
}
.gallery-header
{
    position: fixed;
    top: 0;
    right: 0;
    font-weight: 600;
    width: 100%;
    color: <?php echo $color_a?>;
    background: rgba(255,255,255,0.8);
    padding: 15px;
    text-align: center;
}
@media all and (max-width: 768px) {
    .gallery-carousel .prev i,.gallery-carousel .next i
    {
        font-size: 30px;

    }
    .close-gallery
    {    top: 5px;
        right: 5px;

        padding: 2px;
    }
    .close-gallery i
    {
        font-size: 18px;
    }
}
body > footer .col {
    width: 70%;
    left: 15%;
    position: relative;
    display: flex;
}

body > footer .col .data
{

    display: block;
    color: <?php echo $color_c; ?>;

    font-size: 13px;
}

body > footer .col .data-container .data
{
    font-size: 12px;
    width: 100%;
}

body > footer .col .data:last-child
{
    border-bottom: none;

}
body > footer .col .logo-footer
{
    padding-top: 5px;
    padding-bottom: 5px;
    width: auto;
}
body > footer .col .logo-footer img
{
    object-fit: scale-down;
    width: 40px;
}
body > footer .data-container
{    margin-left: 20px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}
body > footer .col > span
{

    display: flex;padding-top: 10px;padding-bottom: 10px;
}
body > footer .col > .copyright
{
    display: flex;
    align-items: center;
}
body > footer .col > .copyright > .data
{    display: flex;
    align-items: center;
    margin-left: auto;
}
body > footer .col > .copyright > .data .gamaware img
{
    width: 20px;
}
body > footer .col > .copyright > .data .gamaware
{
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #7BBB42;
}


@media screen and (max-width: 768px) {

    body > footer .col {
        width: 90%;
        left: 5%;
    }
}
@media screen and (max-width: 601px) {


    body > footer .col .logo-footer img
    {
        width: 55px;
    }
    body > footer .col
    {display: block}
    body > footer .data-container
    {
        margin-left: 0;
        text-align: right;
    }
}