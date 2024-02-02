<?php
require_once("./database.php");
$isRegister = false;
$userExist = false;
$message = '';
if(isset($_POST["email"]) && isset($_POST["password"]) && trim($_POST["email"]) !== "" && trim($_POST["password"]) !== ""){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = $db->query("SELECT * FROM users");
    
    if($db){
        
        if($result->num_rows > 0){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            foreach($rows as $row){
                if($email == $row["email"]){
                    $message = "You already have account";
                    $userExist = true;
                    break;
                }
            }
    
            if(!$userExist){
            $isRegister = true;
            $db->query("INSERT INTO users(email, password) VALUES('$email', '$password')");
            $message = "Account created successfully";
            }
        }
        else{
            $isRegister = true;
            $db->query("INSERT INTO users(email, password) VALUES('$email', '$password')");
            $message = "Account created successfully";
        }
    }
    else{
        $message = "Not Conected to database";
    }
}

else{
    $message = 'Please enter valid email or password';
}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>


    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <h2>Create Account</h2>
            <form action="./registration.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class='form-label'>Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                       
                    </div>
                    <div class="form-group my-5">
                        <label for="exampleInputPassword1" class='form-label'>Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Create Now</button>
                    <a href="./index.php" class='ml-4'>Have an account?Login in</a>
                </form>

                <div class='message-box'>
                    <?php if($isRegister):?>
                        <p class="text-success"><?=$message?> <a href="./index.php">Login now</a></p>
                        
                    <?php endif;?>
                    <?php if(!$isRegister):?>
                        <p class="text-danger"><?=$message?></p>
                    <?php endif;?>
                </div>
    
            </div>
        </div>
    </div>


<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>