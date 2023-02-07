<?php
// Initialize the session
session_start();
$adminID = $_SESSION['id'];


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
                <li><a href="adminUsers.php" ><i class="fa fa-user"></i> Manage User</a></li>
                <li><a href="products.php" class="active"><i class="fa fa-table"></i> Manage Products</a></li>
                <li><a href="orders.php"><i class="fa fa-list"></i> View Orders</a></li>
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
                            <h2>Manage Products</h2>
                        </div>
                    </div>
                    
                    <div class="row">
                    <ul class="tabs">
                        <li class="tab">
                            <input type="radio" name="tabs" checked="checked" id="tab1" />
                                <label for="tab1">Flavors</label>
                                <div id="tab-content1" class="content">
                                    <h3>List of Available Flavors</h3><br>
                                        <table class="customers">
                                            <tr>
                                                <th>No</th>
                                                <th>Flavor's Name</th>
                                                <th>Flavor's Image</th>
                                                <th>Flavor's Price (RM)</th>
                                                <th>Actions</th>
                                            </tr>
                                            <!--PHP to select from db-->
                                            <?php 
                                                $query = "SELECT * FROM flavor";
                                                $result = $link->query($query);
                                                if($result-> num_rows >0) {
                                                    $i = 1;
                                                        while ($row = $result-> fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i?></td>
                                                    <td><?php echo $row["flavorName"]?></td>
                                                    <td><a href="viewFlavor.php?flavorID=<?php echo $row["flavorID"]; ?>"><i class="fas fa-image" style="color:green"></i></a></td>
                                                    <td><?php echo $row["flavorPrice"]?></td>
                                                    <td>
                                                    <center>
                                                        <a href="editFlavor.php?flavorID=<?php echo $row["flavorID"]; ?>"><i class="fas fa-edit" style="color:green"></i></a>
                                                        &nbsp&nbsp&nbsp
                                                        <a href="deleteFlavor.php?flavorID=<?php echo $row["flavorID"]; ?>"><i class="fas fa-trash-alt" onClick="return confirm('Are you sure you want to remove this flavor permanently?')" aria-hidden="true" style="color:red"></i></a>
                                                    </center>
                                                    </td>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                                </tr>
                                            <?php
                                                }
                                            ?>    
                                        </table>
                                    <br>
                                    <div class="row">
                                        <div class="buttons padd-15">
                                            <a class="btn" href="createFlavor.php?adminID=<?php echo $adminID ?>"> + Create New Flavor</a>
                                        </div>
                                    </div>
                                </div>
                        </li>
                        <li class="tab">
                            <input type="radio" name="tabs" id="tab2" />
                                <label for="tab2">Toppings</label>   
                                    <div id="tab-content2" class="content">
                                        <h3>List of Available Toppings</h3><br>
                                            <table class="customers">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Topping's Name</th>
                                                    <th>Topping's Image</th>
                                                    <th>Topping's Price (RM)</th>
                                                    <th>Actions</th>
                                                </tr>
                                            <?php 
                                                $query = "SELECT * FROM topping";
                                                $result = $link->query($query);
                                                    if($result-> num_rows >0) {
                                                        $i = 1;
                                                        while ($row = $result-> fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i?></td>
                                                    <td><?php echo $row["toppingName"]?></td>
                                                    <td><a href="viewTopping.php?toppingID=<?php echo $row["toppingID"]; ?>"><i class="fas fa-image" style="color:green"></i></a></td>
                                                    <td><?php echo $row["toppingPrice"]?></td>
                                                    <td>
                                                        <center>
                                                            <a href="editTopping.php?toppingID=<?php echo $row["toppingID"]; ?>"><i class="fas fa-edit" style="color:green"></i></a>
                                                            &nbsp&nbsp&nbsp
                                                            <a href="deleteTopping.php?toppingID=<?php echo $row["toppingID"]; ?>"><i class="fas fa-trash-alt" onClick="return confirm('Are you sure you want to remove this user permanently?')" aria-hidden="true" style="color:red"></i></a>
                                                        </center>
                                                    </td>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>    
                                            </table>  
                                            <br>
                                            <div class="row">
                                                <div class="buttons padd-15">
                                                    <a class="btn" href="createTopping.php?adminID=<?php echo $adminID ?>"> + Create New Topping</a>
                                                </div>
                                            </div>
                                    </div>
                        </li> 
                    </ul>
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