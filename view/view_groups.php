
<ul>
<?php
    foreach ($groups as $group)
    {
?>
        <li>
            <a href="#" onclick="seeGroup(<?php echo $group->getId(); ?>)"><?php echo $group->getName(); ?></a>
        </li>
<?php
    }
?>  
</ul>
