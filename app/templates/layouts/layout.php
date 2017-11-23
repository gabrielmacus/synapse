<!doctype html>
<html lang="<?php echo $language; ?>">
<head>
   
    <?php
    include (TEMPLATE_PATH."/base/head.php");
    ?>
    <title>Document</title>
</head>
<body data-ng-controller="mainController" data-ng-app="app" class="flex <?php if(!empty($bodyClass)){ echo implode(" ",$bodyClass); }?>">

<?php
if(empty($_GET["embed"]))
{
    ?>
    <div class="mobile-header">
        <a  data-ng-click="toggleMenu()" class=" hamburguer">
            <i class="material-icons">&#xE5D2;</i>
        </a>

    </div>
    <header class="main-header flex animated" data-ng-class="menuIsOpened">
        <?php
        if(isset($incNavbar))
        {
            include ($incNavbar);
        }
        ?>
    </header>
    <?php
}
?>


<section    class="main-container flex animated">
    <script>
      
        var app = angular.module('app', ['ngAnimate','angular-sortable-view','angularFileUpload','ui.tree']);





        app.controller('mainController', function($scope,$rootScope,$http) {

            $rootScope.inArray=function (needles,haystack) {


               if(needles && haystack)
               {
                   for (var k in needles)
                   {
                       if(haystack.indexOf(needles[k])> -1)
                       {
                           return true;
                       }
                   }

               }

                return false;

            };

            $rootScope.toggleMenu = function () {

                if(!$rootScope.menuIsOpened)
                {
                    $rootScope.menuIsOpened ="active";
                }
                else
                {
                    $rootScope.menuIsOpened ="";
                }


            }
            scope =$rootScope;
            $rootScope.error=function(e){

                console.log(e);

                if(typeof e.data == "object")
                {
                    $rootScope.errors=e.data;
                }
                else
                {

                    $rootScope.openModal(JSON.parse(e.data),'message','error')

                }


            }
            
            $rootScope.load=function(id,type)
            {
                if(!type && <?php echo !empty($itemType); ?>)
                {
                    type="<?php echo $itemType ?>";
                }
                var url="<?php echo "{$_ENV["website"]["url"]}/{$language}/{$_ENV["website"]["panelAccess"]}/";?>"+type+"?act=true&id="+id;
                console.log(url);
                $http.get(url)
                    .then(function (e) {
                        //console.log(e.data);

                        for (var k in e.data)
                        {
                            $rootScope[type] =e.data[k] ;
                            return true;
                        }



                    },$rootScope.error);


            }

            $rootScope.delete  = function (id,type,callback) {

                if(!type && <?php echo !empty($itemType); ?>)
                {
                    type="<?php echo $itemType ?>";
                }
                var url = "<?php echo "{$_ENV["website"]["url"]}/{$language}/{$_ENV["website"]["panelAccess"]}/"; ?>"+type+"/delete?id="+id+"&act=true";

                $http.get(url)
                    .then(function (e) {
                        console.log(e.data);

                        if(!callback)
                        {
                            location.reload();
                        }
                        else
                        {
                            callback();
                        }


                    },$rootScope.error);


            }
            $rootScope.save=function (data,type,callback) {
                if(!type && <?php echo !empty($itemType); ?>)
                {
                    type="<?php echo $itemType ?>";
                }
                var url = "<?php echo "{$_ENV["website"]["url"]}/{$language}/{$_ENV["website"]["panelAccess"]}/"; ?>"+type+"/save?act=true";


                $rootScope.errors={};
                var config = {
                    headers : {
                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                    }
                }
                
                $http.post(url,param(data),config)
                    .then(function (e) {

                        if(!callback)
                        {
                        return    location.reload();
                        }

                        return callback(e);


                    },$rootScope.error);
            }

            $rootScope.acceptModal= function () {

                $rootScope.$eval($rootScope.modal.action);
                $rootScope.closeModal();
            }
            $rootScope.openModal=function (msg,type,mode,action) {

                $rootScope.modal  = {};
                $rootScope.modal[type] = true;

                switch(type)
                {
                    default:
                        $rootScope.modal["text"]=msg;
                        break;

                    case "iframe":
                        $rootScope.modal[type] = msg;
                        break;


                }

                if(mode)
                {
                    $rootScope.modal["class"]=mode;
                }

                if(action)
                {
                    $rootScope.modal["action"]=action;
                }

            }
            $rootScope.closeModal=function () {
                $rootScope.modal  = false;
            }

            $rootScope.removeAssociated=function (i,arr) {



                if(arr.save[i]["link_id"])
                {
                    if(!arr.delete)
                    {
                        arr.delete=[];
                    }


                    arr.delete.push(angular.copy(arr.save[i]));


                }
                arr.save.splice(i,1);


            }

        });

    </script>

    <?php include ($incBody);?>
</section>
<?php include (TEMPLATE_PATH."/modal/message.php"); ?>
<?php include (TEMPLATE_PATH."/modal/yesNo.php"); ?>
<?php include (TEMPLATE_PATH."/modal/iframe.php"); ?>


</body>
</html>