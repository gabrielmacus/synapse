<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 11/11/2017
 * Time: 11:02
 */



if(!empty($_GET["act"]))
{

    switch ($_GET["act"])
    {
        case 1:
            //Asi guardo contenido asociado con datos en la tabla intermedia

            $imagen = R::findOne('imagen'," id = ? ",[1]);

            $post = R::dispense("post");

            $post->title="The forest";

            $post->link("post_imagen",
                [
                    'caption'=>"blahh foobar"
                ])->setAttr("image_id",$imagen);

            R::store($post);

            break;

        case 2:
            $imagen = R::dispense("image");

            $imagen->name="woods.jpg";


            R::store($imagen);

            break;

    }
}

//$vase->ownProductTagList;
echo hash('sha256',"sercan02");;
echo "<br>";
echo "ok";