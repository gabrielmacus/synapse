
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
                    <img src="http://localhost/synapse-media/files/2017/11/30/5a2008e6b7fa2/file_1.jpg?w=426&h=230">
                </figure>

            </header>
            <section >


                <h2 class="ellipsis title"><?php echo $v["title"];?></h2>

                <time class="date"></time>

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