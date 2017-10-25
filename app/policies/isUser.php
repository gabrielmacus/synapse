<?php


if($userData->permissions_group<5)
{
   if(empty($_GET["act"]))
   {
	   $streaming = R::findOne("streaming"," pid != '' ",[]);
	
	if(empty($streaming))
	{
		$streaming = R::findOne("streaming");
	}
	
	   header("Location: {$_ENV["website"]["root"]}/streaming/watch?id={$streaming->id}");
	   exit();
   }
   else
   {
	   throw new Exception("user.error.permissions",403);
   }

	$incNavbar=TEMPLATE_PATH."/navbars/navbar-invitado.php";
}
?>