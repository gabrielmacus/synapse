
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
        <div class="empty" data-ng-if="!categories || categories.length==0">
            <p><?php echo $_LANG["category.empty"];?></p>
        </div>

        <div data-ng-if="categories.length > 0" class="categories-tree" ui-tree>
            <ol ui-tree-nodes="" ng-model="categories">
                <li data-ng-if="!item.delete" ng-repeat="(k,item) in categories" ui-tree-node>
                    <div ui-tree-handle>
                        {{item.name}}
                    </div>
                    <ol ui-tree-nodes="" ng-model="item.categories">
                        <li  data-ng-if="!item.delete" ng-repeat="(j,subItem) in item.categories" ui-tree-node>
                            <div ui-tree-handle>
                                {{subItem.name}}
                            </div>
                            <span data-ng-click="deleteCategory(j,item.categories)" class="delete"><i class="material-icons">&#xE5CD;</i></span>
                        </li>
                    </ol>
                    <span data-ng-click="deleteCategory(k,categories)" class="delete"><i class="material-icons">&#xE5CD;</i></span>
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