<div class="container ">
	<div class="row">
     Registrazione
     <?php echo form_open("auth/send_registrazione"); ?>
		<!-- <form class="col s6 offset-s3 center"> -->
			<div class="row">
				<div class="input-field col s12">
					<?php echo form_input('username'); ?>
					<label for="username">Username</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<?php echo form_password('password'); ?>
					<label for="password">Password</label>
				</div>
			</div>
			<button class="btn waves-effect waves-light" type="submit" name="action">Invia
        <i class="material-icons right">send</i>
      </button>
		<!-- </form> -->
    <?php echo form_close(); ?>
	</div>
</div>
