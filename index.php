<!DOCTYPE html>
<html>
  <head>
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
    </style>
  </head>
  <body>
    <?php require 'functions.php';?>

    <?php
      if(!empty($_GET['message'])){
        echo '<h3>'.$_GET['message'].'</h3>';
      }
    ?>

    <a href='/technical_task/credit_form.php'>New credit</a>
    <a href='/technical_task/payment_form.php'>New payment</a><br><br>

    <table>
      <tr>
        <th>Name</th>
        <th>Credit</th>
        <th>Term</th>
        <th>Montly payment</th>
        <th>All Payments</th>
        <th>Remaining credit</th>
      </tr>
      <tr>
        <?php 
          $credits = all_credits('all');
          
          if(is_array($credits)){
            foreach($credits as $credit){

              $monthly_payment = $credit['credit'] / $credit['term'];
              $remaining_credit = $credit['credit'] - $credit['all_payments'];

              echo '<tr>';
              echo '<td>'.$credit['name'].'</td>';
              echo '<td>'.$credit['credit'].'</td>';
              echo '<td>'.$credit['term'].' month/s</td>';
              echo '<td>'.$monthly_payment.'</td>';
              echo '<td>'.$credit['all_payments'].'</td>';
              echo '<td>'.$remaining_credit.'</td>';
              echo '</tr>';
            }

          }else{
            echo '<td colspan=6>Nothing</td>';
          }
        ?>
      </tr>
    </table>
  </body>
</html>