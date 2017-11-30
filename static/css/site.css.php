<?php
     header("Content-type: text/css; charset: UTF-8");
 ?>
html,body
{
    height: 100%;
    background-color: #EEEEEE;
}
.layout
{

    display: flex;
    /*
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    background: white;*/
    min-height: calc(100% - 50px);
    width: 70%;
    margin: auto;
    margin-top: 50px;
}
.layout > .container
{
    /*width: 93%;*/
    width: 100%;
    margin: auto;
}

.post
{
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    background: white;
    overflow: hidden;
    margin-top: 20px;
    max-height: 317px;
}
.post header
{
    font-size: 20px;
    font-weight: 600;
    padding-left: 20px;
    /* padding: 10px; */
    /* margin-bottom: 10px; */
    padding-right: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
}
.post section p
{    /*margin-top: 10px;*/
    line-height: 20px;
    display: block;

    color: #616161;
}
.post section .text
{
    padding: 20px;
}

.ellipsis
{
    overflow: hidden;
    white-space: pre;
    text-overflow: ellipsis;
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