<h1>Dodaj wpis</h1>
     <form action="wpis.php"  method="post" enctype="multipart/form-data" id="addPost" >
		<table>
		<tr>
			<td>Nazwa użytkownika:</td> 
			<td><input type="text" name="userName"/></td>
		</tr>
		<tr>
			<td>Hasło:</td> 
			<td><input type="password" name="password"/></td>
		</tr>
		<tr>
			<td>Wpis:</td> 
			<td><textarea name="blogPost" rows="10" cols="50"></textarea></td>
		</tr>
		<tr>
			<td>Załączniki:</td> 
			<td id = "zalaczniki">
				<button type="button" onclick="add()">Dodaj załącznik </button><br/>
			</td>
		</tr>
		<tr>
			<td>Data:</td> 
			<td><input type="text" name="postDate" value="<?php /* echo date("d.m.Y")*/ ?>" onblur = "validateDate()" /></td>
		</tr>
		<tr>
			<td>Godzina:</td> 
			<td><input type="text" name="postTime" value="<?php /* echo date("H:i")*/ ?>" onblur = "validateTime()" /></td>
		</tr>
		<tr>
			<td></td>
            <td><input type="submit" name="submit" value="Dodaj wpis"/><input type="reset" value="Wyczyść"/></td>
			</tr>
		</table>
    </form>