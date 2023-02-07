<?php
  	session_start();
    include '../config.php';
    //$adminID = $_SESSION['id'];
    $toppingID = $_GET['toppingID']; //Get id from URL
	$id = $_SESSION['id']; //id of the current user
	//$_SESSION['adminID'] = $adminID;

    
    $query = "SELECT * FROM topping WHERE toppingID = '$toppingID'";
    $result = $link->query($query);

//Bila user tekan save
  	if(isset($_POST["save"]))
  	{
        //Current user id
        $id = $_SESSION['id'];
        $toppingName = $_POST['toppingName'];
        $toppingPrice = $_POST['toppingPrice'];

                    $query = "UPDATE topping SET toppingName = '$toppingName', toppingPrice = '$toppingPrice'
                              WHERE toppingID = '$toppingID'";


         			if ($link->query($query))
               			{
               				echo ("<SCRIPT LANGUAGE='JavaScript'>
               				window.alert('Topping information is edited!')
               				window.location.href='products.php'
                               </SCRIPT>");
               				exit();

               			}
               			else
               			{
               				echo ("<SCRIPT LANGUAGE='JavaScript'>
               				window.alert('An error occurred!')
               				window.location.href='products.php'
               				</SCRIPT>");
               				exit();
               			}

  			mysqli_close($link);
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
                <li><a href="adminUsers.php" ><i class="fa fa-user"></i> Manage User</a></li>
                <li><a href="products.php" class="active"><i class="fa fa-table"></i> Manage Products</a></li>
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
                            <h2>Manage Products</h2>
                            <h3>Edit Topping's Information</h3>
                        </div>
                    </div>
                    
                    <?php
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="container-form">
                        <div class="row">
                            <form method="POST" id="form" enctype="multipart/form-data"> 
                                <div class="form-field">
                                    <label>Topping's Name</label>
                                        <input type="text" id="toppingName" name="toppingName" class="form-control" value="<?php echo $row['toppingName']; ?>" required><br>
                                </div>
                                <div class="form-field">
                                    <label>Topping's Price (RM)</label>
                                        <input type="text" onkeypress="return isNumberKey(event)" id="toppingPrice" name="toppingPrice" class="form-control" value="<?php echo $row['toppingPrice']; ?>" required><br>
                                </div>
                                
                                <div class="form-field">
                                    <div class="row-baru">
                                        <div class="buttons padd-15">
                                            <a href="products.php" class="btn">Cancel</a>
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
<SCRIPT language=Javascript>
   <!--
   function isNumberKey(evt)
   {
	  var charCode = (evt.which) ? evt.which : evt.keyCode;
	  if (charCode != 46 && charCode > 31 
		&& (charCode < 48 || charCode > 57))
		 return false;

	  return true;
   }
   //-->
</SCRIPT>
</html>
