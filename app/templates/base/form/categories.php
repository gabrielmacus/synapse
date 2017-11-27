<?php
if(!empty($categories))
{
    ?>
    <div  class="categories-select form-block" data-ng-controller="<?php echo $itemType?>CategoriesController">

        <div class="form-block scale-fade" data-ng-repeat="(k,s) in selects" >


            <div  class="form-block " data-ng-if="s.categories.length">
                <label><?php echo $_LANG["form.category"];?> {{k + 1}}</label>
                <select data-ng-class="s.model"  data-ng-change="changeCategory(s.model,k)" data-ng-model="s.model">


                    <option data-ng-repeat="item in s.categories"  data-ng-value="{{item.id}}">{{item.name}}</option>
                </select>
            </div>



        </div>

    </div>

    <script>
        app.controller("<?php echo $itemType?>CategoriesController", function($rootScope) {



            $rootScope.selects = [];

            $rootScope.categories = <?php echo json_encode(array_values($categories));?>;

            $rootScope.category1={};

            $rootScope.selects.push({"model":$rootScope.category1,"categories":$rootScope.categories.filter(function (p1, p2, p3) { return p1.belongs ==<?php echo $mainCategoryId?>;  })});

            $rootScope.changeCategory=function (id,k) {



                $rootScope.selects = $rootScope.selects.slice(0,k+1);

                var filter  =  $rootScope.categories.filter(function (el) {
                    return el.belongs == id;
                });

                if(!$rootScope.<?php echo $itemType ?>)
                {
                    $rootScope.<?php echo $itemType ?>={};
                }

                $rootScope.<?php echo $itemType ?>.category_id=id;

                $rootScope["category"+$rootScope.selects.length]={};

                $rootScope.selects.push({"model":$rootScope["category"+$rootScope.selects.length],"categories":filter});


            }


            var unbindWatch = $rootScope.$watch("<?php echo $itemType?>",
                function (newValue,oldValue) {


                    if(!oldValue && newValue){

                        //Ya fueron cargados los datos
                        if(newValue["categories"])
                        {

                            newValue["categories"].splice(0,1);

                            for(var k in newValue["categories"])
                            {
                                var id = parseInt(newValue["categories"][k]["id"]);

                                $rootScope.selects[$rootScope.selects.length-1].model = id;

                                $rootScope.changeCategory(id,k);


                            }
                        }

                        unbindWatch();

                    }


                })








        });

    </script>
    <?php
}
?>