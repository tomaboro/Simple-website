		<h1>Tworzenie Bloga</h1>
        <form action="nowy.php" method="post">
			<table>
			<tr>
				<td>Nazwa bloga:</td> 
				<td><input type="text" name="blogName"/></td>
			</tr>
			<tr>
				<td>Nazwa użytkownika:</td> 
				<td><input type="text" name="userName"/></td>
			</tr>
			<tr>
				<td>Hasło:</td> 
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td>Opis bloga:</td> 
				<td><textarea name="blogDescription" rows="10" cols="50"></textarea></td>
			</tr>
			<tr>
				<td></td>
                <td><input type="submit" name="submit" value="Załóż blog"/><input type="reset" value="Wyczyść"/></td>
			</tr>
			</table>
        </form>