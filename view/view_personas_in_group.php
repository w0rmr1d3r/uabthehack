<h3>Today is: <?php echo date('d-m-Y h:i:s'); ?></h3>
<ul>
<?php
    foreach ($personasInGroup as $persona)
    {
?>
    <li>
        <p><input type="checkbox" name="assistance[]" value="<?php  echo $persona->getId(); ?>"> <?php echo $persona->getName(); ?> <?php echo $persona->getLastName(); ?></p>
    </li>
<?php
    }
?>  
</ul>