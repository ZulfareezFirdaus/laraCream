<?php
// Initialize the session
session_start();
include "../config.php";
$adminID = $_SESSION['id'];
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraCream | Admin</title>
    <link rel="stylesheet" href="../css/admin.css" type="text/css">
    <link rel="stylesheet" href="../css/form.css" type="text/css">
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
                <nav>
                    <ul class="nav">
                        <li><a href="adminHome.php" class="active"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="adminUsers.php" ><i class="fa fa-user"></i> Manage Users</a></li>
                        <li><a href="products.php"><i class="fa fa-table"></i> Manage Products</a></li>
                        <li><a href="orders.php"><i class="fa fa-list"></i> View Orders</a></li>
                        <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    </ul>
                <div class="copyright-text">
                    &copy; 2020 LaraCream
                </div>
                </nav>      
            <!--End navbar-->
        </div>
        <!--End aside-->
        <div class="main-content">
            <section class="about section">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Admin</h2>
                            Hey there! 
                        </div>
                    </div>
                   
                    <div class="box">
                        <div class="row">
                            <div class="card">
                                <div class="ellipsis">
                                    <i class="fa fa-user"></i>
                                </div>
                                <h2>Total Admins</h2>
                                    <h3>
                                    <?php
                                        $query="SELECT COUNT(*) c FROM admins";
                                            $result = $link->query($query);
                                        if($result-> num_rows >0) {
                                            while ($row = $result-> fetch_assoc()) {
                                                echo $row["c"];
                                                }
                                            }
                                        ?>
                                    </h3>
                            </div>
                            <div class="card">
                                <div class="ellipsis">
                                    <i class="fa fa-users"></i>
                                </div>
                                <h2>Total Customers</h2>
                                <h3>
                                <?php
                                    $query="SELECT COUNT(*) c FROM customer";
                                        $result = $link->query($query);
                                    if($result-> num_rows >0) {
                                        while ($row = $result-> fetch_assoc()) {
                                            echo $row["c"];
                                            }
                                        }
                                    ?>
                                </h3>
                            </div>
                            <div class="card">
                                <div class="ellipsis">
                                    <i class="fa fa-ice-cream"></i>
                                </div>
                                <h2>Total Flavors</h2>
                                <h3>
                                <?php
                                    $query="SELECT COUNT(*) c FROM flavor";
                                        $result = $link->query($query);
                                    if($result-> num_rows >0) {
                                        while ($row = $result-> fetch_assoc()) {
                                            echo $row["c"];
                                            }
                                        }
                                    ?>
                                </h3>
                            </div>
                            <div class="card">
                                <div class="ellipsis">
                                    <i class="fa fa-snowflake"></i>
                                </div>
                                <h2>Total Toppings</h2>
                                <h3><?php
                                    $query="SELECT COUNT(*) c FROM topping";
                                        $result = $link->query($query);
                                    if($result-> num_rows >0) {
                                        while ($row = $result-> fetch_assoc()) {
                                            echo $row["c"];
                                            }
                                        }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
        
            </section>
            <!--About section end-->
        </div>
        <!--End main content-->
    </div>   
    <!--End main container--> 
</body>
</html>