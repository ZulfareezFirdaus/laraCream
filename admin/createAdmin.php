<?php
  	session_start();
    include '../config.php';
    //$adminID = $_SESSION['id'];
    $adminID = $_GET['adminID']; //Get id from URL
	//$id = $_SESSION['id']; //id of the current user
	//$_SESSION['adminID'] = $adminID;

if(isset($_POST["save"])){

    $adminEmail = $_POST["adminEmail"];

    $resQueryEmail = mysqli_query($link, "SELECT * FROM admins WHERE adminEmail = '".$adminEmail."' ");

    if(mysqli_num_rows($resQueryEmail) == 0 ){
        $adminName = $_POST["adminName"];
        $adminEmail = $_POST["adminEmail"];
        $password = $_POST["password"];
        $adminPhone = $_POST["adminPhone"];

        $query = "INSERT INTO admins(adminName, password, adminEmail, adminPhone)
                        VALUES ('".$adminName."','".$password."','".$adminEmail."','".$adminPhone."')";
        $data = mysqli_query($link, $query);
		
		if($data){
        echo(
            "<script language=javascript>
			alert('You have created a new admin account!');
            window.location.href= 'adminUsers.php'</script>");
		}
		else{
			echo(
			"<script language=javascript>
			alert('failed create new admin account, please try again!');
            window.location.href= 'adminUsers.php'</script>");
		}

    }
    else{
        ?>
        <script>
            alert("This email is already in use!");
                window.history.go(-1);
        </script>
<?php
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
                <li><a href="adminUsers.php" class="active" ><i class="fa fa-user"></i> Manage User</a></li>
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
                            <h3>Create New Admin</h3>
                        </div>
                    </div>
                    
                    <div class="container-form">
                        <div class="row">
                            <form method="POST" id="form" enctype="multipart/form-data"> 
                                <div class="form-field">
                                    <label>Full Name</label>
                                        <input type="text" name="adminName" class="form-control" required><br>
                                </div>
                                <div class="form-field">
                                    <label>Email</label>
                                        <input type="email" name="adminEmail" class="form-control" required><br>
                                </div>
                                <div class="form-field">
                                    <label>Contact Number</label>
                                        <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="adminPhone" class="form-control"  required><br>
                                </div>
                                <div class="form-field">
                                    <label>Password</label>
                                        <input type="password" name="password" class="form-control"  required><br>
                                </div>
                                <!--<div class="form-field">
                                    <label>Confirm Password</label>
                                        <input type="password" name="confirm-password" class="form-control"  required>
                                </div>-->
                                <div class="form-field">
                                    <div class="row-baru">
                                        <div class="buttons padd-15">
                                            <a href="adminUsers.php" class="btn" >Cancel</a>
                                        </div>
                                        <div class="buttons padd-15">
                                            <button type="submit" name="save" id="save" class="btn" style="background-color: green">Save</button>
                                        </div>
                                    </div>  
                                </div>        
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
