<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <title>Blog</title>
                <meta http-equiv="Content-Type" content="application/xhtml+xml;charset=UTF-8" />
                <link rel="Stylesheet" type="text/css" href="style.css" />
        </head>
        <body>

		<h1>Dodaj wpis</h1>
        <form action="wpis.php" method="post" enctype="multipart/form-data">
			<table>
			<tr>
				<td>Nazwa użytkownika:</td> 
				<td><input type="text" name="userName"></td>
			</tr>
			<tr>
				<td>Hasło:</td> 
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td>Wpis:</td> 
				<td><textarea name="blogPost" rows="10" cols="50"></textarea></td>
			</tr>
			<tr>
				<td>Załączniki:</td> 
				<td><input name="file1" type="file"><br>
				<input name="file2" type="file"> <br>
				<input name="file3" type="file"> </td>
			</tr>
			<tr>
				<td>Data:</td> 
				<td><input type="text" name="postDate" value=<?php echo date("d.m.Y")?> readonly="readonly"></td>
			</tr>
			<tr>
				<td>Godzina:</td> 
				<td><input type="text" name="postTime" value=<?php echo date("h:i")?> readonly="readonly"></td>
			</tr>
			<tr>
				<td></td>
                <td><input type="submit" name="submit" value="Dodaj wpis"><input type="reset" value="Wyczyść"/></td>
			</tr>
			</table>
        </form>
</body>