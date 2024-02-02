
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domaci 14</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
            <h2>Login</h2>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class='form-label'>Email address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                       
                    </div>
                    <div class="form-group my-5">
                        <label for="exampleInputPassword1" class='form-label'>Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="./registration.php" class='ml-4'>Don't have an account?SignUp</a>
                </form>
            </div>
        </div>
    </div>

<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>