
<form   class="save flex padding"  data-ng-submit="saveFiles()">
    <script>
        app.controller('categoriesTreeController', function($rootScope, FileUploader) {

            $rootScope.categories=[];

            $rootScope.addCategory=function (cat) {



                $rootScope.categories.push(
                    {"name":cat,"categories":[]}
                )


            }
            $rootScope.deleteCategory=function (k,arr) {

                arr[k].delete=true;

            }
        });
    </script>

    <div class="category-add">
        <?php
        $type="text";
        $model="newCategory";
        $class="new-category";
        $label=$_LANG["category.new"];
        include (BASE_PATH."/app/templates/base/form/input.php");

        $type="button";
        $class="new-category material-icons";
        $value='&#xE145;';
        $onClick="addCategory(newCategory)";
        include (BASE_PATH."/app/templates/base/form/input.php");

        ?>

    </div>



    <div class="form-block" data-ng-controller="categoriesTreeController">


        <div ui-tree>
            <ol ui-tree-nodes="" ng-model="list">
                <li ng-repeat="item in list" ui-tree-node>
                    <div ui-tree-handle>
                        {{item.title}}
                    </div>
                    <ol ui-tree-nodes="" ng-model="item.items">
                        <li ng-repeat="subItem in item.items" ui-tree-node>
                            <div ui-tree-handle>
                                {{subItem.title}}
                            </div>
                        </li>
                    </ol>
                </li>
            </ol>
        </div>

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