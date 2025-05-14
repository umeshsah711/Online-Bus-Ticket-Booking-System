<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Document</title>
</head>
<link rel="stylesheet" href="contact.css.css">
<body>
    <nav id="navbar">
        <ul class="list">
            <li class="item"><a href="home2.php">Home</a></li>
            <li  class="item"><a href="aboutus.html">About us</a></li>
            <li  class="item"><a href="contact.php">Contact</a></li>
         <ul class="list">
                <h2><li id="web" style="font-size:2.3rem;"><i><a href="#">BookMyTicket.com</a></i></li></h2>
                </ul>
            </ul>
    </nav>
    <h1  class="h-primary" style="text-align: center;">Contact Us</h1>
    <div class="base">
        
        </div>
        <div class="container">
            <form action="contact.php" method="post">
                
    
               
                <input type="text" name="name" id="name" placeholder="Enter your name">
     

                <input type="email" name="email" id="email" placeholder="Enter your email address">
            
            
                <input type="number" name="number" id="number" placeholder="Enter your contact number">
         
                <textarea name="message" id="message" cols="20" rows="3" placeholder="Enter your message!!"></textarea>
           
               <button class="btn">Submit</button>
             
            </form>
            </div>
       
    </body>
    </html>
    <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO contact_messages (name, email, number, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $number, $message);

    if ($stmt->execute()) {
        echo "Message saved successfully!";
        header("location:Msucess.php");
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
