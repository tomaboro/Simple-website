	<?php
		$kat = opendir(".");
		while ($plik = readdir($kat))
		{
			if(is_dir($plik)){
				if (file_exists("./".$plik."/info.csv")){
					$fp = fopen("./".$plik."/info.csv","r");
					$data = fgetcsv($fp,",");
					echo $data[0]."<br />";
					if ($_POST['userName'] === $data[0]){
						if(md5($_POST['password']) === $data[1])
						{
						
							$time = explode(":", $_POST['postTime']);
							$date = explode(".", $_POST['postDate']);
							$serial = 0;
							
							$katalog = "./".$plik."/";
							$post = $date[2].$date[1].$date[0].$time[0].$time[1];
							
							while(file_exists($katalog.$post.str_pad($serial, 2, 0, STR_PAD_LEFT))){
								$serial = $serial + 1;
							}
					
							$post = $post.str_pad($serial, 2, 0, STR_PAD_LEFT);
							
							$wpisFile = fopen($katalog.$post,'w');
				
							fputs($wpisFile,$_POST['blogPost']);
							fclose($wpisFile);
							
							
							for($i = 1; $i<4; $i++){
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
							
					
						}
					}
				}	
			}
		}
		closedir($kat);
	?>