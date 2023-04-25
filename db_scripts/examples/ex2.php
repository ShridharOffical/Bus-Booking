<?php
session_start();
if(isset($_SESSION['selected_option'])) {
  $selected_option = $_SESSION['selected_option'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Page 2</title>
  </head>
  <body>
    <p>The selected option is: <?php echo $selected_option; ?></p>
  </body>
</html>
