<ul>
<?php
    foreach ($personasInGroup as $persona)
    {
?>
        <li>
            <p><?php echo $persona->getName(); ?> <?php echo $persona->getLastName(); ?></p>
        </li>
<?php
    }
?>  
</ul>