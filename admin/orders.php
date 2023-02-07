<?php
// Initialize the session
session_start();
include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraCream | Admin</title>
    <link rel="stylesheet" href="../css/admin.css" type="text/css">
    <link rel="stylesheet" href="../css/tabs.css" type="text/css">
    <link rel="shortcut icon" href="../img/logo.png">

     <!--Font Awesome for icons-->
     <script src="https://kit.fontawesome.com/3fad1024f6.js" crossorigin="anonymous"></script>
     
</head>
<body>
    <div class="main-container">
        <div class="aside">
            <div class="logo">
                <center><img src="../img/logo.png" alt="" width="150px" height="auto"></center>
                <a href="#">LaraCream</a>
                Welcome, <br><b><?php echo htmlspecialchars($_SESSION["adminName"]); ?></b>. 
            </div>
            <!--Navbar-->
            <ul class="nav">
                <li><a href="adminHome.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="adminUsers.php" ><i class="fa fa-user"></i> Manage Users</a></li>
                <li><a href="products.php" ><i class="fa fa-table"></i> Manage Products</a></li>
                <li><a href="orders.php" class="active"><i class="fa fa-list"></i> View Orders</a></li>
                <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            </ul>
            <div class="copyright-text">
                &copy; 2020 LaraCream
            </div>
            <!--End navbar-->
        </div>
        <!--End aside-->
        <div class="main-content">
            <section class="about section">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Manage Orders</h2>
                        </div>
                    </div>
                <div class="row">
                <h3>List of Recent Orders</h3><br><br>
                                        <table class="customers">
                                            <tr>
                                                <th>No</th>
                                                <th>Name of customer</th>
                                                <th>Size of cup</th>
                                                <th>Name of flavor</th>
                                                <th>Name of topping</th>
                                                <th>Total payment (RM)</th>
                                            </tr>
                                            <!--PHP to select from db-->
                                            <?php 
                                                $query = "SELECT orders.*,customer.*,payment.*,flavor.* FROM orders
                                                INNER JOIN customer ON customer.custID = orders.custID
                                                INNER JOIN payment ON payment.paymentID = orders.paymentID
                                                INNER JOIN flavor ON flavor.flavorID = orders.flavorID";
                                                $result = $link->query($query);
                                                if($result-> num_rows >0) {
                                                    $i = 1;
                                                        while ($row = $result-> fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i?></td>
                                                    <td><?php echo $row["custName"]?></td>
                                                    <td><?php echo $row["cupsize"]?></td>
                                                    <td><?php echo $row["flavorName"]?></td>
                                                    <td><center><a href="ordersTopping.php?custID=<?php echo $row["custID"]; ?>"><i class="fas fa-bars" style="color:green"></i></a></td>
                                                    <td><?php echo $row["paymentTotal"]?></td>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                                </tr>
                                            <?php
                                                }
                                            ?>    
                                        </table>
                </div>    
                
                </div>
            </section>
        <!--End main content-->
    </div>   
    <!--End main container--> 
    <script src="../js/script.js"></script>
</body>
</html>