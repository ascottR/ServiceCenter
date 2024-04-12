<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginform.css">
    <title>Admin Login</title>

</head>

<body>
    <div class="card">
        <div class="panel-heading">
            <h3 class="panel-title">Admin Log In</h3>
        </div>
        <div class="panel-body">
            <form action="../controller/adminLoginControl.php" method="post">              
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>
                    <div>
                        <input type="submit" value="Login">
                    </div>
            </form>
        </div>
    </div>
</body>

</html>
