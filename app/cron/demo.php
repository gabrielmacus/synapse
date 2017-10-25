<?php
/**
 * Created by PhpStorm.
 * User: Puers
 * Date: 15/10/2017
 * Time: 20:45
 */

$user = R::dispense( 'user' );

$user->username = "gabrielmacus";

$user->password=hash('sha256',"demodemo");

$user->created_at = time();

$user->email = "gabrielmacus@gmail.com";

$user->name = "Gabriel";

$user->surname = "Macus";

$user->permissions_group = 10;

$id=R::store($user);
echo $id;