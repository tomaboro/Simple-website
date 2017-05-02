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
		
		<h1>Wystapił błąd! </h1>
		
		<?php
			if($_GET['err']=="koment") echo "<p>Nastąpiła nietypowa sytuacja! Dwa (lub więcej) procesy próbują nadpisać jeden komentarz!</p>";
			else if($_GET['err']=="wpis") echo "<p>Nastąpiła nietypowa sytuacja! Dwa (lub więcej) procesy próbują nadpisać ten sam wpis!</p>";
			else if($_GET['err']=="nowy") echo "<p>Nastąpiła nietypowa sytuacja! Dwa (lub więcej) procesy próbują nadpisać jeden blog!</p>";
		?>
		
		<img src="sorry.jpg" id="sorry"/>
		
		<h1>Spróbuj ponownie później! </h1>
		
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