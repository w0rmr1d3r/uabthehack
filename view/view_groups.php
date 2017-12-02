<html>
    <head>
        <script src="js/custom_js.js"></script>
        <link rel="stylesheet" href="css/custom_styles.css">
    </head>
    <body>
        <div id="show-div">
              <table>
                  <tr>
                      <th>Name</th>
                  </tr>

            <?php
                foreach ($groups as $group)
                {
            ?>
                  <tr>
                    <td>
                        <a href="#" onclick="seePersonasInGroup(<?php echo $group->getId(); ?>)">
                          <?php echo $group->getName(); ?>
                        </a>
                    </td>
            <?php
                }
            ?>
                  </tr>
              </table>
        </div>
        <div>
            <a href="controller/controller_groups.php">Go to groups</a>
        </div>
    </body>
</html>
