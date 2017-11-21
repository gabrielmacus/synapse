
<?php

    header("Content-type: text/css; charset: UTF-8");

    $columns=12;
    $breakpoints =  [1024,768,600];

?>

.flex
{
    display: flex;
    flex-wrap: wrap;
}


.fila
{
    width: 100%;
}

.col-3 .cl:nth-child(3n),
.col-2 .cl:nth-child(2n){ margin-right: 0}
.col-4 .cl:nth-child(4n) { margin-right: 0}

.cl {float:left;margin-right:1%}
.cl img{height:100%;width: 100%;object-fit: cover}

.cl-1 {width:7.416666666666667%}
.cl-2 {width:15.833333333333332%}
.cl-3 {width:24.25%}
.cl-4 {width:32.666666666666664%}
.cl-5 {width:41.083333333333336%}
.cl-6 {width:49.5%}
.cl-7 {width:57.91666666666667%}
.cl-8 {width:66.33333333333333%}
.cl-9 {width:74.75%}
.cl-10 {width:83.16666666666667%}
.cl-11 {width:91.58333333333334%}
.cl-12 {width:100%}

