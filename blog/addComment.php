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

		<h1>Dodaj komentarz</h1>
        <form action="koment.php" method="post" enctype="multipart/form-data">
			<table>
			<tr>
				<td>Nazwa użytkownika:</td> 
				<td><input type="text" name="userName"/></td>
			</tr>
			<tr>
				<td>Rodzaj komentarza:</td> 
				<td>
					<select name="commentType">
						<option>Pozytywny</option>
						<option>Neutralny</option>
						<option>Negatywny</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Komentarz:</td> 
				<td><textarea name="comment" rows="10" cols="50"></textarea></td>
			</tr>
			<tr>
				<td><input type="hidden" name ="postID" value =<?php echo "\"".$_POST['postID']."\""?> /> </td>
				<td><input type="hidden" name ="blogName" value =<?php echo "\"".$_POST['blogName']."\""?> />  </td>
                <td><input type="submit" name="submit" value="Dodaj wpis"><input type="reset" value="Wyczyść"/></td>
			</tr>
			</table>
        </form>
		
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