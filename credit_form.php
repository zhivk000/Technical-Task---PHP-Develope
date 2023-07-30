<!DOCTYPE html>
<html>
  <body>

    <h2>New credit form</h2><br>
    <?php
      if(!empty($_GET['message'])){
        echo '<h3>'.$_GET['message'].'</h3>';
      }
    ?>
    <a href='/technical_task/'>Home</a><br><br>

    <form action="/technical_task/form_functions.php" method="post">
      <input type="text" id="client_name" name="client_name" placeholder="Name"><br>
      <input type="number" id="credit_sum" name="credit_sum" placeholder="Credit in lv." min="1" max="80000"><br>
      <select name="term" id="term">
        <?php for ($x = 1; $x <= 12; $x++) {
          echo '<option value="'. $x .'">'. $x .' month</option>';
        }
        ?>
      </select><br><br>
      <input type="hidden" id="type_data" name="type_data" value="credit">
      <input type="submit" value="Submit">
    </form> 

  </body>
</html>