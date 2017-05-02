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
					
					echo $data[0]."<br />".$data[1]."<br />".$data[2]."<br />";
					
					//Sprawdzamy czy blog nalezy do naszego uzytkownika
					if ($_POST['userName'] == $data[0]){
						//Sprawdzamy poprawnosc hasla
						if(md5($_POST['password']) == $data[1])
						{
							$istnieje = 1;
							//Zapisujemy do tablic podzielony na czesci czas
							$time = explode(":", $_POST['postTime']);
							$date = explode(".", $_POST['postDate']);
							$serial = 0;
							
							$katalog = "./".$plik."/";
							$post = $date[2].$date[1].$date[0].$time[0].$time[1].date("s");
							
							//Sprawdzamy czy istnieją posty dodane o tym samym czasie i ustalamy numer seryjny posta
							while(file_exists($katalog.$post.str_pad($serial, 2, 0, STR_PAD_LEFT))){
								$serial = $serial + 1;
							}
					
							//uzupełniamy nazwe pliku o numer seryjny w odpowiednio sformatowanym foramcie
							$post = $post.str_pad($serial, 2, 0, STR_PAD_LEFT);
							
							//Zapisujemy tresc posta do pliku
							$wpisFile = fopen($katalog.$post,'w');
							if(flock($fp,2)){
								fputs($wpisFile,$_POST['blogPost']);
								flock($fp,3);
							} else {
								fclose($wpisFile);
								header("Location: blad.php?err=wpis");
							}
							fclose($wpisFile);
							
							//Przesyłamy na serwer pliki z załączników
							
							for($i = 1; $i<count($_FILES)+1; $i++){
								$Fname = "file". $i;
								echo $Fname;
								$max_rozmiar = 1024*1024;
								if (is_uploaded_file($_FILES[$Fname]['tmp_name'])) {
									if ($_FILES[$Fname]['size'] > $max_rozmiar) {
										echo 'Błąd! Plik jest za duży!';
									} else {
										if (isset($_FILES[$Fname]['type'])) {}
										move_uploaded_file($_FILES[$Fname]['tmp_name'],
										$katalog.$post.$i.".".pathinfo($_FILES[$Fname]['name'],PATHINFO_EXTENSION));
										echo $katalog.$post.$i.".".pathinfo($_FILES[$Fname]['name'],PATHINFO_EXTENSION);
									}
									} else {
										echo 'Błąd przy przesyłaniu danych!';
									}
							}
							
							closedir($kat);
							header("Location: findBlog.php?blogName=".$plik);
							exit();
						}
					}
				}	
			}
		}
		closedir($kat);
		
		if($istnieje == 0) header("Location: dodajWpis.php?err=tak");
		
	?>