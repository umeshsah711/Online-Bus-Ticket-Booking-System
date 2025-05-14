<?php
                	$conn = new mysqli('localhost','root','','test');
                if($conn->connect_error){
                    echo "$conn->connect_error";
                    die("Connection Failed : ". $conn->connect_error);
                } 
                else{
                    if(isset($_GET['deleteid'])){
                        $sno=$_GET['deleteid'];

                        $sql="DELETE from booking where id=$sno";
                        $result=mysqli_query($conn,$sql);
                        if($result){
                            // echo "deleted Successfully";
                            header('location:managebooking.php');
                        }
                        else{
                            die(mysqli_error($conn));
                        }
                    }
                }

                ?>