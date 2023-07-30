<!DOCTYPE html>
<html>
  <body>
    <?php require 'functions.php';?>

    <h2>New payment form</h2>
    <a href='/technical_task/'>Home</a><br><br>

    <form action="/technical_task/form_functions.php" method='post'>
      <select name="credit_no" id="credit">
        <?php 
          $credits_no = all_credits('credit_no');

          if(is_array($credits_no)){
            foreach($credits_no as $credit_no){
              echo '<option value="'.$credit_no['credit_no'].'">Credit No: '.$credit_no['credit_no'].'</option>';
            }

          }else{
            echo '<option value="None">None</option>';
          }
        ?>
      </select><br>
      <input type="number" id="payment_sum" name="payment_sum" placeholder="Payment in lv."><br>
      <input type="hidden" id="type_data" name="type_data" value="payment">
      <br><br>
      <input type="submit" value="Submit">
    </form> 

  </body>
</html>