<!doctype html>
<html lang="<?php echo $language; ?>">
<head>
   
    <?php
    include (TEMPLATE_PATH."/base/head.php");
    ?>
    <title>Document</title>
</head>
<body data-ng-controller="mainController" data-ng-app="app" class="flex <?php if(!empty($bodyClass)){ echo implode(" ",$bodyClass); }?>">

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

<section    class="main-container flex animated">
    <script>
      
        var app = angular.module('app', ['ngAnimate']);

        app.controller('mainController', function($scope,$rootScope,$http) {

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
            
            $rootScope.load=function(url,item)
            {
                $http.get(url)
                    .then(function (e) {
                        console.log(e.data);

                        for (var k in e.data)
                        {
                            $rootScope[item] =e.data[k] ;
                            return true;
                        }



                    },$rootScope.error);


            }

            $rootScope.delete  = function (url) {


                $http.get(url)
                    .then(function (e) {
                        console.log(e.data);

                        location.reload();

                    },$rootScope.error);


            }
            $rootScope.save=function (url,data) {

                $rootScope.errors={};
                var config = {
                    headers : {
                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                    }
                }
                
                $http.post(url,param(data),config)
                    .then(function (e) {

                        location.reload();

                    },$rootScope.error);
            }

            $rootScope.acceptModal= function () {

                $rootScope.$eval($rootScope.modal.action);
                $rootScope.closeModal();
            }
            $rootScope.openModal=function (msg,type,mode,action) {

                $rootScope.modal  = {};
                $rootScope.modal[type] = true;

                $rootScope.modal["text"]=msg;

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


        });

    </script>

    <?php include ($incBody);?>
</section>
<?php include (TEMPLATE_PATH."/modal/message.php"); ?>
<?php include (TEMPLATE_PATH."/modal/yesNo.php"); ?>
</body>
</html>