<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 04/12/2017
 * Time: 02:10 PM
 */


if(!empty($oSql) && empty($_GET["id"]) && empty($dontPaginate))
{
    $limit = (!empty($limit))?$limit:$_ENV["pagination"]["limit"];

    $p = (!empty($_GET["p"]) && is_numeric($_GET["p"]) && $_GET["p"] > 0)? $_GET["p"] - 1 : 0;

    $offset = $p * $limit;

    $oSqlCount = "SELECT count(*) as 'total' FROM ({$oSql}) as cant";

    $oPageResult = R::getAll($oSqlCount,$params);

    if(!empty($oPageResult))
    {
        $oResultCount= $oPageResult[0]['total'];

        $oPages = ceil($oResultCount / $limit);

        if(!empty($_GET["p"]) && $oPages > 0 && $_GET["p"] > $oPages)
        {

            //Si estoy en una pagina vacia, voy a la ultima con contenido
            $_GET["p"] = $oPages;
            header("Location: ?".http_build_query($_GET));

        }

        $_PAGINATION["pages"] = $oPages;
        $_PAGINATION["results"] = $oResultCount;
        $_PAGINATION["actualPage"] = ($p+1);
        $_PAGINATION["paginator"]=[];



        for ($i=$_ENV["pagination"]["paginatorOffset"];$i>0;$i--)
        {

            $prevPage = $_PAGINATION["actualPage"] - $i ;

            if($prevPage > 0)
            {

                $_PAGINATION["paginator"][$prevPage]["url"] ="?p={$prevPage}";

            }

        }

        for ($i=1;$i <= $_ENV["pagination"]["paginatorOffset"];$i++)
        {
            $nextPage =$_PAGINATION["actualPage"] + $i;

            if($nextPage <= $_PAGINATION["pages"])
            {

                $_PAGINATION["paginator"][$nextPage]["url"] ="?p={$nextPage}";
            }


        }
        if($_PAGINATION["actualPage"] - 1 > 0)
        {
            $_PAGINATION["prevPage"] = $_PAGINATION["actualPage"] - 1;
        }

        if($_PAGINATION["actualPage"] + 1 <= $_PAGINATION["pages"])
        {
            $_PAGINATION["nextPage"] = $_PAGINATION["actualPage"] + 1;
        }




        $_PAGINATION["paginator"][$_PAGINATION["actualPage"]]["active"]=true;

        $_PAGINATION["paginator"][$_PAGINATION["actualPage"]]["url"] = "?p={$_PAGINATION["actualPage"]}";

        ksort($_PAGINATION["paginator"]);

        $oSql = "{$oSql} LIMIT {$limit} OFFSET {$offset} ";
    }




}