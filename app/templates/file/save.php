
<form   class="save flex padding"  data-ng-submit="saveFiles()">
    <script>
        app.controller('uploadController', function($rootScope, FileUploader) {
            $rootScope.uploader = new FileUploader(
                {autoUpload :true,url:"<?php echo "{$_ENV["website"]["url"]}"?>/panel/file/upload?act=true"}
            );


            $rootScope.uploads=<?php echo json_encode($items);?>;



            $rootScope.uploader.onBeforeUploadItem = function(item) {
                item.edited=true;
                $rootScope.uploads.push(item);
               // console.info('onBeforeUploadItem', item);
            };
            $rootScope.uploader.onProgressItem = function(fileItem, progress) {


                console.info('onProgressItem', fileItem, progress);
            };
            $rootScope.uploader.onCompleteItem = function(fileItem, response, status, headers) {

                var idx = $rootScope.uploads.indexOf(fileItem);


                if(!fileItem.isError )
                {
                    //TODO deberia aparecer un toast avisandome que el archivo se subio correctamente
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

                    //Elimino el qs
                    ext = ext.split("?")[0];

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

            $rootScope.onChangeItem=function (item) {

                $rootScope.uploads[item].edited=true;

            }
            $rootScope.deleteFile=function (item) {

                if($rootScope.uploads[item].file.id)
                {
                    $rootScope.uploads[item].file.delete=true;
                    $rootScope.uploads[item].edited=true;
                }
                else
                {
                    $rootScope.uploads.splice(item,1);
                }

            }

            $rootScope.saveFiles=function () {

                asyncForEach($rootScope.uploads.filter(function (el) { return el.edited == true; }),function () {

                    location.reload();

                },function (item,index,next) {

                    var file = item.file;


                    var saveFile ={"url":file.url,"name":file.name,"description":file.description};

                    if(file.id)
                    {
                        saveFile.id=file.id;
                    }
                    if(file.delete)
                    {
                        saveFile.delete = true;
                    }

                    $rootScope.save(saveFile,"file",function () {

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


        <ul class="uploads col-3 fila">
            <li class="scale-fade cl cl-4" ng-repeat="(k,upload) in uploads">

                <span class="delete" data-ng-click="deleteFile(k)"><i class="material-icons">&#xE5CD;</i></span>

                <div class="deleted-overlay scale-fade" data-ng-if="upload.file.delete">
                    <i class="material-icons">&#xE872;</i>
                </div>


                <figure data-ng-if="getType(upload.file.url ) == 'image'">
                    <img data-ng-src="{{upload.file.url}}?w=426&h=200">
                </figure>

                <?php
                $type="text";
                $model="upload.file.name";
                $onChange="onChangeItem(k)";
                $placeholder=$_LANG["file.name"];
                include (TEMPLATE_PATH."/base/form/input.php");

                $type="text";
                $model="upload.file.description";

                $onChange="onChangeItem(k)";
                $placeholder=$_LANG["file.description"];
                include (TEMPLATE_PATH."/base/form/input.php");

                ?>

            </li>
        </ul>

        <div data-ng-if="uploads.length == 0" class="scale-fade empty">

            <p><?php echo $_LANG["file.empty"];?></p>
        </div>


    </div>


    <?php
    $text1 =$_LANG["{$itemType}.submit"];
    $text2 =$_LANG["{$itemType}.cancel"];
    include (TEMPLATE_PATH."/base/form/submit.php");
    ?>

</form>

