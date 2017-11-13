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
            $imagen = R::dispense("image");

            $imagen->name="woods.jpg";

            $post = R::dispense("post");

            $post->title="The forest";

            $post->link("post_imagen",
                [
                    'caption'=>"blahh foobar"
                ])->setAttr("image",$imagen);

            R::storeAll([$post,$imagen]);

            break;

        case 2:

            break;

    }
}

//$vase->ownProductTagList;

echo "ok";