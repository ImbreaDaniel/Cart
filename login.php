<?php 
// de ce nu merge cu if isset submit iar apoi pun toate astea in paranteze? butonul este doar
require'common.php';   
$user = $_POST['username'];
    $pass = $_POST['password'];
    $username2 = 'Dani';
    $password2 = 'dani123';
    if($user == $username2 && $pass == $password2) {
       header('Location:index.php');
    } else {
        echo "Something is wrong";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class = "login-box">
            <h2>Login here</h2>
            <form action = "login.php" method = "post">
                <div class = "form-group">
                    <label>Username</label>
                    <input type = "text" name = "username" class = "form-control">
                </div>
                <div class = "form-group">
                    <label>Password</label>
                    <input type = "password" name = "password" class = "form-control">
                </div>
                <button type = "submit" class = "btn btn-primary">Login </button>
            </form>
        </div>
    </div>
   
</body>
</html>