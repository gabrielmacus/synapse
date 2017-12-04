
<?php
if(empty($_GET["embed"])) {
    ?>
    <footer class=" padding base-footer">
        <a class="new btn"
           href="<?php echo (empty($href)) ? "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}/{$itemType}/save" : $href; ?>">
            <?Php echo $text; ?></a>
    </footer>
    <?php
}
else
{
    ?>
    <footer style="    position: fixed;
    right: 0;
    bottom: 0;" class=" padding base-footer">

        <a   onclick="sendItems()" class=" btn">
          <?php echo $_LANG["modal.aceptar"];?>
        </a>

        <a style="margin-right: 10px;" href="<?php echo (empty($href)) ? "{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}/{$itemType}/save?".http_build_query($_GET) : $href; ?>" class=" btn">
            <?php echo $text;?>
        </a>



        <a style="margin-right: 10px;"  onclick="closeModalParent()" class=" btn">
            <?php echo $_LANG["modal.cancelar"];?>
        </a>

        <script>
            
            function closeModalParent() {

                window.parent.postMessage({type:"close","group":"<?php echo $_GET["group"];?>"}, "<?php echo $_ENV["website"]["url"];?>");

            }

            function sendItems() {
                var items=document.querySelectorAll(".checkbox [data-item]:checked");

                var itemsJson=[];

                for (var i = 0; i < items.length; i++) {
                    var item  = items[i];

                    itemsJson.push(JSON.parse(item.getAttribute('data-item')));

                }


                window.parent.postMessage({type:"add","items":itemsJson,"group":"<?php echo $_GET["group"];?>"}, "<?php echo $_ENV["website"]["url"];?>");
            }

        </script>
    </footer>
    <?php
}?>