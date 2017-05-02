<?php
	//Jeśli nie istnieje katalog komentarzy, tworzymy go
	echo "./".$_POST['postID'].".k";
	if (!is_dir("./".$_POST['postID'].".k")){
		mkdir("./".$_POST['postID'].".k", 0777);
	}
	
	//Zliczamy już dodane komentarze
	$i = 0;
	while (file_exists("./".$_POST['postID'].".k/".$i)){
		$i = $i + 1;
	}
	
	//Zapisujemy dane z formularza do pliku
	$fp = fopen("./".$_POST['postID'].".k/".$i,'w');
	if(flock($fp,2)){
		fwrite($fp,$_POST['userName']."\n".$_POST['commentType']."\n".date("Y-m-d H:i:s")."\n".$_POST['comment']);
		echo "123";
		flock($fp,3);
	} else {
		fclose($fp);
		header("Location: blad.php?err=koment");
		exit();
	}
	fclose($fp);
		
	//Przenosimy użytkownika do strony z listą blogów
	header("Location: findBlog.php?blogName=".$_POST['blogName']);
?>