<?php require "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Главная страница</title>
</head>
<body>
<?php if((isset($_SESSION['logged_user']))&&($_SESSION['logged_user']->level == 1)) : ?>
You re admin
hello , <?php echo $_SESSION['logged_user']->login;?>, how are u?<br>
<?php echo $_SESSION['logged_user']->points;?> pnt.<br>
<a href="logout.php">Выйти</a>
<?php elseif((isset($_SESSION['logged_user']))&&($_SESSION['logged_user']->level == 0)) : ?>
Вы авторизованы!<br>
Hello, <?php echo $_SESSION['logged_user']->login;?><br>
У вас <?php echo $_SESSION['logged_user']->points;?> поинтов<br>
Ваш уровень <?php echo $_SESSION['logged_user']->level;?><br>
Ваш рейтинг <?php echo $_SESSION['logged_user']->rationg;?><br>
<a href="logout.php">Выйти</a>
<?php else : ?>
<a href="/login.php">Авторизоваться</a><br>
<a href="/singup.php">Зарегестрироваться</a>
<?php endif;?>
</body>
</html>
