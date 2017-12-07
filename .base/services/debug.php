<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 07/12/2017
 * Time: 10:30 AM
 */
class DebugService
{

    static function print_formatted($data)
    {
        ?>
        <pre>
            <?php print_r($data); ?>
        </pre>
        <?php
    }
}