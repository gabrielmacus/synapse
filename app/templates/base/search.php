<div class="search">
    <?php unset($_GET["q"]); ?>
    <form method="get" action="?<?php  echo http_build_query($_GET);?>">

        <div class="form-block">
            <input name="q">
        </div>

        <div  class="form-block">
            <button  type="submit" >
               Buscar
            </button>

        </div>

    </form>


</div>