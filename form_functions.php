<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "credit_test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$type_data = $_POST['type_data'];

	if($type_data == 'credit'){

		$name = $_POST['client_name'];
		$credit_sum = $_POST['credit_sum'];
		$term = $_POST['term'];

		$query_credits = "SELECT credit_no, name, credit, term FROM credits WHERE name LIKE '".$name."'";
		$result_credits = $conn->query($query_credits);

		if ($result_credits->num_rows > 0) {
			$all_credit = 0;
			while($row_credit = $result_credits->fetch_assoc()) {
				$all_credit = $all_credit + $row_credit['credit'];
			}

			$all_credit = $all_credit + $credit_sum;

			if($all_credit > 80000){
				header("Location: http://localhost/technical_task/credit_form.php?message='You exceed the maximum of 80 000 credit'");
			}else{

				$query = "INSERT INTO credits (name, credit, term) VALUES ('".$name."', ".$credit_sum.", ".$term.")";

				if($conn->query($query) === TRUE){
					header("Location: http://localhost/technical_task/");
				}else{
					echo "Error: " . $conn->error;
				}
			}
		}else{

			$query = "INSERT INTO credits (name, credit, term) VALUES ('".$name."', ".$credit_sum.", ".$term.")";

			if($conn->query($query) === TRUE){
				header("Location: http://localhost/technical_task/");
			}else{
				echo "Error: " . $conn->error;
			}

		}

	}elseif($type_data == 'payment'){
		$credit_no = $_POST['credit_no'];
		$payment_sum = $_POST['payment_sum'];

		$query_credits = "SELECT credit_no, name, credit, term FROM credits WHERE credit_no = '".$credit_no."'";
		$result_credits = $conn->query($query_credits);

		if ($result_credits->num_rows > 0) {
			$all_credit = 0;
			while($row_credit = $result_credits->fetch_assoc()) {
				$all_credit = $all_credit + $row_credit['credit'];
			}

			$query_payments = "SELECT credit_no, payment FROM payments WHERE credit_no = ".$credit_no." ";

			$result_payments = $conn->query($query_payments);
			$all_payments = 0;

			while($row_payment = $result_payments->fetch_assoc()) {
				$all_payments = $all_payments + $row_payment['payment'];
			}

			$remaining_credit = $all_credit - $all_payments;

			if($remaining_credit <= 0 ){
				header("Location: http://localhost/technical_task/credit_form.php?message='Credit is already payed'");
			}elseif($payment_sum > $remaining_credit){

				$query = "INSERT INTO payments (credit_no, payment) VALUES ('".$credit_no."', ".$remaining_credit.")";

				if($conn->query($query) === TRUE){
					header("Location: http://localhost/technical_task/index.php?message='You payed more than the remaining credit. Money payed is: ".$remaining_credit);
				}else{
					echo "Error: " . $conn->error;
				}


			}else{

				$query = "INSERT INTO payments (credit_no, payment) VALUES ('".$credit_no."', ".$payment_sum.")";

				if($conn->query($query) === TRUE){
					header("Location: http://localhost/technical_task/");
				}else{
					echo "Error: " . $conn->error;
				}

			}
		}else{
			eader("Location: http://localhost/technical_task/payment_form.php?message='No credit found'");
		}

		
	}


?>