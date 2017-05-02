<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
	<head>
		<title>Blog</title>
		<meta http-equiv="Content-Type" content="application/xhtml+xml;charset=UTF-8" />
		<link rel="Stylesheet" type="text/css" href="style.css" title="Normalny" />
		<link rel="Stylesheet" media="print" type="text/css" href="dodruku.css" title="Do druku"/>
		<link type="text/css" rel="alternate stylesheet" href="alternative.css" title="Alternatywnie"/>
		<script src="liststyles.js"></script>
	</head>
	<body onLoad = "listStyles()">
	<div id="baner"><h1>Blog</h1></div>
		<div id="strona">
		<div id="menu">
		
		<?php include("menu.php") ?>

		</div>
	
		<div id="tresc">
			<?php
				//Sprawdzamy czy blog o nazwie przekazanej przez GET istnieje
				if(isset($_GET["blogName"]) && is_dir($_GET["blogName"])){
					//Wyświetlamy tytuł bloga
					echo  "<h1>".$_GET["blogName"]."</h1>";
					
					//Wczytujemy z pliku info opis bloga i wyswietlamy
					$finfo = fopen("./".$_GET["blogName"]."/info",'r');
					$info_s = fread($finfo,filesize("./".$_GET["blogName"]."/info"));
					$data = explode("\n",$info_s);
					echo "<p>";
					for($n = 2; $n < count($data); $n++){
						echo htmlspecialchars($data[$n])."<br />";
					}
					echo "</p>";
					
					
					$files = array_filter(glob($_GET["blogName"].'/*'), 'is_file'); // tablica zawierajaca tylko pliki
					$entries = array_diff($files, array($_GET["blogName"].'/info')); // Usuniecie pliku info z tablicy plikow
					arsort($entries); // posortowanie od najnowszego
					
					//Zapisujemy wszystkie pliki z folderu bloga do tablicy
					$i = 1;
					$kat = opendir("./".$_GET["blogName"]);
					$tab = scandir("./".$_GET["blogName"],SCANDIR_SORT_DESCENDING);
					
					//Sprawdzamy czy plik jest wpisem
					$files = array_filter(glob($_GET["blogName"].'/*'), 'is_file'); // tablica zawierajaca tylko pliki
					$entries = array_diff($files, array($_GET["blogName"].'/info')); // Usuniecie pliku info z tablicy plikow
					arsort($entries); // posortowanie od najnowszego
					foreach ($entries as &$plik) {
						if(is_file("./".$plik)){
							if(preg_match("/".preg_quote($_GET["blogName"])."\/[0-9]{16}\z/",$plik))
							{
								//Odczytujemy zawartość wpisu do tablicy
								$tmp = fread(fopen("./".$plik,'r'),filesize("./".$plik));
								$dane = explode("\n",$tmp);
								
								
								//Dla każdego postu generujemy tabelę
								echo "<table class=\"blogWpis\">";
								echo "<tr class = \"tr1\">";
								echo "<td>";
								echo  "<h2> Wpis ".$i."</h2>";
								$i = $i + 1;

								//Wypisujemy treść posta
								echo "<p>";
								for($m = 0; $m < count($dane); $m++){
									echo htmlspecialchars($dane[$m])."<br />";
								}
								echo "</p>";
								echo "</td>";
								echo "</tr>";
								
								echo "<tr class = \"tr2\">";
								echo "<td>";
								echo "<h3>Załączniki:</h3>";
								
								//Przeszukujemy katalog bloga w poszukiwaniu załączników
								$kat1  = opendir("./".$_GET["blogName"]);
								$k =1;
								foreach ($entries as &$plik1) {
									if(preg_match("/".preg_quote($plik,"/")."[0-9]{1}\..*/",$plik1,$matches)){
										echo "<a href=\"."."/".urldecode($matches[0])."\">Załącznik".$k."</a> <br />";
										$k = $k +1;
									}
								}
								
								echo "</td>";
								echo "</tr>";
								
								echo "<tr class = \"tr3\">";
								echo "<td>";
								echo "<h3>Komentarze</h3>";
								//Sprawdzamy czy istniej folder z komentarzamu i jeśli istnieje to wyswietlamy wszystki komentarze
								if(is_dir("./".$plik.".k")){
									$j = 0;
									
									while(is_file("./".$plik.".k/".$j)){
										
										$komf = fopen("./".$plik.".k/".$j,'r');
										$kom_s = fread($komf, filesize("./".$plik.".k/".$j));
										$dane = explode("\n",$kom_s);
										
										$j = $j + 1;
										echo "<h4>".$dane[1]." komentarz użytkownika <b>".$dane[0]."</b> z dnia: ".$dane[2].":</h4>";
										echo "<p>";
										for($m = 3; $m < count($dane); $m++){
											echo htmlspecialchars($dane[$m])."<br />";
										}
										echo "</p>";
									}
								}
								
								//wyswietlamy przycisk dodawania nowego komentarza
								echo  	"<form method=\"post\" action=\"addComment.php\">
											<p>
											<input type=\"hidden\" name=\"postID\" value=\"".$plik."\"/>
											<input type=\"hidden\" name=\"blogName\" value=\"".$_GET["blogName"]."\"/>
											<input type=\"submit\" value=\"Dodaj komentarz\"/>
											</p>
											</form>";
								
								
						
								echo "</td>";
								echo "</tr>";
								echo "</table>";
								
							}
						}
					}
						
				}
				else{
					if(isset($_GET["blogName"])) echo "<h1>Nie ma takiego bloga</h1>";
					echo "<h2> Lista dostępnych blogów: </h2>";
					echo "<ol>";
					$kat = opendir(".");
					while ($plik = readdir($kat)){
						if(is_dir("./".$plik) && $plik != "." && $plik != ".." ){
							echo "<li><a href = \"findBlog.php?blogName=".urlencode($plik)."\">".$plik."</a></li>";
						}
					}
					echo "</ol>";
					
				}

			?>
			
		<p>
			<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
		</p>
		
		<p>
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Poprawny CSS!" /></a>
		</p>
		
		
		</div>
		</div>
	</body>
</html>