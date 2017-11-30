
<script type="text/javascript">
//https://glinford.github.io/ellipsis.js/
window.onload=function () {

    Ellipsis({
        class: '.clip',
        lines: 5
    })

}
</script>
<div class="fila col-s-1 col-m-2 col-l-2 col-xl-3">
    <?php
    foreach ($data as $k => $v)
    {

        ?>
        <article class="cl s-12 m-6 l-6 xl-4  post">
            <header>
                <h2 class="ellipsis"><?php echo $v["title"];?></h2>
            </header>
            <section >

                <figure>
                    <img src="http://hdwpro.com/wp-content/uploads/2016/01/Hd-Old-Car.jpeg">
                </figure>

                <div class="clip text">

                        <?php echo $v["text"];?>

                </div>

            </section>
        </article>
        <?php
    }
    ?>
</div>