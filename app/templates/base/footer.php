
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
        <a onclick="sendItems()" class=" btn">
          <?php echo $_LANG["modal.aceptar"];?>
        </a>
        <script>

            function sendItems() {
                var items=document.querySelectorAll(".checkbox [data-item]:checked");

                var itemsJson=[];

                for (var i = 0; i < items.length; i++) {
                    var item  = items[i];

                    itemsJson.push(JSON.parse(item.getAttribute('data-item')));

                }

                window.parent.postMessage(itemsJson, "<?php echo $_ENV["website"]["url"];?>");
            }

        </script>
    </footer>
    <?php
}?>