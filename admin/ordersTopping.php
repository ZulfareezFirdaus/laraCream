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
                            <h2>Toppings</h2>
                        </div>
                    </div>
                <div class="row">
                <h3>List of Toppings</h3><br><br>
                                        <table class="customers">
                                            <tr>
                                                <th>No</th>
                                                <th>Topping</th>
                                            </tr>
                                            <!--PHP to select from db-->
                                            <?php 
                                                $query = "SELECT orders_detail.* ,orders.*,topping.* FROM orders_detail
                                                INNER JOIN orders ON orders.ordersID = orders_detail.ordersID
                                                INNER JOIN topping ON topping.toppingID = orders_detail.toppingID
                                                WHERE orders.custID = '".$_GET["custID"]."'";
                                                $result = $link->query($query);
                                                if($result-> num_rows >0) {
                                                    $i = 1;
                                                        while ($row = $result-> fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i?></td>
                                                    <td><?php echo $row["toppingName"]?></td>
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
                            <div class="row-baru">
                                <div class="buttons padd-15">
                                    <a href="orders.php" class="btn">Back</a>
                                </div>
                             </div>
                </div>
            </section>
        <!--End main content-->
    </div>   
    <!--End main container--> 
    <script src="../js/script.js"></script>
</body>
</html>