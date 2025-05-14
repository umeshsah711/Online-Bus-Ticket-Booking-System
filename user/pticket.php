<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Saved Record</title>
    <link rel="stylesheet" href="pticket.css">
</head>
<body>
    <header>
          <h1>BookMyTicket.com</h1>
          <h3>Ticket</h3>
    </header>

    <main>
        
        <div class="record">
            <?php
            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'test');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch the last saved record
            $sql = "SELECT * FROM booking ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="info"><strong>FROM:</strong> ' . $row['source'] . ' <strong>TO:</strong> ' . $row['destination'] . '</div>';


                echo '<div class="info"><strong>Name:</strong> ' . $row['name'] . '</div>';
                echo '<div class="info"><strong>Gender:</strong> ' . $row['gender'] . '</div>';
                echo '<div class="info"><strong>Email:</strong> ' . $row['email'] . '</div>';
                echo '<div class="info"><strong>Number of Seats:</strong> ' . $row['seats'] . '</div>';
                echo '<div class="info"><strong>Seats Numbers:</strong> ' . $row['seatsno'] . '</div>';
                echo '<div class="info"><strong>Date:</strong> ' . $row['date'] . '</div>';
                echo '<div class="info"><strong>Phone Number:</strong> ' . $row['number'] . '</div>';
            
            } else {
                echo 'No records found.';
            }

            $conn->close();
            ?>
        </div>
    </main>

    <footer>
        <p> </p>
        <p>&copy; 2023 BookMyticket.com</p>
    </footer>
</body>
</html>
