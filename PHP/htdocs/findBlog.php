<?php
	if(is_dir($_GET["blogName"])){
		echo  "<h1>".$_GET["blogName"]."</h1>";
		
		$i = 1;
		
		$kat = opendir("./".$_GET["blogName"]);
		while ($plik = readdir($kat)){
			if(is_file("./".$_GET["blogName"]."/".$plik)){
				if(pathinfo("./".$_GET["blogName"]."/".$plik,PATHINFO_EXTENSION) === "")
				{
					
					$dane = fread(fopen("./".$_GET["blogName"]."/".$plik,'r'),filesize("./".$_GET["blogName"]."/".$plik));
					
					echo  "<h2> Wpis ".$i."</h2>";
					$i = $i + 1;
					echo $dane;
					
					echo "<h3>Załączniki:</h3>";
					
					$kat1  = opendir("./".$_GET["blogName"]);
					
					while($plik1 = readdir($kat1)){
						if(preg_match("/".$plik."\d\..*/",$plik1,$matches)){
							echo "<a href=\""."/".$_GET["blogName"]."/".$matches[0]."\">Załącznik1</a>";
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
					
					echo  	"<form method=\"post\" action=\"addComment.php\">
								<p>
								<input type=\"hidden\" name=\"postID\" value=\"".$plik."\"/>
								<input type=\"hidden\" name=\"blogName\" value=\"".$_GET["blogName"]."\"/>
								<input type=\"submit\" value=\"Dodaj komentarz\"/>
								</p>
								</form>";
					
				}
			}
		}
			
	}
	else echo "Nie ma takiego bloga";

?>