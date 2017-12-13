<?php
     header("Content-type: text/css; charset: UTF-8");
     $color_a="#0D47A1";
     $color_b="#FFA726";
     $color_c="white";
     $color_d="#EEEEEE";
     $color_e="#616161";
 ?>

@import url('https://fonts.googleapis.com/css?family=Muli:400,600,800');

body
{
    font-family: 'Muli', sans-serif;
    width: 100%;
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
#map
{
    min-height: 25vh;
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
    left: 5%;
    opacity: 1;
    width: 90%;
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
    font-size: 35px;
    background: rgba(255,255,255,0.8);
    padding: 20px;
}
.section:not(:first-child)
{
    width: 80%;
    margin: auto;
    float: left;
    overflow: hidden;
    left: 10%;
    position: relative;
    padding-top: 50px;
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
    filter:blur(3px);
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
@media all and (max-width: 601px) {

    .section.tips .list > .item .icon
    {
        margin-bottom: 20px;
    }

    .section.inicio .css-slider
    {
        height: 40vh;

    }
    .section.inicio .css-slider figcaption
    {
        font-size: 20px;
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
    width: 100%;height: 100%;
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

.contacto .fb
{

    /*display: flex;
    flex-wrap: wrap;
    */
}

.contacto .fb .fb-page
{
    margin: auto

}

.contacto form
{
    margin-top: 34px;
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
    font-size: 13px;
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
    margin-top: 20px;
    position: relative;
    max-height: 250px;
}
.portfolio-item .caption{
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
    display: flex;
    align-items: center;
    position: absolute;
    background-color: <?php echo $color_c?>;
    width: 100%;
    height: 100%;
    top:0;
    right: 0;
}
.contacto .form .loading > .loader
{

    transform: scale(0.5);
    color: <?php echo $color_a?>;
}