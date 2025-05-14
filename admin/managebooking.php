
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="4.css">
<body>
    <nav id="navbar">
        <ul class="list">
            <li class="item"><a href="admin_dashboard.php">DashBoard</a></li>
         <ul class="list">
                <h2><li id="web" style="font-size:2.3rem;"><i><a href="#">BookMyTicket.com</a></i></li></h2>
                </ul>
            </ul>
    </nav>
    <h1  class="h-primary" style="text-align: center;">Manage Booking</h1>
    <div class="base">
        </div>
        <div class="container">
        <table>
            <thead>
            <tr>     
                <th>Sno</th>
                <th>source</th>
                <th>Destination</th>
                <th>Name</th>
                    <th>Quantity</th>
                    <th>Seat No</th>
                    <th>Phone no.</th>
                    <th>Action</th>
           
                </tr>
            </thead>

            <tbody>
                <?php
                	$conn = new mysqli('localhost','root','','test');
                if($conn->connect_error){
                    echo "$conn->connect_error";
                    die("Connection Failed : ". $conn->connect_error);
                } else {
                $sql="SELECT * from booking";
                $result=mysqli_query($conn,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $sno=$row['id'];
                        $source=$row['source'];
                        $destination=$row['destination'];
                        $name=$row['name'];
                        $quantity=$row['seats'];
                        $seatno=$row['seatsno'];
                        $phoneno=$row['number'];
                        echo '<tr>
                        <td>'.$sno.'</td>
                        <td>'.$source.'</td>
                        <td>'.$destination.'</td>
                        <td>'.$name.'</td>
                        <td>'.$quantity.'</td>
                        <td>'.$seatno.'</td>
                        <td>'.$phoneno.'</td>
                        <td>
                        <button><a href="update.php">Update</a></button>
                        <button><a href="delete.php?deleteid='.$sno.'">Delete</a></button>
                      </td>
                        </tr>';
                
                    }
                }
            }

                ?> 
            </tbody>
        </table>
   </div>
    </body>
    </html>
