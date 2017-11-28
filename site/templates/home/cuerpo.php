
<script type="text/javascript">
//https://glinford.github.io/ellipsis.js/
window.onload=function () {

    Ellipsis({
        class: '.clip',
        lines: 3
    })

}
</script>
<div class="fila col-4">
    <?php
    foreach ($data as $k => $v)
    {

        ?>
        <article class="cl cl-3">
            <header>
                <h2><?php echo $v["title"];?></h2>
            </header>
            <section class="clip">
                <p>
                    <?php echo $v["text"];?>
                </p>
            </section>
        </article>
        <?php
    }
    ?>
</div>