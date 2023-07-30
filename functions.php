<?php 

	function all_credits($type){
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

		$query = "SELECT credit_no, name, credit, term FROM credits";
		$result = $conn->query($query);

		if ($result->num_rows > 0) {
			$result_arr = [];
			while($row = $result->fetch_assoc()) {
				if($type == 'all'){
					$query_payments = "SELECT credit_no, payment FROM payments WHERE credit_no = ".$row['credit_no']." ";

					$result_payments = $conn->query($query_payments);
					$all_payments = 0;

					while($row_payment = $result_payments->fetch_assoc()) {
						$all_payments = $all_payments + $row_payment['payment'];
					}

					$info_arr = [
						'name' => $row['name'],
						'credit' => $row['credit'],
						'term' => $row['term'],
						'all_payments' => $all_payments
					];

				}elseif($type == 'credit_no'){
					$info_arr = [
						'credit_no' => $row['credit_no'],
					];
				}

				array_push($result_arr, $info_arr);
			}
			$result = $result_arr;
		} else {
			$result = "none";
		}

		$conn->close();

		return $result;

	}

?>