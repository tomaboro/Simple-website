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
		<script src="czatScripts.js"></script>
	</head>
	<body onLoad = "listStyles()">
		<div id="baner"><h1>Blog</h1></div>
		<div id="strona">
		<div id="menu">
		
		<?php include("menu.php") ?>

		</div>
	
		<div id="tresc">
	
	<div id="chat_window">
		<input type="checkbox" name="check" id="check" onchange="update();" unchecked/>Uruchom chat<br/>
		
		<textarea rows="20" cols="80" id="chat" disabled></textarea><br/>
		Pseudonim: <input type="text" name="nick" id="nick" /><br/>
		Wpisz wiadomość: <br/><input type="text" name="message" id="message" /><br/>
		<button type="button" onclick="sendIfPossible()">Wyślij</button>
		<br/><br/><br/>
	</div>

	<div id="debug"></div>

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
