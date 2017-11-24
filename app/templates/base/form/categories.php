<?php
if(!empty($categories))
{
    ?>
    <div  class="categories-select form-block" data-ng-controller="<?php echo $itemType?>CategoriesController">

        <div class="form-block" data-ng-repeat="(k,s) in selects">

            <select data-ng-change="changeCategory(s.model,k)" data-ng-model="s.model">

                <option data-ng-repeat="item in categories" data-ng-if="item.belongs == s.belongs" data-ng-value="{{item.id}}">{{item.name}}</option>
            </select>

        </div>

    </div>

    <script>
        app.controller("<?php echo $itemType?>CategoriesController", function($rootScope) {

            $rootScope.selects = [];

            $rootScope.categories = <?php echo json_encode($categories);?>;

            $rootScope.selects.push({"model":"category1","belongs":<?php echo $mainCategoryId?>});

            $rootScope.changeCategory=function (id,k) {


                $rootScope.selects = $rootScope.selects.slice(0,k+1);
                $rootScope.selects.push({"model":"category"+id,"belongs":id});

            }

        });

    </script>
    <?php
}
?>