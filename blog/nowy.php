<?php
		//przeszukujemy wszystkie foldery
		$kat = opendir(".");
		$istnieje = 0;
		while ($plik = readdir($kat))
		{
			if(is_dir($plik)){
				if (file_exists("./".$plik."/info")){
					
					//Otwieramy plik info z nazwa uzytkownika i haslem
					$fp = fopen("./".$plik."/info","r");
					
					//Wczytujemy dane z pliku do tablcy
					$info_s = fread($fp,filesize("./".$plik."/info"));
					$data = explode("\n",$info_s);
					
					echo $data[0]."<br />".$_POST['userName']."    ".$data[1]."<br />".$data[2]."<br />";
					
					//Sprawdzamy czy blog nalezy do naszego uzytkownika
					if ($_POST['userName'] == $data[0]){
						header("Location:zakladanieBloga.php?err=ist");
						exit();
					}
				}
			}
		}



	//Sprawdzamy czy blog o podanej nazwie już istnieje
	if (!is_dir($_POST['blogName'])){
		//Tworzymy katalog bloga
		mkdir($_POST['blogName'], 0777);
		
		//Zapisujemy informacje o blogu do pliku info
		$fp = fopen('./'.$_POST['blogName'].'/info', 'w');
		if(flock($fp,2)){
			fwrite($fp,$_POST['userName']."\n".md5($_POST['password'])."\n".$_POST['blogDescription']);
			flock($fp,3);
			fclose($wpisFile);
		} else {
			fclose($wpisFile);
			header("Location: blad.php?err=nowy");
		}
		
		//przenosimy użytkownika do strony z jego blogiem
		header("Location: findBlog.php?blogName=".$_POST['blogName']);
		exit();
	}
	else{
		echo 'Blog o takiej nazwie już istnieje!';
		header("Location: zakladanieBloga.php?err=tak");
		exit();
	}
	
	
	
?>