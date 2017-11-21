
<form   class="save flex padding" <?php if(!empty($_GET["id"])){ echo "data-ng-init='load({$_GET["id"]})'"; } ?> data-ng-submit="saveFiles()">
    <script>
        app.controller('uploadController', function($rootScope, FileUploader) {
            $rootScope.uploader = new FileUploader(
                {autoUpload :true,url:"<?php echo "{$_ENV["website"]["url"]}"?>/panel/file/upload?act=true"}
            );
            $rootScope.uploads=[];
            $rootScope.uploader.onBeforeUploadItem = function(item) {
                $rootScope.uploads.push(item);
                console.info('onBeforeUploadItem', item);
            };
            $rootScope.uploader.onProgressItem = function(fileItem, progress) {


                console.info('onProgressItem', fileItem, progress);
            };
            $rootScope.uploader.onCompleteItem = function(fileItem, response, status, headers) {

                var idx = $rootScope.uploads.indexOf(fileItem);


                if(!fileItem.isError )
                {

                    $rootScope.uploads[idx].file.url = response[0];
                }
                else
                {
                    //TODO deberia aparecer un toast avisandome que hay un error al subir un archivo

                    $rootScope.uploads.splice(idx,1);
                }



                console.info('onCompleteItem', fileItem, response, status, headers);
            };

            $rootScope.getType=function (url) {

                if(url)
                {
                    var ext = url.split(".");



                    ext = ext[ext.length - 1];

                    switch (ext)
                    {
                        default:
                            return "binary";

                        case "png":
                        case "svg":
                        case "gif":
                        case "jpg":

                            return "image";

                            break;
                    }


                }
                return false;

            }

            $rootScope.saveFiles=function () {

                asyncForEach($rootScope.uploads,function () {

                },function (item,index,next) {

                    var file =$rootScope.uploads[index].file;

                    console.log(file);


                    $rootScope.save({"url":file.url,"name":file.name,"description":file.description},"file",function () {

                        next();
                    });



                });

            }
        });
    </script>

    <div class="form-block" data-ng-controller="uploadController">

        <!--
        <input type="file" nv-file-select uploader="uploader"/><br/>
        --><div ondrop="onDragLeaveFile(event)" ondragleave="onDragLeaveFile(event)" ondragover="onDragFile(event)" nv-file-drop="" uploader="uploader" class="drop-zone" >
            <div nv-file-over="" uploader="uploader" class="" >
                <p ><?php echo $_LANG["file.dropZone"];?> <i class="material-icons">&#xE2C3;</i></p>
            </div>
        </div>

        <script>
            function  onDragFile() {
                document.querySelector("[uploader][nv-file-over]").classList.add("dragging-file");
            }
            function onDragLeaveFile() {
                document.querySelector("[uploader][nv-file-over]").classList.remove("dragging-file");
            }
        </script>


        <ul class="uploads col-3">
            <li class="scale-fade cl cl-4" ng-repeat="(k,upload) in uploads">


                <figure data-ng-if="getType(upload.file.url ) == 'image'">
                    <img data-ng-src="{{upload.file.url}}">
                </figure>

                <?php
                $type="text";
                $model="upload.file.name";
                $placeholder=$_LANG["file.name"];
                include (TEMPLATE_PATH."/base/form/input.php");

                $type="text";
                $model="upload.file.description";
                $placeholder=$_LANG["file.description"];
                include (TEMPLATE_PATH."/base/form/input.php");

                ?>

            </li>
        </ul>


    </div>


    <?php
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>

</form>

