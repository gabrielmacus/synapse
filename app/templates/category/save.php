
<form   class="save flex padding"  data-ng-submit="saveFiles()">
    <script>
        app.controller('categoriesTreeController', function($rootScope, FileUploader) {

        });
    </script>

    <div class="form-block" data-ng-controller="categoriesTreeController">


    </div>


    <?php
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>

</form>

<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 21/11/2017
 * Time: 20:28
 */