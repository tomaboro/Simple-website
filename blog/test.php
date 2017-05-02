<?php 
echo "Wejscie do sekcji krytycznej<br>";
ob_flush(); flush();
$start=time();
$fp = fopen("test.txt", "r+");
if (flock($fp, LOCK_EX)) {
echo "Jestem w sekcji krytycznej<br>";
ob_flush(); flush();
sleep(30);
flock($fp, LOCK_UN);
echo "Wyjscie z sekcji krytycznej<br>";
echo "Czas wykoania: ".(time()-$start)."<br>";
} else { echo "Problemy z blokada...<br>";}
ob_flush(); flush(); fclose($fp);
?>