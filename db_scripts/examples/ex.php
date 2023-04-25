<?php
session_start();
if(isset($_POST['submit'])) {
  $_SESSION['selected_option'] = $_POST['options'];
  header('Location:ex2.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dropdown List Example</title>
  </head>
  <body>
    <form method="post">
      <select name="options">
        <option value="option1">kagal</option>
        <option value="option2">kolhapur</option>
        <option value="option3">karnur</option>
      </select>
      <br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
