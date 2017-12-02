<html>
    <head>
        <script src="../js/custom_js.js"></script>
    </head>
    <body>
        <div id="show-div">
            <ul>
            <?php
                foreach ($groups as $group)
                {
            ?>
                <li>
                    <a href="#" onclick="seeGroup(<?php echo $group->getId(); ?>)">
                        <?php echo $group->getName(); ?>
                    </a>
                </li>
            <?php
                }
            ?>  
            </ul>
        </div>
        <div>
            <a href="../controller/controller_groups.php">Go to groups</a>
        </div>
    </body>
</html>