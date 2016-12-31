<?php
	if(is_dir($_GET["blogName"])){
		echo  "<h1>".$_GET["blogName"]."</h1>";
		
		$i = 1;
		
		$kat = opendir("./".$_GET["blogName"]);
		while ($plik = readdir($kat)){
			if(is_file("./".$_GET["blogName"]."/".$plik)){
				if(pathinfo("./".$_GET["blogName"]."/".$plik,PATHINFO_EXTENSION) === "")
				{
					echo $plik."<br >";
					echo "./".$_GET["blogName"]."/".$plik."<br>";
					
					
					$dane = fread(fopen("./".$_GET["blogName"]."/".$plik,'r'),filesize("./".$_GET["blogName"]."/".$plik));
					
					echo  "<h2> Wpis ".$i."</h2>";
					$i = $i + 1;
					echo $dane;
					
					echo "<h3>Załączniki:</h3>";
					
					for($k=1;$k<4;$k++){
						if(is_file("./".$_GET["blogName"]."/".$plik.$k)){
							echo "<a href=\""."./".$_GET["blogName"]."/".$plik.$k."\">Załącznik".$k."</a>";
						}
					}
					
					echo "<h3>Komentarze</h3>";
					if(is_dir("./".$_GET["blogName"]."/".$plik.".k")){
						$j = 0;
						
						while(is_file("./".$_GET["blogName"]."/".$plik.".k/".$j)){
							$dane = fread(fopen("./".$_GET["blogName"]."/".$plik.".k/".$j,'r'),filesize("./".$_GET["blogName"]."/".$plik.".k/".$j));
							echo $dane;
						}
						
					}
					
				}
			}
		}
			
	}
	else echo "Nie ma takiego bloga";

?>