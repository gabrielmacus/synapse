
<?php

$title="Portfolio";
include "header.php";


$portfolio=
    [
        [
            "image"=>["url"=>"https://scontent.faep8-2.fna.fbcdn.net/v/t31.0-8/15326164_1241554165924641_2515726626951376752_o.jpg?oh=eb4c3c991327895137bf4f075cdd2da5&oe=5ABF0013"],
            "text"=>"Lorem ipsum sit amet dolor"
        ],

        [
            "image"=>["url"=>"https://scontent.faep8-2.fna.fbcdn.net/v/t31.0-8/16715926_1303984146348309_7001684613369801092_o.jpg?oh=af3bee2d009bb39e0ea6cb2d0e482b27&oe=5A8AC5BB"],
            "text"=>"Lorem ipsum sit amet dolor"
        ]

        ,

        [
            "image"=>["url"=>"https://scontent.faep8-2.fna.fbcdn.net/v/t1.0-9/14606268_1192159820864076_254931475435361288_n.jpg?oh=080965642da783202d923c50d6bfe617&oe=5AC540A9"],
            "text"=>"Lorem ipsum sit amet dolor"
        ]
        ,

        [
            "image"=>["url"=>"https://scontent.faep8-2.fna.fbcdn.net/v/t31.0-8/15272128_1241554045924653_2695727177546510686_o.jpg?oh=02688aaac1ccbf1c4eb1c5eb99e39751&oe=5AD78DE8"],
            "text"=>"Lorem ipsum sit amet dolor"
        ]

        ,

        [
            "image"=>["url"=>"https://scontent.faep8-2.fna.fbcdn.net/v/t31.0-8/15419578_1241554222591302_6943603391225257833_o.jpg?oh=3a0696b926490e509a2966ea46dc3613&oe=5AC06314"],
            "text"=>"Lorem ipsum sit amet dolor"
        ]

        ,

        [
            "image"=>["url"=>"https://scontent.faep8-2.fna.fbcdn.net/v/t1.0-9/18118711_1380798242000232_1799777365254278954_n.jpg?oh=136fdc29384ecd7fc41982c951a50914&oe=5A88D985"],
            "text"=>"Lorem ipsum sit amet dolor"
        ]
    ];

?>

<div class="col-s-1 col-m-2 col-l-3 col-xl-4 flex">

    <?php
    foreach ($portfolio as $k=>$v)
    {
        ?>

        <a class="cl s-12 m-6 l-4 xl-3 portfolio-item">

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
