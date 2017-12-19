
<form data-ng-controller="workController"  class="save flex padding" <?php if(!empty($_GET["id"])){ echo "data-ng-init='load({$_GET["id"]})'"; } ?> data-ng-submit="saveWork()">


    <?php
    include (TEMPLATE_PATH."/base/form/categories.php");
    ?>

    <?php
    $data1Attr="name";
    $imageAttr="url";
    $associatedType="file";
    $groupName="images";
    $filters=["formats"=>"jpg,png,jpeg"];
    include (TEMPLATE_PATH."/base/form/associated.php");
    ?>


    <?php
    $type="text";
    $label=$_LANG["{$itemType}.text"];
    $model="{$itemType}.text";
    include (TEMPLATE_PATH."/base/form/input.php");
    ?>

    <?php
    $multiple=true;
    $label=$_LANG["form.publish"];
    $model="{$itemType}.publish";
    $options=["fb"=>$_LANG["form.publish.facebook"],"insta"=>$_LANG["form.publish.instagram"]];
  //  include (TEMPLATE_PATH."/base/form/select.php");
    ?>

    <div class="form-block sn-publish">

        <?php
        foreach($options as $k=>$v)

        {
            ?>
            <div>
                <label for="cbox-<?php echo $k;?>"><?php echo $v?></label>
                <input id="cbox-<?php echo $k;?>" data-ng-model="<?php echo $itemType?>.publish.<?php echo $k;?>" data-ng-true-value="true" data-ng-false-value="false"  type="checkbox">
            </div>

            <?Php
        }
        ?>

    </div>



    <?php
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>

</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/async/2.6.0/async.min.js"></script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId            : '<?php echo $_ENV["auth"]["fb"]["appId"];?>',
            autoLogAppEvents : true,
            xfbml            : true,
            version          :'<?php echo $_ENV["auth"]["fb"]["version"];?>'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    app.controller('workController', function($scope,$rootScope,$http) {


        if(!$rootScope.<?php echo $itemType?>)
        {
            $rootScope.<?php echo $itemType?>={};
        }

        $rootScope.saveWork=function () {

            async.waterfall([
                function(callback) {

                    if($rootScope.<?php echo $itemType?>.publish)
                    {
                        if( $rootScope.<?php echo $itemType?>.publish.fb)
                        {
                            FB.login(function(response) {
                                if (response.authResponse) {


                                    FB.api("/<?php echo $_ENV["siteEnv"]["fb"]["pageId"]?>", {fields: 'access_token'}, function(response) {


                                        $rootScope.<?php echo $itemType?>.publish.fb = {fbToken:response.access_token};

                                        callback();



                                    });



                                }

                                // save(<?php echo $itemType;?>);


                            }, {scope: '<?php echo $_ENV["auth"]["fb"]["scopes"]?>'});
                        }
                        else
                        {
                            callback();
                        }

                    }
                    else
                    {
                        callback();
                    }


                },
                function(  callback) {


                   $rootScope.save($rootScope.<?php echo $itemType?>);

                },
                function(callback) {

                }
            ], function (err, result) {
                // result now equals 'done'
            });






        }

    });


</script>