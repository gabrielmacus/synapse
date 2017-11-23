
<form   class="save flex padding"  data-ng-submit="saveFiles()">
    <script>
        app.controller('categoriesTreeController', function($rootScope, FileUploader) {

            $rootScope.categories=[];

            $rootScope.treeOptions = {
                beforeDrop:function (e) {


                    if( e.dest.nodesScope.$nodeScope.$modelValue)
                    {

                        console.log( e.dest.nodesScope.$nodeScope.$modelValue.id);
                    }


                    /*
                    var dest = e.dest.nodesScope.$nodeScope.$modelValue.id;
                    var source = angular.copy(e.source.nodeScope.$modelValue);
                    source.belongs=dest;
                    console.log(source);
                    /*$rootScope.save(angular.copy(e.source.nodeScope.$modelValue),"category",function () {

                    });*/
                    return true;


                }
            };

            $rootScope.addCategory=function (cat) {


                $rootScope.save({name:cat,belongs:0},"category",function (e) {

                    $rootScope.categories.push(
                        {"name":cat,"categories":[],"id":e.data}
                    )

                });



            }
            $rootScope.deleteCategory=function (k,arr) {

                $rootScope.delete(arr[k].id,"category",function () {

                    $rootScope.categories.splice(k,1);

                });

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


        <!-- Nested node template -->
        <script type="text/ng-template" id="nodes_renderer.html">
            <div ui-tree-handle>
                {{item.name}}
            </div>
            <span data-ng-click="deleteCategory(k,item.categories)" class="delete"><i class="material-icons">&#xE5CD;</i></span>

            <ol ui-tree-nodes="" ng-model="item.categories">
                <li ng-repeat="(k,item) in item.categories" ui-tree-node ng-include="'nodes_renderer.html'">
                </li>
            </ol>
        </script>

        <div ui-tree  data-ng-if="categories.length > 0" class="categories-tree" >
            <ol ui-tree-nodes="" ng-model="categories" id="tree-root">
                <li ng-repeat="(k,item) in categories" ui-tree-node ng-include="'nodes_renderer.html'"></li>
            </ol>
        </div>


        <!--
        <div data-ng-if="categories.length > 0" class="categories-tree" ui-tree="treeOptions">
            <ol ui-tree-nodes="" ng-model="categories">
                <li ng-repeat="(k,item) in categories" ui-tree-node>
                    <div ui-tree-handle>
                        {{item.name}}
                    </div>
                    <ol ui-tree-nodes="" ng-model="item.categories">
                        <li ng-repeat="(j,subItem) in item.categories" ui-tree-node>
                            <div ui-tree-handle>
                                {{subItem.name}}
                            </div>
                            <span data-ng-click="deleteCategory(j,item.categories)" class="delete"><i class="material-icons">&#xE5CD;</i></span>
                        </li>
                    </ol>
                    <span data-ng-click="deleteCategory(k,categories)" class="delete"><i class="material-icons">&#xE5CD;</i></span>
                </li>
            </ol>
        </div>-->

    </div>



</form>

<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 21/11/2017
 * Time: 20:28
 */