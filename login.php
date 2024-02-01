<?php
$validUser = false;
$message = '';
require_once("./database.php");
if(isset($_POST["email"]) && isset($_POST["password"]) && trim($_POST["email"]) !== "" && trim($_POST["password"]) !== ""){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = $db->query("SELECT * FROM users");

    if($result->num_rows > 0){
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach($rows as $row){
            if($email == $row["email"] && $password == $row["password"]){
                $validUser = true;
                break;
            }
            else{
                $message = "Your email or password is incorrect";
            }
        }
    }
    else{
        $message = "Please enter valid email address or password";
    }

    


}
else{
    $message = "Please enter valid email address or password";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if($validUser):?>
            Your Account
    <?php else:?>
            Error
    <?php endif;?>

</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

 <?php if($validUser):?>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Welcome - <?=$email?></h1>
                <a href="./index.php" class="btn btn-warning">Log out</a>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php if(!$validUser):?>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <p class="alert alert-danger">Error -> <?=$message?></p>
                <a href="./index.php">TRY AGAIN</a>

            </div>
        </div>
    </div>
<?php endif; ?>


<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>