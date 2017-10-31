<?php

$editUrl="{$_ENV["website"]["root"]}/{$language}/{$_ENV["website"]["panelAccess"]}/{$itemType}/save";

$deletePrompt=$_LANG["{$itemType}.prompt.delete"];

if(count($items)>0)
{
    ?>
    <ul class="base-list flex" <?php if(!empty($controller)){ echo  "data-ng-controller='{$controller}'"; } ?>>
        <?php
        foreach ($items as $k=>$v)
        {
            ?>
            <li class="animated padding <?php if(!empty($v["active"])){ echo "active"; } ?>" >
                <a href="<?php echo (!empty($urlAction))?$urlAction."?id={$k}":"" ?>" class="name" data-id="<?Php echo $k;?>" ><?php echo $v["data1"];?></a>
                <span class="controls">

                    <?php
                    if(!empty($extraActions) && is_array($extraActions))
                    {
                        foreach ($extraActions as $clave=>$valor)
                        {
                            $clickAction = (!empty($valor["clickAction"]))?'data-ng-click=\''.str_replace("{item}",json_encode($v),$valor["clickAction"]).'\'':"";

                            $href = (!empty($valor["href"]))?"href=".$valor["href"]:"";
                            ?>
                            <a class="<?php echo $clave?>" <?php echo $href; ?> <?php echo $clickAction?>><?php echo $valor["icon"]?></a>
                            <?php
                        }
                    }
                    ?>

                    <a class="edit" href="<?php echo $editUrl."?id={$v["id"]}"; ?>"><i class="material-icons">&#xE254;</i></a>
				
                    <a data-ng-click="openModal('<?php echo str_replace("{i}",$v["data1"],$deletePrompt)?>','yesNo',false,'delete(\'<?php echo $itemType ?>\',<?php echo $k; ?>)')" class="delete" oncli><i class="material-icons">&#xE872;</i></a>
					
                </span>
            </li>
            <?php
        }
        ?>

    </ul>
    <?php
}?>