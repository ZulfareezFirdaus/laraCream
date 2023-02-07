<?php
session_start();
include "../config.php";
$id = $_GET['custID'];
$id = $_SESSION['id'];

$query = "SELECT * FROM customer WHERE custID = '$custID'";
$result = $link->query($query);

if(isset($_POST["save"]))
	{
        //Attributes yang akan di update in database
        $id = $_POST['id']; //simpan id from url
        $editName = $_POST['editName'];
        $editEmail = $_POST['editEmail'];
        $editPhone = $_POST['editPhone'];
        $editStatus = $_POST['editStatus'];

        $query = "UPDATE customer SET custName = '".$editName."', custEmail = '".$editEmail."', custPhone = '".$editPhone."', userStatus = '".$editStatus."'
                  WHERE custID = '".$id."' ";

				if ($link->query($query))
						{
							echo ("<SCRIPT LANGUAGE='JavaScript'>
									window.alert('Customer's information updated!')
									window.location.href='adminUsers.php'
									 </SCRIPT>");
						}
				else
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							    window.alert('Customer's information couldn't be updated, please try again!')
							    window.location.href='adminUsers.php'
								</SCRIPT>");
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
                <nav>
                    <ul class="nav">
                        <li><a href="adminHome.php"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="adminUsers.php" class="active"><i class="fa fa-user"></i> Manage Users</a></li>
                        <li><a href="products.php" ><i class="fa fa-table"></i> Manage Products</a></li>
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
                            <h2>Manage Users</h2>
                            <h3>Edit Customer's Information</h3> 
                        </div>
                    </div>
                   
                    <div class="row">
                        <?php
                            $custID = $_GET['custID'];
                            $query = "SELECT * FROM customer WHERE custID = '$custID'";
                            $result = $link->query($query);
                                if($result->num_rows>0)
                                    {
                                        while($data = $result-> fetch_assoc()){
                        ?>
                        
                        <div class="container-form">
                            <div class="row">  
                                <form method="POST" id="form" enctype="multipart/form-data"> 
                                    <div class="form-field">
                                        <label>Customer's Full Name</label>
                                            <input type="text" name="editName" class="form-control" value="<?php echo $data["custName"]?>" required><br>
                                    </div>
                                    <div class="form-field">
                                        <label>Customer's Email</label>
                                            <input type="text" name="editEmail" class="form-control" value="<?php echo $data["custEmail"]?>" required><br>
                                    </div>
                                    <div class="form-field">
                                        <label>Customer's Phone</label>
                                            <input type="text" name="editPhone" class="form-control" value="<?php echo $data["custPhone"]?>" required>
                                    </div>
                                    <div class="form-field">
                                        <label>Status</label>
                                            <input type="text" name="editStatus" class="form-control" value="<?php echo $data["userStatus"]?>" required>
                                    </div>
                                    <div class="form-field">
                                        <div class="row-baru">
                                            <div class="buttons padd-15">
                                                <a href="adminUsers.php" class="btn">Cancel</a>
                                            </div>
                                            <div class="buttons padd-15">
                                                <button type="submit" name="save" id="save" class="btn" style="background-color:green">Save</button>
                                            </div>
                                        </div>
                                    </div>   
                                            <input type="hidden" name="id" id="id" value="<?php echo $adminID;?>">
                                        <?php }
                                        }?>             
                                </form>
                            </div>
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
