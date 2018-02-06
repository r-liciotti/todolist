<div class="container ">
	<div class="row">
    <h3>Aggiungi Contenuto</h3>

     <?php echo form_open("content/save_content");

     ?>
		<!-- <form class="col s6 offset-s3 center"> -->
			<div class="row">
				<div class="input-field col s12 m4">
					<?php echo form_input('name'); ?>
					<label for="username">Nome</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m6">
					<?php echo form_textarea('description','','class="materialize-textarea"'); ?>
					<label for="password">Descrizione</label>
				</div>
			</div>
			<button class="btn waves-effect waves-light" type="submit" name="action">Salva
        <i class="material-icons right">send</i>
      </button>
		<!-- </form> -->
    <?php echo form_close(); ?>
	</div>
</div>
