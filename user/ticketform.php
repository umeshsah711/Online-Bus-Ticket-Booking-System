<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="ticketform.css">
<body>
    <nav id="navbar">
        <ul class="list">
            <li class="item"><a href="home2.php">Home</a></li>
            <li  class="item"><a href="contact.php">Contact</a></li>
            <li><a href="aboutus.html">About Us</a></li>
            <ul class="list">
                <h2><li id="web" style="font-size:2.3rem;"><i><a href="#">BookMyTicket.com</a></i></li></h2>
                </ul>
       

        </ul>
    </nav>
    <div class="main_bg">
        <div class="form">
            <div class="form-text">
                <h1><span><img src="art-1.png" alt=""></span>Book Now <span><img src="art-1.png" alt=""></span></h1>
                <h2 color="Red"><b>Please Provide the following details......</b></h2>
            </div>
            <div class="main-form">
                <form action="booking.php" method="post">
                    <div>
                        <span>Source:</span>
                        <input type="text" id="source" name="source" required>
                    </div>
                    <div>
                        <span>Destination:</span>
                        <input type="text" id="destination" name="destination" required>
                    </div>
        
                    <div>
                        <span>Enter Your Name:</span>
                        <input type="text" name="name" id="name" placeholder="Write your name here..." required>
                    </div>
        
                        <div>
                            <label for="gender"><span>Gender:</span></label>
                            <select id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                  <div>
                        <span>Enter Your Email: </span>
                        <input type="email" name="email" id="Email" placeholder="Write your email here..." required> 
                    </div>
                    <div>
                        <span>Enter number of seats:</span>
                        <input type="number" name="seats" id="seats" placeholder="Write no. of seats here..." required>
                    </div>
                    <div>
                        <span>Seat Number:</span>
                        <input type="text" name="seatsno" id="seatsno" placeholder="Enter seat Number here..." required>
                    </div>
                   
                    <div>
                        <span>Tavelling Date </span>
                        <input type="date" name="date" id="date" placeholder="date">
                    </div>
                    <div>
                        <span>Your phone number: </span>
                        <input type="tel" id="number" name="number" pattern="[0-9]{10}" placeholder="Enter phone Number here..."required >
                    </div>
                    <div id="submit">
                        <input type="submit" value="SUBMIT" id="submit">
                    </div>
    
    
                </form>
    
    
            </div>
        </div>
        <div>
    </div>
            
        </div>
    </body>
    
    </html>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $source = test_input($_POST["source"]);
        $destination = test_input($_POST["destination"]);
        $name = test_input($_POST["name"]);
        $gender = test_input($_POST["gender"]);
        $email = test_input($_POST["email"]);
        $seats = test_input($_POST["seats"]);
        $seatsno = test_input($_POST["seatsno"]);
        $date = test_input($_POST["date"]);
        $number = test_input($_POST["number"]);
    
        // Validate inputs
        if (empty($source) || empty($destination) || empty($name) || empty($gender) || empty($email) || empty($seats) || empty($seatsno) || empty($date) || empty($number)) {
            die("All fields are required. Please fill in all the details.");
        }
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format.");
        }
    
        if (!preg_match("/^[0-9]{10}$/", $number)) {
            die("Invalid phone number format. Please enter a 10-digit number.");
        }
    
       
        // Redirect to a success page after processing the form
        header("Location: sucess.php");
        exit;
    }
    
    // Function to sanitize input data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    
    </body>
    </html>