
<script type="text/javascript">
//https://glinford.github.io/ellipsis.js/
window.onload=function () {

    Ellipsis({
        class: '.clip',
        lines: 5
    })

}
</script>
<div class="fila col-s-1 col-m-2 col-l-2 col-xl-3 flex">
    <?php
    foreach ($data as $k => $v)
    {

        ?>
        <article class="cl s-12 m-6 l-6 xl-4  post">
            <header>

                <figure>
                    <img src="<?PHP echo $v["image"];?>">
                </figure>

                <span class="amount">$1000</span>

            </header>
            <section >

                <div class="fila date">
                    <time class="date">16-06-2017</time>

                    <span class="category">Autos</span>
                </div>

                <h2 class="ellipsis title"><?php echo $v["title"];?></h2>


                <div class=" text-container">

                    <div class="text clip">
                        <?php echo $v["text"];?>

                    </div>


                </div>

            </section>
        </article>
        <?php
    }
    ?>
</div>