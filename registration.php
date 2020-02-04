<?php
require_once("config.php");
if (!empty($_SESSION["user_id"])) {
    header("location:/index.php");
}
$errors = [];
if (empty($_POST["user_name"])) {
    $errors[] = "Please,enter your User Name!";
}
if (empty($_POST["email"])) {
    $errors[] = "Please, enter your Email adress!";
}
if (empty($_POST["first_name"])) {
    $errors[] = "Please,enter your First Name!";
}
if (empty($_POST["last_name"])) {
    $errors[] = "Please,enter your Last Name!";
}
if (empty($_POST["password"])) {
    $errors[] = "Please,enter Password!";
}
if (empty($_POST["confirm_password"])) {
    $errors[] = "Please,enter Confirm Password!";
}
if ($_POST["password"] !== $_POST["confirm_password"]) {
    $errors[] = "Password and Confirm Password should be same!";
}
if (strlen($_POST["password"]) < 7) {
    $errors[] = "Password must be 7 symbols at least!";
}
/* дальше идет блок подключение к базе данных.Сперва используються заглушки для значений,а потом с помощью execute сами значения*/
if (empty($errors)) {
    $connect = $dbConn->prepare('INSERT INTO users(`username`,`email`, `first_name`, `last_name`, `password`, `confirm_password`s) VALUES (
        :username, :email, :first_name, :last_name, :password, :confirm_password)');
    $connect->execute(array('username' => $_POST["user_name"], 'email' => $_POST["email"], 'first_name' => $_POST["first_name"], 'last_name' =>
        $_POST["last_name"], 'password' => $_POST["password"], 'confirm_password' => $_POST["confirm_password"]));

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration </title>
</head>
<body>
<div>
    <div style="color: red;">
        <?php foreach ($errors as $error) : ?>
            <p><? echo $error; ?></p>
        <? endforeach; ?>
    </div>
    <form action="" method="post">
        <label>username</label>
        <div>
            <input type="text" required="" name="user_name"
                   value="<?php echo(!empty($_POST["user_name"]) ? $_POST["user_name"] : ""); ?>"/>
        </div>
        <label>email</label>
        <div>
            <input type="email" name="email" required=""
                   value="<?php echo(!empty($_POST["email"]) ? $_POST["email"] : ""); ?>"/>
        </div>
        <label>first name</label>
        <div>
            <input type="text" name="first_name" required=""
                   value="<?php echo(!empty($_POST["first_name"]) ? $_POST["first_name"] : ""); ?>"/>
        </div>
        <label>last name</label>
        <div>
            <input type="text" name="last_name" required=""
                   value="<?php echo(!empty($_POST["last_name"]) ? $_POST["last_name"] : ""); ?>"/>
                        <!--value-значение,которое возвращает заполненую юзером строку,чтобы не вводить данные 2й раз-->
        </div>
        <label>password</label>
        <div>
            <input type="password" name="password" required=""/>
        </div>
        <label>confirm password</label>
        <div>
            <input type="password" name="confirm_password">
        </div>
        <div>
            <input type="submit" name="" id="">
        </div>
    </form>
</div>
</body>
</html>
