<h3>Today is: <?php echo date('d-m-Y h:i:s'); ?></h3>
<form method="POST" action="controller/controller_assistance.php">
    <table>
        <tr>
            <th>Name</th>
            <th>Arrives</th>
            <th>Arrives late</th>
            <th>Not here</th>
        </tr>
<?php
        foreach ($personasInGroup as $persona)
        {
?>
        <tr>
            <td>
                <p><?php echo $persona->getName(); ?> <?php echo $persona->getLastName(); ?></p>
            </td>
            <td>
                <input type="radio" name="assistance[<?php echo $persona->getId(); ?>]" value="<?php echo ARRIVES; ?>" />
            </td>
            <td>
                <input type="radio" name="assistance[<?php echo $persona->getId(); ?>]" value="<?php echo ARRIVES_LATE; ?>" />
            </td>
            <td>
                <input type="radio" name="assistance[<?php echo $persona->getId(); ?>]" value="<?php echo NOT_HERE; ?>" />
            </td>
        </tr>
<?php
        }
?>
    </table>
    <input type="submit" value="Check Assistance">
</form>
