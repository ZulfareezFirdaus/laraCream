<?php
session_start();
//ID of the current user
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
                <li><a href="adminUsers.php" class="active"><i class="fa fa-user"></i> Manage Users</a></li>
                <li><a href="products.php"><i class="fa fa-table"></i> Manage Products</a></li>
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
                            <h2>Manage Users</h2>
                        </div>
                    </div>
                <div class="row">
                    <ul class="tabs">
                        <li class="tab">
                            <input type="radio" name="tabs" checked="checked" id="tab1" />
                                <label for="tab1">Admins</label>
                                <div id="tab-content1" class="content">
                                    <h3>List of Admins</h3><br>
                                        <table class="customers">
                                            <tr>
                                                <th>No</th>
                                                <th>Admin's Name</th>
                                                <th>Admin's Contact Number</th>
                                                <th>Admin's Email</th>
                                                <th>Date registered</th>
                                                <th>Actions</th>
                                            </tr>
                                            <!--PHP to select from db-->
                                            <?php 
                                                $query = "SELECT * FROM admins";
                                                $result = $link->query($query);
                                                if($result-> num_rows >0) {
                                                    $i = 1;
                                                        while ($row = $result-> fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i?></td>
                                                    <td><?php echo $row["adminName"]?></td>
                                                    <td><?php echo $row["adminPhone"]?></td>
                                                    <td><?php echo $row["adminEmail"]?></td>
                                                    <td><?php echo $row["created_at"]?></td>
                                                    <td>
                                                    <center>
                                                        <a href="editAdmin.php?adminID=<?php echo $row["adminID"]; ?>"><i class="fas fa-edit" style="color:green"></i></a>
                                                        &nbsp&nbsp&nbsp
                                                        <a href="deleteAdmin.php?adminID=<?php echo $row["adminID"]; ?>"><i class="fas fa-trash-alt" onClick="return confirm('Are you sure you want to remove this user permanently?')" aria-hidden="true" style="color:red"></i></a>
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
                                            <a class="btn" href="createAdmin.php?adminID=<?php echo $adminID ?>"> + Create New Admin</a>
                                        </div>
                                    </div> 
                                </div>
                        </li>
                        <li class="tab">
                            <input type="radio" name="tabs" id="tab2" />
                                <label for="tab2">Customers</label>   
                                    <div id="tab-content2" class="content">
                                        <h3>List of Customers</h3><br>
                                            <table class="customers">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Customer's Name</th>
                                                    <th>Customer's Email</th>
                                                    <th>Customer's Phone</th>
                                                    <th>Verification Status</th>
                                                </tr>
                                            <?php 
                                                $query = "SELECT * FROM customer";
                                                $result = $link->query($query);
                                                    if($result-> num_rows >0) {
                                                        $i = 1;
                                                        while ($row = $result-> fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i?></td>
                                                    <td><?php echo $row["custName"]?></td>
                                                    <td><?php echo $row["custEmail"]?></td>
                                                    <td><?php echo $row["custPhone"]?></td>
                                                    <td><?php echo $row["userStatus"]?></td>
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
                        </li> 
                    </ul>
                </div>    
                </div>
            </section>
        <!--End main content-->
    </div>   
    <!--End main container--> 
    <script src="../js/script.js"></script>
</body>
</html>