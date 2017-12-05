
<form   class="save flex padding"  data-ng-submit="saveFiles()">
    <script>
        app.controller('categoriesTreeController', function($rootScope, FileUploader) {

            $rootScope.categories=<?php echo json_encode($items);?>;

            $rootScope.treeOptions = {
                beforeDrop:function (e) {

                    var source = angular.copy(e.source.nodeScope.$modelValue);
                    source.belongs=0;
                    delete source.categories;

                    if( e.dest.nodesScope.$nodeScope && e.dest.nodesScope.$nodeScope.$modelValue)
                    {

                      var dest=e.dest.nodesScope.$nodeScope.$modelValue.id;
                      source.belongs=dest;


                    }


                    $rootScope.save(source,"category",function () {



                    });




                }
            };

            $rootScope.addCategory=function (cat) {


                $rootScope.save({name:cat,belongs:0},"category",function (e) {

                    $rootScope.categories.push(
                        {"name":cat,"categories":[],"id":parseInt(e.data)}
                    )

                });



            }

            $rootScope.deleteCategoryRecursive=function (id,arr) {

                if(!arr)
                {
                    arr=$rootScope.categories;
                }

                for (var i = 0; i < arr.length; i++) {

                    if (arr[i].id == id) {


                        return arr.splice(i,1);

                    }

                    if(arr[i].categories)
                    {
                        $rootScope.deleteCategoryRecursive(id,arr[i].categories);
                    }


                }


            }
            $rootScope.editCategory=function (item) {
                item.editing=true;
            }

            $rootScope.confirmEditCategory=function (item) {

                var itemToSave = angular.copy(item);

                delete itemToSave.editing;

                $rootScope.save(itemToSave,"category",function (e) {

                    delete item.editing;

                });

            }

            $rootScope.deleteCategory=function (id,arr) {

                $rootScope.delete(id,"category",function () {

                    $rootScope.deleteCategoryRecursive(id,arr);

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
            <div class="data">
                <span data-ng-if="!item.editing" ui-tree-handle class="name">{{item.name}}</span>
                <input data-ng-if="item.editing" class="edit-mode" data-ng-model="item.name">
            </div>

            <span data-ng-click="editCategory(item)"  data-ng-if="!item.editing"  class="edit"><i class="material-icons">&#xE254;</i></span>

            <span data-ng-click="confirmEditCategory(item)" data-ng-if="item.editing" class="edit confirm"><i class="material-icons">&#xE876;</i></span>


            <span data-ng-click="deleteCategory(item.id)" class="delete"><i class="material-icons">&#xE5CD;</i></span>

            <ol ui-tree-nodes="" ng-model="item.categories">
                <li ng-repeat="(k,item) in item.categories" ui-tree-node ng-include="'nodes_renderer.html'">
                </li>
            </ol>
        </script>

        <div ui-tree="treeOptions"  data-ng-if="categories.length > 0" class="categories-tree" >
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