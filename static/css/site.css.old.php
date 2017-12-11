<?php
     header("Content-type: text/css; charset: UTF-8");
     $color_a="#3F51B5";
     $color_b="#5C6BC0";
 ?>
html,body
{
    height: 100%;
    background-color: #EEEEEE;
    font-family: 'Barlow', sans-serif;
}


.layout > .container
{
    /*width: 93%;*/
    width: 100%;    margin-bottom: 20px;
}

.post
{
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    background: white;
    overflow: hidden;
    margin-top: 20px;
    position: relative;
   /* max-height: 317px;*/
}
.post .date
{
    margin-bottom: 10px;
}
.post .category{
    float: right;
    color:<?php echo $color_b;?>;
    font-weight: 500;
    text-decoration: underline;

}
.post figure img
{
    max-height: 230px;
}

.post section p
{    /*margin-top: 10px;*/
    line-height: 20px;
    display: block;

    color: #616161;
}

.post section .text-container
{
    margin-top: 10px;
    overflow: hidden;

}
.main-navbar .sections
{
    border-bottom: 1px solid #E0E0E0;
}
.post section
{
    padding: 20px;

    max-height: 171px;px;
}
.post .amount
{
    position: absolute;
    top: 10px;
    color: white;
    left: 10px;
    background-color: rgba(33,33,33,0.7);
    padding: 5px;
    font-weight: 500;
    letter-spacing: 1px;
}
.post .title
{
    font-weight: 500;
    color: <?php echo $color_a?>;
    font-size: 20px;
}
.ellipsis
{
    overflow: hidden;
    white-space: pre;
    text-overflow: ellipsis;
}
.main-navbar
{
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    color: <?php echo $color_a?>;
    background: white;
}
.main-navbar a
{    font-weight: 500;
    padding: 30px;
    text-decoration: underline;
    /*padding: 30px;
    display: inline-block;
font-weight: 500;
    position: relative;
    width: 100%;*/

}


/*
.main-navbar a:after
{
    content: "";
    position: absolute;
    height: 70%;
    top: 0;
    width: 1px;
    background-color: #E0E0E0;
    right: 0;
    top: 15%;



}*/
/*
.main-navbar a:last-child:after
   {
       width:0%;
   }
*/

.animated
{
    -webkit-transition: all 200ms ;
    -moz-transition:all 200ms ;
    -ms-transition:all 200ms ;
    -o-transition: all 200ms ;
    transition: all 200ms ;
}
.nav-container
{
    position: absolute;
    right: 0;
    height: 100%;
    width: 25%;
}
.layout
{
    width: 70%;
    position: relative;
    left: 2.5%;

    display: flex;

    min-height:100%;
}
 .main-navbar .sections .title
{
    width: 100%;
   /* border-bottom: 3px solid <?php echo $color_a ?>;*/

    font-weight: 500;
    font-size: 18px;
    padding: 20px;
    padding-left: 30px;
}


body.section-1  .main-navbar .sections .title
{
    background-color: <?php echo $color_b;?>;
    color: white;
}


.main-navbar
{
    float: right;
    width: 100%;
    min-height: 100%;

}

@media screen and (max-width: 768px) {

    .layout
    {
        width: 85%;
        margin: auto;
    }
}

@media screen and (max-width: 600px) {

    .layout
    {
        width: 95%;
        margin: auto;
    }
}
