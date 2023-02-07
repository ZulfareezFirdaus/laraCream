<?php
  	session_start();
    include '../config.php';
    //$adminID = $_SESSION['id'];
    $adminID = $_GET['adminID']; //Get id from URL
	$id = $_SESSION['id']; //id of the current user
	//$_SESSION['adminID'] = $adminID;

    
    $query = "SELECT * FROM admins WHERE adminID = '$adminID'";
    $result = $link->query($query);

//Bila user tekan save
  	if(isset($_POST["save"]))
  	{
        //Current user id
        $id = $_SESSION['id'];
        $adminName = $_POST['adminName'];
        $adminEmail = $_POST['adminEmail'];
        $adminPhone = $_POST['adminPhone'];
        $password = $_POST['password'];

        $query = "UPDATE admins SET adminName = '".$adminName."', adminEmail = '".$adminEmail."', adminPhone = '".$adminPhone."', password = '".$password."'
                  WHERE adminID = '".$adminID."' ";


         		if ($link->query($query))
               		{
               			echo ("<SCRIPT LANGUAGE='JavaScript'>
               			window.alert('Admin information is updated!');
               			window.location.href='adminUsers.php';
                        </SCRIPT>");
               		    exit();
               		}
               	else
               		{
               			echo ("<SCRIPT LANGUAGE='JavaScript'>
               			window.alert('An error occurred!');
               			window.location.href='adminUsers.php';
               			</SCRIPT>");
               			exit();
               		}
    }
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
            <ul class="nav">
                <li><a href="adminHome.php"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="adminUsers.php" class="active"><i class="fa fa-user"></i> Manage User</a></li>
                <li><a href="products.php" ><i class="fa fa-table"></i> Manage Products</a></li>
                <li><a href="orders.php" ><i class="fa fa-list"></i> View Orders</a></li>
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
                            <h3>Edit Admin's Information</h3>
                        </div>
                    </div>
                    
                    <?php
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="container-form">
                        <div class="row">
                            <form method="POST" id="form" enctype="multipart/form-data"> 
                                <div class="form-field">
                                    <label>Admin's Name</label>
                                        <input type="text" id="adminName" name="adminName" class="form-control" value="<?php echo $row['adminName']; ?>" required><br>
                                </div>
                                <div class="form-field">
                                    <label>Admin's Email</label>
                                        <input type="email" id="adminEmail" name="adminEmail" class="form-control" value="<?php echo $row['adminEmail']; ?>" required><br>
                                </div>
                                <div class="form-field">
                                    <label>Admin's Phone</label>
                                        <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" name="adminPhone" value="<?php echo $row['adminPhone']; ?>" required>
                                </div>
                                <div class="form-field">
                                    <label>Admin's Password</label>
                                        <input type="password" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
                                </div>
                                <div class="form-field">
                                    <div class="row-baru">
                                        <div class="buttons padd-15">
                                            <a href="adminUsers.php" class="btn">Cancel</a>
                                        </div>
                                        <div class="buttons padd-15">
                                            <button type="submit" name="save" id="save" class="btn" style="background-color: green">Save</button>
                                        </div>
                                    </div>  
                                </div> 
                                <?php
                                }
                                ?>       
                            </form>
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
