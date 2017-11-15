<h1>Sitio web</h1>
<?php
if(!empty($dataToSkin["streamings"]))
{
    ?>
    <div>
        <?php
        foreach ($dataToSkin["streamings"] as $k=>$v)
        {
            ?>
            <span><?php echo $v["name"];?></span>
            <?php
        }
        ?>
    </div>
    <?php
}
?>
