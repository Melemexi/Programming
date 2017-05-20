<?php require "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
</head>
<body>
<a href="/">back home</a>
	<?php

	$data = $_POST;
	if(isset($data['do_singup']))
	{
		$errors = array();

		if(trim($data['login'] == ''))
		{
			$errors[] = 'Введите логин!';
		}

		if(trim($data['email'] == ''))
		{
			$errors[] = 'Введите Email!';
		}

		if($data['password'] == '')
		{
			$errors[] = 'Введите пароль!';
		}

		if($data['password_2'] != $data['password'])
		{
			$errors[] = 'Повторный пароль введён не верно!';
		}

		if(R::count('users', "login = ? OR email = ?", array($data['login'], $data['email']))>0)
		{
			$errors[] = 'Пользователь с такими данными уже существует!';
		}

		if(empty($errors))
		{
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			$user->join_date = date("d.m.Y G:i:s");
			$user->level = 0;
            $user->rationg = 2;
            $user->points = 10;
            $user->change = 2;
			R::store($user);
			echo '<div style="color:green;">Вы успешно зарегестрировались!</div><hr>';
		}
		else
		{
			echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
		}
	}
?>

<form action="/singup.php" method="POST">
	
	<p>
		<p><strong>Ваш логин:</strong></p>
		<input type="text" name="login" value="<?php echo @$data['login'];?>">
	</p>

	<p>
		<p><strong>Ваш Email:</strong></p>
		<input type="email" name="email" value="<?php echo @$data['email'];?>">
	</p>

	<p>
		<p><strong>Ваш пароль:</strong></p>
		<input type="password" name="password" value="<?php echo @$data['password'];?>">
	</p>

	<p>
		<p><strong>Введите ваш пароль еще раз:</strong></p>
		<input type="password" name="password_2" value="<?php echo @$data['password_2'];?>">
	</p>

	<p>
		<button type="sibmit" name="do_singup">Зарегестрироваться</button>
	</p>

</form>
</body>
</html>