<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>External Style Sheet</title>
    <link rel="stylesheet" href="Style.css" type="text/css"/>
</head>
<?php
	require_once 'init.php';
	$page='Đăng nhập';
        var_dump($_POST);
    if (isset($_POST['email']) && isset($_POST['password'])){
        if($_POST['email'] ===  '1760472@gmail.com' && $_POST['password'] === '123456'){
            $user= ['email' => '1760472@gmail.com', 'displayName' => 'Dinh Bao Long'];
            $_SESSION['user']=$user;
             header('Location: index.php');
            exit();
        }
       
    }
?>

<body >
   <?php include 'header.php'; ?>
   <h1 style="color:Tomato;">Đăng nhập</h1>
   <form method="POST">
     <div class="mb-3" style="color:DodgerBlue;">
       <label for="exampleInputEmail1" class="form-label" >Email </label>
       <input type="email" class="form-control" id="Email" name="email" aria-describedby="emailHelp">
     </div>
     <div class="mb-3" style="color:DodgerBlue;">
       <label for="password1" class="form-label">Password</label>
       <input type="password" class="form-control" id="Password" name="password">
     </div>
     <button type="submit" class="btn btn-primary">Đăng nhập </button>
   </form>
   <?php include 'footer.php'; ?>
</body>
</html>