<?php
    $source = $_POST['source'];
	$destination = $_POST['destination'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$seats = $_POST['seats'];
	$seatsno = $_POST['seatsno'];
    $date = $_POST['date'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into booking(source,destination,name, gender, email, seats, seatsno,date, number) values(?, ?,?,?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssissi",$source,$destination, $name, $gender, $email,$seats, $seatsno,$date, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Ticket Booked...";
		 header("location:sucess.php");

		$stmt->close();
		$conn->close();
	}
?>