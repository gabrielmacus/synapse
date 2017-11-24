<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 23/11/2017
 * Time: 22:39
 */


if(!empty($_LANG["menu.{$itemType}"]))
{
    //Busco si el tipo tiene categorias disponibles
    $categories = R::exec("SELECT * FROM category WHERE belongs = (SELECT id FROM category WHERE name = '{$_LANG["menu.{$itemType}"]}') ");

    if($categories)
    {
        $categories = R::findAll("category");


        foreach ($categories as $c)
        {
            if($c->name == $_LANG["menu.{$itemType}"])
            {
                $mainCategoryId=$c->id;
            }
        }

    }


}



