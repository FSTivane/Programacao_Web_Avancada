<form method="post" action="<?php echo $post_file; ?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<p>
		<label>Nome</label>
		<input type="text" name="nome" size="60" maxlength="255" value="<?php echo $nome; ?>">
	</p>
	<p>
		<label>Email</label>
		<input type="email" name="email" size="60" maxlength="150" value="<?php echo $email; ?>">
	</p>
	<?php 
		function select($opt){
			if ($opt==$GLOBALS['perfil']) {
				echo "checked";
			}
		}
	 ?>
	<p>
		<label>Perfil</label><br>
		<input type="radio" name="perfil" id="admin" value="admin" <?php select("admin") ?>>
		<label for="admin">Admin</label><br>

		<input type="radio" name="perfil" id="vendedor" value="vendedor" <?php select("vendedor") ?>>
		<label for="vendedor">Vendedor</label><br>

		<input type="radio" name="perfil" id="fiel" value="fiel" <?php select("fiel") ?>>
		<label for="fiel">Fiel</label><br>
	</p>
	<p>
		<label>Username</label>
		<input type="text" name="username" size="60" maxlength="50" value="<?php echo $nome; ?>">
	</p>
	<p>
		<label>Password</label>
		<input type="password" name="password" size="60" maxlength="15">
	</p>
	<hr>
	<p>
		<input type="submit" value="Gravar">
	</p>
</form>