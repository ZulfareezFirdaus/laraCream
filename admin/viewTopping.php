<?php
include "../config.php";
session_start();
$id = $_SESSION['id'];
$toppingID = $_GET['toppingID'];
$query = "SELECT toppingName, toppingImg FROM topping WHERE toppingID = '$toppingID'";
$result = $link->query($query);

// Get images from the database
if($result->num_rows >0) {
  while ($row=$result-> fetch_assoc()) {
        $imageURL = $row["toppingImg"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LaraCream | Admin</title>
        <link rel="stylesheet" href="../css/admin.css" type="text/css">
        <link rel="shortcut icon" href="../img/logo.png">
    </head>

    <body style="background-color: #f4f4f4">
        <div class="row">
            <div class="buttons padd-15">
                <a href="products.php" class="btn">Back</a>
            </div>
        </div>
            <h1 style="text-align: center; padding: 30px;">Image of the <?php echo $row["toppingName"];?></h1>
                <center><img src="../<?php echo $imageURL; ?>" alt="" width="40%" height="auto"/><center>

                <?php
                }//endwhile
            }//endif
            else{ ?>
                <p>No image(s) found...</p>
            <?php }//endelse ?>
    </body>
</html>

    


