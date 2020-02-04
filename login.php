<?php
require_once("config.php");
if (!empty($_SESSION['user_id'])) {
    header("location:/index.php");
}
$errors=[];
if (!empty($_POST)) {
    if (empty($_POST['email'])){
        $errors[]="Enter Email!";
    }
    if (empty($_POST['password'])){
        $errors[]='Enter Password!';
    }
    if (empty($errors)){
        $connect =$dbConn->prepare('SELECT id FROM users WHERE  (email=:email) and password=:password');
        $connect->execute(array('email'=> $_POST['email'], 'password'=> $_POST['password']));
        $id = $connect->fetchColumn();
        if (!empty($id)){
            $_SESSION['user_id']=$id;
            die("Вы успешно авторзорованы!");
        }else{
            $errors[]="Enter valid data!";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In Page</title>
</head>
<body>
    <div style="color: red;">
        <?php foreach ($errors as $error) : ?>
            <p><? echo $error; ?></p>
        <? endforeach; ?>
    </div>
    <form action="" method="post">
        <div>Email\User name </div>
            <label>
                <input type="text" name="email" required="" value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : "")?>"/>
            </label>
        <div>Password</div>
        <label>
            <input type="password" name="password" required=""/>
        </label>
        <div>
            <input type="submit" value="Log In!">
        </div>
    </form>
</body>
</html>
