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
		$user = R::dispense('predictions');
        $user->winner = $data['winner'];
        $user->loser = $data['loser'];
        $user->timeofmatch = $data['time'];
        $user->procent = $data['procent'];
        $user->bet = $data['bet'];
        $user->maps = $data['maps'];
        $user->text = $data['text'];
		R::store($user);
		echo '<div style="color:green;">Успешно добавлено!</div><hr>';
	}
?>

<form action="/singup.php" method="POST">
	
	<p>
		w<input type="text" name="winner" value="<?php echo @$data['login'];?>">
    </p>
    
    <p>
		l<input type="text" name="loser" value="<?php echo @$data['login'];?>">
    </p>
    
    <p>
		t<input type="text" name="time" value="<?php echo @$data['login'];?>">
    </p>
    
    <p>
		p<input type="text" name="procent" value="<?php echo @$data['login'];?>">
    </p>
    
    <p>
		b<input type="text" name="bet" value="<?php echo @$data['login'];?>">
    </p>
    
    <p>
		m<input type="text" name="maps" value="<?php echo @$data['login'];?>">
    </p>
    
    <p>
		<input type="text" name="text" value="<?php echo @$data['login'];?>">
    </p>

	<p>
		<button type="sibmit" name="do_singup">Зарегестрироваться</button>
	</p>

</form>
</body>
</html>