<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <title>Dodaj komentarz</title>
                <meta http-equiv="Content-Type" content="application/xhtml+xml;charset=UTF-8" />
                <link rel="Stylesheet" type="text/css" href="style.css" />
        </head>
        <body>

		<h1>Dodaj wpis</h1>
        <form action="wynik.php" method="post" enctype="multipart/form-data">
			<table>
			<tr>
				<td>Nazwa użytkownika:</td> 
				<td><input type="text" name="userName"></td>
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
				<td></td>
                <td><input type="submit" name="submit" value="Dodaj wpis"><input type="reset" value="Wyczyść"/></td>
			</tr>
			</table>
        </form>
</body>