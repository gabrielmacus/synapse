<?php
     header("Content-type: text/css; charset: UTF-8");
     $color_a="#0D47A1";
     $color_b="#FFA726";
     $color_c="white";
     $color_d="#EEEEEE";
 ?>

@import url('https://fonts.googleapis.com/css?family=Muli:400,600,800');

body
{
    font-family: 'Muli', sans-serif;

}
.main-navbar
{
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    display: flex;
    background-color: <?php echo $color_a?>;
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
.main-navbar a:not(.logo):after
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

.section#inicio .css-slider
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
.section#inicio .css-slider .css-slide,.section#inicio .css-slider .css-slide figure
{

    width: 100%;
    height: 100%;
}
.css-slide figure
{

    position: relative;
}

.section#inicio .css-slider figcaption
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
.section#servicios .box
{
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    margin-top: 20px;
    min-height: 200px;
    overflow: hidden;
    position: relative;
}
.section#servicios .box .front
{



    position: absolute;
    align-items: center;
    top:0;
    right:0;
    width: 100%;
    background-color: <?php echo $color_d;?>;
    height: 100%;
}
.section#servicios .box .front h3
{
    text-align: center;
    margin: auto;
    font-size: 18px;
    width: 65%;
    padding: 10px;
}
.section#servicios .box .front figure
{
    height: 100%;
    width: 35%;
}
.animated
{
    transition: all 250ms ease-out;
}
.section#servicios .box .back
{
    position: absolute;
    top: 0;
display: flex;
    height: 100%;
    right: 100%;
    padding: 20px;
    width:100%;
    font-weight: 600;
    color: white;
    line-height: 20px;
}
.section#servicios .box .back p
{    background: rgba(0,0,0,0.8);
    padding: 10px;
}


.section#servicios .box:hover .front figure
{
    filter:blur(3px);
    width: 100%;
}

.section#servicios .box:hover .back
{
    right:0%;
}
.section#tips .list > .item
{
    margin-top: 20px;
    border: 1px solid black;
    padding: 20px;
}
.section#tips .list
{
    width: 100%;
    float: left;
    margin-bottom: 20px;
}
.section#tips .list > .item .text
{
    display: flex;
    font-size: 18px;
    line-height: 24px;
    align-items: center;
}
@media all and (max-width: 601px) {

    .section#tips .list > .item .icon
    {
        margin-bottom: 20px;
    }

    .section#inicio .css-slider
    {
        height: 40vh;

    }
    .section#inicio .css-slider figcaption
    {
        font-size: 20px;
    }

}
.sn{
    margin-right: 20px;
    margin-left: auto;
}
.sn a img
{
    height: 30px;
    width: auto;
}
.sn a
{
    padding: 0;
    height: 100%;
    display: flex;
}