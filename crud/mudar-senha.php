 <form method="post" action="post-senha.php">
 	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
 	<p>
 		<label>Senha Actual</label><br>
 		<input type="password" name="password" size="50" maxlength="15"><br>
 		<label style="color:red"><?php echo isset($err_1)?$err_1:""; ?></label>
 	</p>
 	<p>
 		<label>Nova Actual</label><br>
 		<input type="password" name="new_password" size="50" maxlength="15">
 	</p>
 	<p>
 		<label>Confirmar Actual</label><br>
 		<input type="password" name="conf_password" size="50" maxlength="15"><br>
 		<label style="color:red"><?php echo isset($err_2)?$err_2:""; ?></label>
 	</p>
 	<hr>
 	<p>
 		<input type="submit" value="Gravar">
 	</p>
 </form>