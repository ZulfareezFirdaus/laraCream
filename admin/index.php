<?php
session_start();
include "../config.php";

if(isset($_POST['btnLogin']))
{
    $adminEmail = mysqli_real_escape_string($link, $_POST["adminEmail"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);
    
    $query = "SELECT * FROM admins WHERE adminEmail = '$adminEmail' AND password = '$password'";

    $result = $link->query($query);
            if($result-> num_rows >0) {
                 while ($row = $result-> fetch_assoc()) {
                    $_SESSION['id'] = $row["adminID"];
                    $_SESSION['adminEmail'] = $row['adminEmail'];
                    $_SESSION['adminName'] = $row['adminName'];
                    
                    if($row != null){
                        header("Location: adminHome.php");
                    }
                 }
            }
            else{
                    echo("<SCRIPT LANGUAGE='Javascript'>
                        window.location.href='index.php'
                        window.alert('Sorry, you have entered the wrong password!')</SCRIPT>");
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
            <center><br><br>
            <h2>LaraCream Admin</h2>
                    <div class="container">
                        <div class="container-form"><br><br>
                            <img src="../img/logo.png" alt="" width="350px" height="auto">
                                <div class="row">
                                    <form method="POST" id="form"> 
                                        <div class="form-field">
                                            <label>Email</label>
                                                <input type="text" name="adminEmail" class="form-control" required><br>
                                        </div>
                                        <div class="form-field">
                                            <label>Password</label>
                                                <input type="password" name="password" class="form-control" required><br>
                                        </div>
                                        <div class="form-field">
                                            <div class="row-baru">
                                                <div class="buttons padd-15">
                                                    <button type="submit" name="btnLogin" class="btn">Login</button>
                                                </div>
                                            </div>  
                                        </div>        
                                    </form>
                                </div>
                        </div>
                    </div>
            </center>   
        </div>            
    </body>
</html>
