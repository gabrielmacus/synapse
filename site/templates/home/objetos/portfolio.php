
<?php

$title="Portfolio";
include "header.php";


$portfolio=
    [
        [
            "image"=>["url"=>"http://www.longservice.nsw.gov.au/__data/assets/image/0011/4250/home_bci_worker.jpg"],
            "text"=>"Lorem ipsum sit amet dolor"
        ],

        [
            "image"=>["url"=>"https://img3.stockfresh.com/files/d/diego_cervo/m/48/366980_stock-photo-construction-worker.jpg"],
            "text"=>"Lorem ipsum sit amet dolor"
        ]

        ,

        [
            "image"=>["url"=>"http://www.red-seal.ca/img-cl/trade_pic_const_craft_work.jpg"],
            "text"=>"Lorem ipsum sit amet dolor"
        ]
        ,

        [
            "image"=>["url"=>"https://d1yn1kh78jj1rr.cloudfront.net/image/thumbnail/S8DKL2zTlj15azx5h/graphicstock-construction-site-worker-building-a-home-or-house-doing-bricklaying-work-on-the-walls-of-the-shell_BxEpYzS6g_thumb.jpg"],
            "text"=>"Lorem ipsum sit amet dolor"
        ]
    ];

?>

<div class="col-s-1 col-m-2 col-l-3 col-xl-3 flex">

    <?php
    foreach ($portfolio as $k=>$v)
    {
        ?>

        <a class="cl s-12 m-6 l-4 xl-4 portfolio-item">

            <figure>
                <img src="<?php echo $v["image"]["url"]?>">

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
