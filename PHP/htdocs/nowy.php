<?php
	echo $_POST['blogName'];
	echo '<br>';
	echo $_POST['userName'];
	echo '<br>';
	echo $_POST['password'];
	echo '<br>';
	echo md5($_POST['password']);
	echo '<br>';
	echo $_POST['blogDescription'];

	if (!is_dir($_POST['blogName'])){
		mkdir($_POST['blogName'], 0777);
		$infoArray = array($_POST['userName'], md5($_POST['password']), $_POST['blogDescription']);
		$fp = fopen('./'.$_POST['blogName'].'/info.csv', 'w');
		fputcsv($fp, $infoArray);
		fclose($fp);
	}
	else echo 'Blog o takiej nazwie już istnieje!';
	
?>