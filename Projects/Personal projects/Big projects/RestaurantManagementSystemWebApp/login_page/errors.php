<!--If the user enters the wrong usernameEmail and password,
the error messages will be stored in the $error variable array. 
we can the display any errors to the output using this array.-->

<?php if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<!--Display error to the user-->
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>